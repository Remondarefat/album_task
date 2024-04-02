<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Album routes
Route::resource('albums', AlbumController::class);

Route::get('/albums/{album}/confirm-delete', [AlbumController::class, 'confirmDelete'])->name('albums.confirmDelete');
Route::post('albums/{album}/move-pictures', [AlbumController::class, 'movePictures'])->name('albums.movePictures');
// Picture routes
Route::resource('pictures', PictureController::class);
