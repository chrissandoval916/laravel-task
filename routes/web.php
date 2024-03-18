<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('register', [RegisterController::class, 'create'])
    ->name('register');
Route::post('register', [RegisterController::class, 'store']);
