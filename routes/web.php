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
 