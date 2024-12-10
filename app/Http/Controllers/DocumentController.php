<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;  // Import Log facade
use App\Models\Document;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Dompdf\Dompdf;
use Dompdf\Options;

class DocumentController extends Controller
{
    /**
     * Display the upload form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('documents.index');
    }

    /**
     * Handle file upload and processing.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        // Validasi file
        $request->validate([
            'document' => 'required|mimes:pdf,docx|max:10240',  // 10MB
        ]);

        try {
            // Ambil file yang di-upload
            $file = $request->file('document');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            // Log file yang di-upload
            Log::info('File di-upload: ' . $originalFileName . '.' . $extension);

            // Format tanggal upload sebagai folder
            $uploadDate = now()->format('Y-m-d'); // Format tanggal: YYYY-MM-DD
            $storagePath = 'documents/' . $uploadDate . '/' . $originalFileName;  // Struktur folder sesuai permintaan

            // Buat folder untuk menyimpan file split jika belum ada
            $fullStoragePath = storage_path('app/public/' . $storagePath);
            if (!file_exists($fullStoragePath)) {
                if (!mkdir($fullStoragePath, 0777, true) && !is_dir($fullStoragePath)) {
                    throw new \Exception('Gagal membuat direktori: ' . $fullStoragePath);
                }
            }

            // Simpan file sementara untuk pemrosesan
            $tempFilePath = $file->getPathname(); // Path sementara file yang di-upload

            // Split file berdasarkan tipe
            $splitFilePaths = null;
            if ($extension === 'pdf') {
                // Proses untuk split PDF
                $splitFilePaths = $this->splitPdfUsingFPDI($tempFilePath, $storagePath);
            } else {
                
            }

            // Simpan metadata file ke database tanpa menyimpan file asli
            Document::create([
                'original_name' => $file->getClientOriginalName(),
                'file_path' => null, // Tidak menyimpan file asli
               'unmerged_file_path' => $splitFilePaths ? implode(',', $splitFilePaths) : null,
                'upload_date' => now(),
                'is_unmerged' => $splitFilePaths ? true : false,
            ]);

            return back()->with('success', 'File berhasil di-upload dan dibagi per halaman!');
        } catch (\Exception $e) {
            // Log kesalahan
            Log::error('Kesalahan saat meng-upload file: ' . $e->getMessage());

            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Convert HTML content to PDF using DOMPDF.
     *
     * @param  string  $htmlContent
     * @param  string  $storagePath
     * @return string
     */

    protected function splitPdfUsingFPDI($filePath, $storagePath)
    {
        try {
            // Periksa apakah file ada
            if (!file_exists($filePath)) {
                throw new \Exception('File PDF tidak ditemukan: ' . $filePath);
            }

            // Periksa apakah file tidak kosong
            if (filesize($filePath) == 0) {
                throw new \Exception('File PDF kosong: ' . $filePath);
            }

            // Inisialisasi FPDI
            $pdf = new \setasign\Fpdi\Fpdi();

            // Pastikan file PDF diatur di sini
            $pageCount = $pdf->setSourceFile($filePath);
            if ($pageCount <= 0) {
                throw new \Exception('Tidak ada halaman ditemukan di file PDF: ' . $filePath);
            }

            // Buat folder untuk menyimpan file split jika belum ada
            $fullStoragePath = storage_path('app/public/' . $storagePath);
            if (!file_exists($fullStoragePath)) {
                if (!mkdir($fullStoragePath, 0777, true) && !is_dir($fullStoragePath)) {
                    throw new \Exception('Gagal membuat direktori: ' . $fullStoragePath);
                }
            }

            $splitFilePaths = [];

            // Proses setiap halaman
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $newPdf = new \setasign\Fpdi\Fpdi();

                // Set source file untuk instance baru
                $newPdf->setSourceFile($filePath);
                $templateId = $newPdf->importPage($pageNo);
                if ($templateId === false) {
                    throw new \Exception('Gagal mengimpor halaman ke-' . $pageNo);
                }

                // Dapatkan ukuran halaman asli (untuk memastikan layout konsisten)
                $size = $newPdf->getTemplateSize($templateId);
                
                // Tentukan halaman dengan ukuran yang sesuai (width dan height dari template)
                $newPdf->AddPage($size['orientation'], [$size['width'], $size['height']]);

                $newPdf->useTemplate($templateId);

                // Tentukan path untuk file split
                $splitFileName = 'SK_' . $pageNo . '.pdf';
                $newFilePath = $fullStoragePath . '/' . $splitFileName;

                // Simpan file PDF split
                $newPdf->Output($newFilePath, 'F');

                // Tambahkan path ke array
                $splitFilePaths[] = $storagePath . '/' . $splitFileName;
            }

            return $splitFilePaths;

        } catch (\Exception $e) {
            \Log::error('Kesalahan FPDI: ' . $e->getMessage());
            throw new \Exception('Terjadi kesalahan saat memproses file PDF: ' . $e->getMessage());
        }
    }
}
