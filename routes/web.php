<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/dashboard', function () {return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/help', function () {return view('documents.help');
})->middleware(['auth', 'verified'])->name('help');
Route::get('/File', function () {return view('documents.File');
})->middleware(['auth', 'verified'])->name('File');
Route::get('/Split', function () {return view('documents.index');
=======
Route::get('/SP2D', function () {
    return view('SP2D');
})->middleware(['auth', 'verified'])->name('SP2D');

Route::get('/Split', function () {
    return view('documents.index');
>>>>>>> 36af8e67efc88b6173013fcdd09e0581a9171bb5
})->middleware(['auth', 'verified'])->name('Split');

Route::get('/Convert', function () {
    return view('converts.index');
})->middleware(['auth', 'verified'])->name('Convert');

Route::get('/MyProfile', function () {
    return view('MyProfile');
})->middleware(['auth', 'verified'])->name('MyProfile');

Route::get('/Settings', function () {
    return view('Settingse');
})->middleware(['auth', 'verified'])->name('Settingse');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::get('/documents/Split', [DocumentController::class, 'Split'])->name('documents.Split');
    Route::post('/documents/upload', [DocumentController::class, 'upload'])->name('documents.upload');

    // Update this line to use GET for dashboard
    Route::get('/dashboard', [DocumentController::class, 'dashboard'])->name('dashboard');

    Route::get('/documents/show/{uploadDate}/{folderName}', [DocumentController::class, 'show'])->name('documents.show');
    Route::get('/documents/file/{uploadDate}/{fileName}', [DocumentController::class, 'showFile'])->name('documents.showFile');
});

require __DIR__.'/auth.php';
