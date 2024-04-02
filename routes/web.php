<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Album routes
Route::resource('albums', AlbumController::class);

// Picture routes
Route::resource('pictures', PictureController::class);
