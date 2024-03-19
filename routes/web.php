<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::put('/finalizarpedido',[PedidoController::class,'finalizarPedido'])->name('finalizar.pedido');
Route::get('/resumopedido', [PedidoController::class,'resumoPedido'])->name('resumo.pedido');
Route::get('/dashboard', [ProdutoController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard/{id}',[PedidoController::class,'adicionarCarrihno'])->name('adicionar.car');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/profile', [EnderecoController::class,'update'])->name('endereco.update');
Route::delete('/categoria/{id}', [CategoriaController::class,'destroy'])->name('categoria.destroy');
Route::put('/categoria/{id}', [CategoriaController::class,'update'])->name('categoria.update');
Route::get('/categoria/{id}/edit', [CategoriaController::class,'edit'])->name('categoria.edit');
Route::get('/categoria/index',[CategoriaController::class,'index'])->name('categoria.index');
Route::get('/categoria/create',[CategoriaController::class,'create'])->name('categoria.create');
Route::post('/categoria',[CategoriaController::class,'store'])->name('categoria.store');

Route::delete('/produto/{id}', [ProdutoController::class,'destroy'])->name('produto.destroy');
Route::put('/produto/{id}', [ProdutoController::class,'update'])->name('produto.update');
Route::get('/produto/{id}/edit', [ProdutoController::class,'edit'])->name('produto.edit');
Route::get('/produto/index',[ProdutoController::class,'index'])->name('produto.index');
Route::get('/produto/create',[ProdutoController::class,'create'])->name('produto.create');
Route::post('/produto',[ProdutoController::class,'store'])->name('produto.store');

require __DIR__.'/auth.php';
