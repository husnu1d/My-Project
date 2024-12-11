<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Document;
use Illuminate\Support\Facades\File;


class DocumentController extends Controller
{
    /**
     * Display the upload form.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $documents = Document::paginate(10); // Menggunakan paginate untuk mendapatkan data yang dipaginasi
        return view('documents.index', compact('documents'));
    }

    public function Split()
{
    // Ambil semua folder di dalam storage/split
    $splitPath = storage_path('app/public/Split'); // Path direktori Split
    $folders = [];

    // Pastikan direktori Split ada
    if (File::exists($splitPath)) {
        // Ambil semua sub-direktori di dalam folder Split
        $directories = File::directories($splitPath);

        foreach ($directories as $directory) {
            // Ambil nama folder
            $folderName = basename($directory);
            
            // Ambil file dalam folder
            $files = File::files($directory);
            $fileNames = [];
            
            // Ambil nama file untuk setiap file dalam folder
            foreach ($files as $file) {
                $fileNames[] = $file->getFilename();
            }
            
            // Menyimpan nama folder dan file terkait
            $folders[$folderName] = $fileNames;
        }
    }

    // Kirim data folder dan file ke tampilan
    return view('documents.split_folders', compact('folders'));
}


    public function show($id)
    {
        // Ambil document berdasarkan ID
        $document = Document::findOrFail($id);
        
        // Ambil path folder berdasarkan unmerged_file_path
        $splitPath = storage_path('app/public/Split/' . $document->original_name); // Contoh, sesuaikan dengan logika penyimpanan Anda
        $files = [];

        // Pastikan folder ada
        if (File::exists($splitPath)) {
            // Ambil semua file dalam folder
            $files = File::files($splitPath);
        }

        // Kirim data ke tampilan
        return view('documents.show', compact('document', 'files'));
    }



//    public function Split()
//     {
//         // Fetch documents that have been split, with pagination
//         $documents = Document::whereNotNull('unmerged_file_path')->paginate(10);

//         // Array to hold folders and files
//         $folders = [];

//         if ($documents->isEmpty()) {
//             Log::info('No documents found.');
//         } else {
//             Log::info('Number of documents found: ' . $documents->count());
//         }

//         foreach ($documents as $document) {
//             // Split the paths from the 'unmerged_file_path' column
//             $paths = explode(',', $document->unmerged_file_path);

//             foreach ($paths as $path) {
//                 // Validate the path
//                 if (!empty($path)) {
//                     // Extract folder and file from the path
//                     $folderName = basename(dirname($path)); // Folder name
//                     $fileName = basename($path); // File name
//                     $folders[$folderName][] = $fileName;
//                 }
//             }
//         }

//         return view('documents.split_folders', compact('folders'));
//     }



    // protected function getSplitFolderContents($folderPath){
    //     $folders = [];
        
    //     // Pastikan folder ada
    //     if (file_exists($folderPath)) {
    //         $directories = array_filter(glob($folderPath . '/*'), 'is_dir');
            
    //         // Ambil daftar file di setiap folder
    //         foreach ($directories as $directory) {
    //             $files = glob($directory . '/*.pdf');
    //             $folders[] = [
    //                 'folder' => basename($directory),
    //                 'files' => $files,
    //             ];
    //         }
    //     }

    //     return $folders;
    // }

    /**
     * Handle file upload and processing.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function upload(Request $request){
    $request->validate([
        'document' => 'required|mimes:pdf,docx|max:10240', // 10MB
    ]);

    try {
        $file = $request->file('document');
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        Log::info('File diunggah: ' . $originalFileName . '.' . $extension);

        // Format tanggal upload
        $uploadDate = now()->format('d-m-Y');

        // Path penyimpanan file asli
        $storagePath = 'documents/' . $originalFileName . '.' . $extension;
        $absoluteFilePath = storage_path('app/public/' . $storagePath);

        // Simpan file di folder documents
        $file->move(storage_path('app/public/documents'), $originalFileName . '.' . $extension);

        Log::info('File asli disimpan di: ' . $absoluteFilePath);

        // Folder hasil split
        $splitFolderPath = storage_path('app/public/Split/' . $uploadDate . '/' . $originalFileName);
        if (!file_exists($splitFolderPath)) {
            mkdir($splitFolderPath, 0777, true);
        }

        // Proses split PDF jika file PDF
        $splitFilePaths = null;
        if ($extension === 'pdf') {
            $splitFilePaths = $this->splitPdfUsingFPDI($absoluteFilePath, $splitFolderPath);
        }

        // Simpan metadata ke database
        Document::create([
            'original_name' => $file->getClientOriginalName(),
            'file_path' => $storagePath,
            'upload_date' => now(),
            'is_unmerged' => $splitFilePaths ? true : false,
            'unmerged_file_path' => $splitFilePaths ? implode(',', $splitFilePaths) : null,
        ]);

        return back()->with('success', 'File berhasil di-upload dan dibagi per halaman!');
    } catch (\Exception $e) {
        Log::error('Kesalahan saat mengunggah file: ' . $e->getMessage());

        return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}


protected function splitPdfUsingFPDI($filePath, $splitFolderPath)
{
    try {
        // Pastikan file ada
        if (!file_exists($filePath)) {
            throw new \Exception('File PDF tidak ditemukan: ' . $filePath);
        }

        // Inisialisasi FPDI
        $pdf = new \setasign\Fpdi\Fpdi();
        $pageCount = $pdf->setSourceFile($filePath);
        if ($pageCount <= 0) {
            throw new \Exception('Tidak ada halaman ditemukan di file PDF: ' . $filePath);
        }

        // Ambil nama asli file
        $originalFileName = pathinfo($filePath, PATHINFO_FILENAME);

        // Pastikan folder untuk hasil split sudah ada
        if (!is_dir($splitFolderPath)) {
            if (!mkdir($splitFolderPath, 0777, true)) {
                throw new \Exception('Gagal membuat folder untuk file hasil split: ' . $splitFolderPath);
            }
        }

        // Array untuk menyimpan path file hasil split
        $splitFilePaths = [];

        // Proses setiap halaman dari file PDF
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $newPdf = new \setasign\Fpdi\Fpdi();
            $newPdf->setSourceFile($filePath);
            $templateId = $newPdf->importPage($pageNo);

            // Dapatkan ukuran halaman asli
            $size = $newPdf->getTemplateSize($templateId);
            $newPdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $newPdf->useTemplate($templateId);

            // Tentukan nama dan path untuk file split
            $splitFileName = 'SM_' . $pageNo . '.pdf';
            $newFilePath = $splitFolderPath . '/' . $splitFileName;

            // Simpan file PDF hasil split
            $newPdf->Output($newFilePath, 'F');

            // Tambahkan path ke array hasil split
            $splitFilePaths[] = 'Split/' . basename($splitFolderPath) . '/' . $splitFileName;
        }

        return $splitFilePaths;

    } catch (\Exception $e) {
        \Log::error('Kesalahan FPDI: ' . $e->getMessage());
        throw new \Exception('Terjadi kesalahan saat memproses file PDF: ' . $e->getMessage());
    }
}




}
