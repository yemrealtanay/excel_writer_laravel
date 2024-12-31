<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ExcelController::class, 'getTest'])->name('test');
Route::post('/', [ExcelController::class, 'create'])->name('excel_form');

