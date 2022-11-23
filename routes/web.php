<?php

use App\Http\Controllers\FiscaisController;
use App\Http\Controllers\SupervisoresController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/', function () {
    return Inertia::render('Auth/Login');
});


//ROTAS PARA A GESTÃO DOS USUÁRIOS

Route::get('/administrador/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::post('/administrador/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/administrador/usuarios/{id}/show', [UserController::class, 'show'])->name('usuarios.show');
Route::put('/administrador/usuarios/{id}/update', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/administrador/usuarios/{id}/destroy', [UserController::class, 'destroy'])->name('usuarios.destroy');


//ROTAS PARA A GESTÃO DOS SUPERVISORES

Route::get('/administrador/supervisores', [SupervisoresController::class, 'index'])->name('supervisores.index');
Route::post('/administrador/supervisores/store', [SupervisoresController::class, 'store'])->name('supervisores.store');
Route::get('/administrador/supervisores/{id}/show', [SupervisoresController::class, 'show'])->name('supervisores.show');
Route::put('/administrador/supervisores/{id}/update', [SupervisoresController::class, 'update'])->name('supervisores.update');
Route::delete('/administrador/supervisores/{id}/destroy', [SupervisoresController::class, 'destroy'])->name('supervisores.destroy');


//ROTAS PARA A GESTÃO DOS FISCAIS

Route::get('/administrador/fiscais', [FiscaisController::class, 'index'])->name('fiscais.index');
Route::post('/administrador/fiscais/store', [FiscaisController::class, 'store'])->name('fiscais.store');
Route::get('/administrador/fiscais/{id}/show', [FiscaisController::class, 'show'])->name('fiscais.show');
Route::put('/administrador/fiscais/{id}/update', [FiscaisController::class, 'update'])->name('fiscais.update');
Route::delete('/administrador/fiscais/{id}/destroy', [FiscaisController::class, 'destroy'])->name('fiscais.destroy');
