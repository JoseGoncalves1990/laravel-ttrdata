<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadFilesController;

// Example Routes
Route::view('/', 'landing');


Route::resource('upload', UploadFilesController::class);
Route::view('output','output');