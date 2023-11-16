<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroWebController;

Route::get('/libros', [LibroWebController::class, 'index']);
Route::get('/libros/create', [LibroWebController::class, 'create']);
Route::post('/libros', [LibroWebController::class, 'store']);
Route::get('/libros/{id}/edit', [LibroWebController::class, 'edit']);
Route::put('/libros/{id}', [LibroWebController::class, 'update']);
Route::delete('/libros/{id}', [LibroWebController::class, 'destroy']);


Route::get('/', function () {
    return view('layouts/app');
});
