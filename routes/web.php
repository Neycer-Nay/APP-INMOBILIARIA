<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $imagenes = [
        'recursos/img/scz2.jpg',
        'recursos/img/scz3.jpg',
        'recursos/img/scz4.jpg',
        'recursos/img/scz5.jpg',
        'recursos/img/scz6.jpg',
        'recursos/img/scz7.jpg',

    ];
    $imagenFondo = $imagenes[array_rand($imagenes)];
    return view('modulos.inicio.inicio', compact( 'imagenFondo'));
});

Route::get('/inicio', function () {
    $imagenes = [
        'recursos/img/scz2.jpg',
        'recursos/img/scz3.jpg',
        'recursos/img/scz4.jpg',
        'recursos/img/scz5.jpg',
        'recursos/img/scz6.jpg',
        'recursos/img/scz7.jpg',
    ];
    $imagenFondo = $imagenes[array_rand($imagenes)];
    return view('modulos.inicio.inicio', compact('imagenFondo'));
})->name('inicio');

Route::get('/nosotros', function () {
    return view('modulos.nosotros.nosotros');
})->name('nosotros');

Route::prefix('casas')->group(function () {
    Route::get('/', [App\Http\Controllers\CasaController::class, 'index'])->name('casas.index');
    Route::get('/create', [App\Http\Controllers\CasaController::class, 'create'])->name('casas.create');
    
    Route::post('/', [App\Http\Controllers\CasaController::class, 'store'])->name('casas.store');
}); 

Route::get('/alquiler', [App\Http\Controllers\CasaController::class, 'casasAlquiler'])->name('alquiler');
Route::get('/venta', [App\Http\Controllers\CasaController::class, 'casasVenta'])->name('venta');
Route::get('/anticretico', [App\Http\Controllers\CasaController::class, 'casasAnticretico'])->name('anticretico');
Route::get('/traspaso', [App\Http\Controllers\CasaController::class, 'casasTraspaso'])->name('traspaso');

Route::get('/casas/{id}', [App\Http\Controllers\CasaController::class, 'show'])->name('casas.show');

