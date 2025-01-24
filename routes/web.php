<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\VideoController;




use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);

Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/upload', [VideoController::class, 'showUploadForm'])->name('videos.upload');
    Route::post('/upload', [VideoController::class, 'handleUpload'])->name('videos.handleUpload');
});

require __DIR__.'/auth.php';
