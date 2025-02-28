<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas protegidas con autenticación
Route::middleware(['auth'])->group(function () {
    Route::resource('autores', AutorController::class)->parameters([
        'autores' => 'autor'
    ]);
    Route::resource('libros', LibroController::class);
});