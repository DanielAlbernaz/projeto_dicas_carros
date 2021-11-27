<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DicasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dicas', [DicasController::class, 'listar'])->name('dica.listar');

Route::post('dicas', [DicasController::class, 'store'])->name('dica.salvar');

Route::get('dicas/edit/{id}', [DicasController::class, 'edit'])->name('edit.dica');

Route::get('dicas/delete/{id}', [DicasController::class, 'delete'])->name('delete.dica');

Route::post('dicas/atualizar/{id}', [DicasController::class, 'update',])->name('dica.edit');
