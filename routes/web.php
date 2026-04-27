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
Route::get('/blog', function () {
    return view('modulos.blog.blog');
})->name('blog');

Route::get('/login', [App\Http\Controllers\UserController::class, 'indexBoton'])->name('login');

Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login.submit');

Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/User', function () {
    return app(App\Http\Controllers\UserController::class)->index();
})->name('user.index');


Route::get('/crear-admin', function () {
    return app(App\Http\Controllers\UserController::class)->crearAdmin();
});

Route::middleware('auth')->group(function () {
    Route::post('/', [App\Http\Controllers\CasaController::class, 'store'])->name('casas.store');
    Route::get('/casas/create', [App\Http\Controllers\CasaController::class, 'create'])->name('casas.create');
    Route::get('/casas/index', [App\Http\Controllers\CasaController::class, 'index'])->name('casas.index');
    Route::get('/casas/{id}/edit', [App\Http\Controllers\CasaController::class, 'edit'])->name('casas.edit');
    Route::put('/casas/{id}', [App\Http\Controllers\CasaController::class, 'update'])->name('casas.update');
    Route::delete('/casas/{id}', [App\Http\Controllers\CasaController::class, 'destroy'])->name('casas.destroy');

    Route::get('/propietarios', [App\Http\Controllers\PropietarioController::class, 'index'])->name('propietarios.index');
    Route::post('/propietarios', [App\Http\Controllers\PropietarioController::class, 'store'])->name('propietarios.store');
    Route::put('/propietarios/{propietario}', [App\Http\Controllers\PropietarioController::class, 'update'])->name('propietarios.update');
    Route::delete('/propietarios/{propietario}', [App\Http\Controllers\PropietarioController::class, 'destroy'])->name('propietarios.destroy');

    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update');
    Route::patch('/usuarios/{id}/toggle-status', [App\Http\Controllers\UserController::class, 'userEstado'])->name('usuarios.userEstado');
});

// Rutas publicas para mostrar casas por tipo de estado
Route::get('/alquiler', [App\Http\Controllers\CasaController::class, 'casasAlquiler'])->name('alquiler');
Route::get('/venta', action: [App\Http\Controllers\CasaController::class, 'casasVenta'])->name('venta');
Route::get('/anticretico', [App\Http\Controllers\CasaController::class, 'casasAnticretico'])->name('anticretico');
Route::get('/traspaso', [App\Http\Controllers\CasaController::class, 'casasTraspaso'])->name('traspaso');

//Ruta para ver detalles de una casa
Route::get('/casas/{id}', [App\Http\Controllers\CasaController::class, 'show'])->name('casas.show');


