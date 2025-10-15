<?php

use Illuminate\Support\Facades\Route;

// Ruta para buscar casas
Route::get('/casas/buscar', [App\Http\Controllers\CasaController::class, 'buscar'])->name('casas.buscar');

Route::get('/', [App\Http\Controllers\CasaController::class, 'inicio']);
Route::get('/inicio', [App\Http\Controllers\CasaController::class, 'inicio'])->name('inicio');

Route::get('/nosotros', function () {
    return view('modulos.nosotros.nosotros');
})->name('nosotros');
Route::get('/servicios', function () {
    return view('modulos.servicios.servicios');
})->name('servicios');

Route::post('/', [App\Http\Controllers\CasaController::class, 'store'])->name('casas.store');
Route::get('/casas/create', [App\Http\Controllers\CasaController::class, 'create'])->name('casas.create');
Route::get('/casas/index', [App\Http\Controllers\CasaController::class, 'index'])->name('casas.index');
Route::get('/casas/{id}/edit', [App\Http\Controllers\CasaController::class, 'edit'])->name('casas.edit');
Route::put('/casas/{id}', [App\Http\Controllers\CasaController::class, 'update'])->name('casas.update');
Route::delete('/casas/{id}', [App\Http\Controllers\CasaController::class, 'destroy'])->name('casas.destroy');


Route::get('/alquiler', [App\Http\Controllers\CasaController::class, 'casasAlquiler'])->name('alquiler');
Route::get('/venta', [App\Http\Controllers\CasaController::class, 'casasVenta'])->name('venta');
Route::get('/anticretico', [App\Http\Controllers\CasaController::class, 'casasAnticretico'])->name('anticretico');
Route::get('/traspaso', [App\Http\Controllers\CasaController::class, 'casasTraspaso'])->name('traspaso');

//Ruta para ver detalles de una casa
Route::get('/casas/{id}', [App\Http\Controllers\CasaController::class, 'show'])->name('casas.show');


