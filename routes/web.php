<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/Split', function () {return view('documents/index');
})->middleware(['auth', 'verified'])->name('Split');
Route::get('/File', function () {return view('fileku');
})->middleware(['auth', 'verified'])->name('File');
Route::get('/Settings', function () {return view('Settings');
})->middleware(['auth', 'verified'])->name('Settings');
// Route::get('/SP2D', function () {return view('SP2D');
// })->middleware(['auth', 'verified'])->name('SP2D');


Route::get('/MyProfile', function () {return view('MyProfile');
})->middleware(['auth', 'verified'])->name('MyProfile');

Route::get('/setting', function () {return view('setting');
})->middleware(['auth', 'verified'])->name('setting');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::post('/documents/upload', [DocumentController::class, 'upload'])->name('documents.upload');

});

require __DIR__.'/auth.php';
