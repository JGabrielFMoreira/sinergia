<?php

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


Route::get('/', function() {return Inertia::render('Auth/Login');});

 
//ROTAS PARA A GESTÃO DOS USUÁRIOS

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::post('/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/show', [UserController::class, 'show'])->name('usuarios.show');
Route::put('/usuarios/{id}/update', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}/destroy', [UserController::class, 'destroy'])->name('usuarios.destroy');
