<?php

use App\Http\Controllers\Atendimentos;
use App\Http\Controllers\BateCaixa;
use App\Http\Controllers\EquipeSaldoMedidores;
use App\Http\Controllers\EquipesController;
use App\Http\Controllers\FiscaisController;
use App\Http\Controllers\LancarServicos;
use App\Http\Controllers\MaterialRecebido;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/administrador/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/administrador/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/administrador/usuarios/{id}/show', [UserController::class, 'show'])->name('usuarios.show');
Route::middleware(['auth:sanctum', 'verified'])->put('/administrador/usuarios/{id}/update', [UserController::class, 'update'])->name('usuarios.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/administrador/usuarios/{id}/destroy', [UserController::class, 'destroy'])->name('usuarios.destroy');


//GESTÃO DOS SUPERVISORES

Route::middleware(['auth:sanctum', 'verified'])->get('/administrador/supervisores', [SupervisoresController::class, 'index'])->name('supervisores.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/administrador/supervisores/store', [SupervisoresController::class, 'store'])->name('supervisores.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/administrador/supervisores/{id}/show', [SupervisoresController::class, 'show'])->name('supervisores.show');
Route::middleware(['auth:sanctum', 'verified'])->put('/administrador/supervisores/{id}/update', [SupervisoresController::class, 'update'])->name('supervisores.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/administrador/supervisores/{id}/destroy', [SupervisoresController::class, 'destroy'])->name('supervisores.destroy');


//GESTÃO DOS FISCAIS

Route::middleware(['auth:sanctum', 'verified'])->get('/administrador/fiscais', [FiscaisController::class, 'index'])->name('fiscais.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/administrador/fiscais/store', [FiscaisController::class, 'store'])->name('fiscais.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/administrador/fiscais/{id}/show', [FiscaisController::class, 'show'])->name('fiscais.show');
Route::middleware(['auth:sanctum', 'verified'])->put('/administrador/fiscais/{id}/update', [FiscaisController::class, 'update'])->name('fiscais.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/administrador/fiscais/{id}/destroy', [FiscaisController::class, 'destroy'])->name('fiscais.destroy');


//GESTÃO DAS EQUIPES

Route::middleware(['auth:sanctum', 'verified'])->get('/administrador/equipes', [EquipesController::class, 'index'])->name('equipes.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/administrador/equipes/store', [EquipesController::class, 'store'])->name('equipes.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/administrador/equipes/{id}/show', [EquipesController::class, 'show'])->name('equipes.show');
Route::middleware(['auth:sanctum', 'verified'])->put('/administrador/equipes/{id}/update', [EquipesController::class, 'update'])->name('equipes.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/administrador/equipes/{id}/destroy', [EquipesController::class, 'destroy'])->name('equipes.destroy');



//MEDIDORES - CADASTRO E RECEBIDOS

Route::middleware(['auth:sanctum', 'verified'])->get('/medicao/recebido', [MedidoresRecebidos::class, 'index'])->name('medicao_recebido.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/medicao/recebido/store', [MedidoresRecebidos::class, 'store'])->name('medicao_recebido.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/medicao/recebido/{id}/show', [MedidoresRecebidos::class, 'show'])->name('medicao_recebido.show');
Route::middleware(['auth:sanctum', 'verified'])->put('/medicao/recebido/{id}/update', [MedidoresRecebidos::class, 'update'])->name('medicao_recebido.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/medicao/recebido/{id}/destroy', [MedidoresRecebidos::class, 'destroy'])->name('medicao_recebido.destroy');


//MEDIDORES - SALDO DAS EQUIPES

Route::middleware(['auth:sanctum', 'verified'])->get('/medicao/saldo', [EquipeSaldoMedidores::class, 'index'])->name('medicao_saldo.index');


//ATENDIMENTO - RETAGUARGA

Route::middleware(['auth:sanctum', 'verified'])->get('/atendimento', [Atendimentos::class, 'index'])->name('atendimentos.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/atendimento/store', [Atendimentos::class, 'store'])->name('atendimentos.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/atendimento/{id}/show', [Atendimentos::class, 'show'])->name('atendimentos.show');
Route::middleware(['auth:sanctum', 'verified'])->put('/atendimento/{id}/update', [Atendimentos::class, 'update'])->name('atendimentos.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/atendimento/{id}/destroy', [Atendimentos::class, 'destroy'])->name('atendimentos.destroy');


//PRODUTIVIDADE - LANÇAMENTO DE SERVIÇO
    
Route::middleware(['auth:sanctum', 'verified'])->get('/produtividade_servico', [LancarServicos::class, 'index'])->name('produtividade_servico.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/produtividade_servico/store', [LancarServicos::class, 'store'])->name('produtividade_servico.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/produtividade_servico/{id}/show', [LancarServicos::class, 'show'])->name('produtividade_servico.show');
Route::middleware(['auth:sanctum', 'verified'])->put('/produtividade_servico/{id}/update', [LancarServicos::class, 'update'])->name('produtividade_servico.update');


//LANÇAMENTO DE BATE CAIXA


Route::middleware(['auth:sanctum', 'verified'])->get('/produtividade_batecaixa', [BateCaixa::class, 'index'])->name('produtividade_batecaixa.index');



//MATERIAIS - RECEBIMENTO DE MATERIAIS

Route::middleware(['auth:sanctum', 'verified'])->get('/material_recebido', [MaterialRecebido::class, 'index'])->name('material_recebido.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/material_recebido/store', [MaterialRecebido::class, 'store'])->name('material_recebido.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/material_recebido/{id}/show', [MaterialRecebido::class, 'show'])->name('material_recebido.show');
