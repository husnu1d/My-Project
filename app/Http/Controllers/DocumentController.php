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

public function index()
{
    // Tentukan path folder documents
    $filePath = storage_path('app/public/documents');
    
    // Pastikan folder documents ada
    if (!file_exists($filePath)) {
        return back()->withErrors(['error' => 'Folder documents tidak ditemukan.']);
    }

    // Ambil semua file dalam folder documents
    $files = File::files($filePath);

    // Ambil data file dan simpan ke array untuk dikirim ke view
    $documents = [];
    foreach ($files as $file) {
        $documents[] = [
            'original_name' => basename($file),
            'file_path' => asset('storage/documents/' . basename($file)),
            'created_at' => date('d-m-Y H:i:s', filemtime($file)),
            'size' => number_format(filesize($file) / 1024, 2) . ' KB', // Ukuran file dalam KB
            'author' => 'ADMIN', // Ganti dengan data pengarang jika tersedia
            'type' => $file->getExtension(),
        ];
    }

    // Kirim semua dokumen ke view tanpa paginasi
    return view('documents.index', compact('documents'));
}

public function dashboard()
{
    // Define the path to the Split folder
    $splitPath = storage_path('app/public/Split'); 

    // Initialize an array to hold the folder data
    $foldersData = [];
    $uploadDate = ''; // Initialize the variable for upload date

    // Check if the Split folder exists
    if (File::exists($splitPath)) {
        // Get all subdirectories inside the Split directory (which are the upload date folders)
        $dateFolders = File::directories($splitPath);

        // Iterate through the date folders
        foreach ($dateFolders as $dateFolder) {
            // Get the name of the date folder (which is the upload date)
            $uploadDate = basename($dateFolder); // Set the upload date dynamically

            // Get all subdirectories inside the date folder (which are the actual folders inside the upload date folder)
            $subFolders = File::directories($dateFolder);

            // Iterate through the subfolders and gather the folder data
            foreach ($subFolders as $subFolder) {
                $subFolderName = basename($subFolder);
                
                // Add the folder name to the foldersData array
                $foldersData[] = [
                    'folder_name' => $subFolderName, // Folder name (without date)
                    'folder_path' => 'storage/Split/' . basename($uploadDate) . '/' . $subFolderName,
                    'file_count' => count(File::files($subFolder)), // Number of files in the folder
                    'upload_date' => $uploadDate, // Pass the upload date for the link
                ];
            }
        }
    }

    // Return the view with the folders data
    return view('dashboard', compact('foldersData'));
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

        // Kirim data folder dan file ke tampilan, pastikan folderName juga disertakan
        return view('documents.split_folders', compact('folders'));
    }




public function show($uploadDate, $folderName)
{
    // Check if we're viewing the root (date) folder or a subfolder
    if ($folderName == 'root') {
        $folderPath = storage_path('app/public/Split/' . $uploadDate);
        $folders = File::directories($folderPath); // Get all subfolders inside the date folder
        return view('documents.show', compact('folders', 'uploadDate', 'folderName'));
    } else {
        // If it's a subfolder inside the date folder
        $folderPath = storage_path('app/public/Split/' . $uploadDate . '/' . $folderName);
        
        if (File::isDirectory($folderPath)) {
            $subFolders = File::directories($folderPath); // Get subfolders inside the subfolder
            $files = File::files($folderPath); // Get files inside the subfolder
        } else {
            // Handle case where folder is not found
            return back()->withErrors(['error' => 'Folder not found.']);
        }

        return view('documents.show', compact('subFolders', 'files', 'uploadDate', 'folderName'));
    }
}

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