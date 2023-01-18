<?php

use App\Http\Controllers\Atendimentos;
use App\Http\Controllers\EquipesController;
use App\Http\Controllers\FiscaisController;
use App\Http\Controllers\MedidoresRecebidos;
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


//GESTÃO DOS USUÁRIOS

Route::get('/administrador/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::post('/administrador/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/administrador/usuarios/{id}/show', [UserController::class, 'show'])->name('usuarios.show');
Route::put('/administrador/usuarios/{id}/update', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/administrador/usuarios/{id}/destroy', [UserController::class, 'destroy'])->name('usuarios.destroy');


//GESTÃO DOS SUPERVISORES

Route::get('/administrador/supervisores', [SupervisoresController::class, 'index'])->name('supervisores.index');
Route::post('/administrador/supervisores/store', [SupervisoresController::class, 'store'])->name('supervisores.store');
Route::get('/administrador/supervisores/{id}/show', [SupervisoresController::class, 'show'])->name('supervisores.show');
Route::put('/administrador/supervisores/{id}/update', [SupervisoresController::class, 'update'])->name('supervisores.update');
Route::delete('/administrador/supervisores/{id}/destroy', [SupervisoresController::class, 'destroy'])->name('supervisores.destroy');


//GESTÃO DOS FISCAIS

Route::get('/administrador/fiscais', [FiscaisController::class, 'index'])->name('fiscais.index');
Route::post('/administrador/fiscais/store', [FiscaisController::class, 'store'])->name('fiscais.store');
Route::get('/administrador/fiscais/{id}/show', [FiscaisController::class, 'show'])->name('fiscais.show');
Route::put('/administrador/fiscais/{id}/update', [FiscaisController::class, 'update'])->name('fiscais.update');
Route::delete('/administrador/fiscais/{id}/destroy', [FiscaisController::class, 'destroy'])->name('fiscais.destroy');


//GESTÃO DAS EQUIPES

Route::get('/administrador/equipes', [EquipesController::class, 'index'])->name('equipes.index');
Route::post('/administrador/equipes/store', [EquipesController::class, 'store'])->name('equipes.store');
Route::get('/administrador/equipes/{id}/show', [EquipesController::class, 'show'])->name('equipes.show');
Route::put('/administrador/equipes/{id}/update', [EquipesController::class, 'update'])->name('equipes.update');
Route::delete('/administrador/equipes/{id}/destroy', [EquipesController::class, 'destroy'])->name('equipes.destroy');



//MEDIDORES - CADASTRO E RECEBIDOS

Route::get('/medicao/recebido', [MedidoresRecebidos::class, 'index'])->name('medicao_recebido.index');
Route::post('/medicao/recebido/store', [MedidoresRecebidos::class, 'store'])->name('medicao_recebido.store');
Route::get('/medicao/recebido/{id}/show', [MedidoresRecebidos::class, 'show'])->name('medicao_recebido.show');
Route::delete('/medicao/recebido/{id}/destroy', [MedidoresRecebidos::class, 'destroy'])->name('medicao_recebido.destroy');



//ATENDIMENTO - RETAGUARGA

Route::get('/atendimento', [Atendimentos::class, 'index'])->name('atendimentos.index');
Route::post('/atendimento/store', [Atendimentos::class, 'store'])->name('atendimentos.store');
Route::get('/atendimento/{id}/show', [Atendimentos::class, 'show'])->name('atendimentos.show');
Route::put('/atendimento/{id}/update', [Atendimentos::class, 'update'])->name('atendimentos.update');
Route::delete('/atendimento/{id}/destroy', [Atendimentos::class, 'destroy'])->name('atendimentos.destroy');