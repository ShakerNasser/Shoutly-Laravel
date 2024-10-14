<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatrixController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/matrix/{length}', [MatrixController::class, 'generateMatrix']);