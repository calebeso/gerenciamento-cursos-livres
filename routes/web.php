<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

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

Route::get('/', function () {
    return view('layouts.app');
});

/**
 * --------------------------------------------------------------------------
 * Alunos Routes
 * --------------------------------------------------------------------------
 * @author Eduardo Rezes
 * @version 1.0
 * 
 * As rotas a seguir são responsáveis por gerenciar os alunos.
 */

// Lista todos os alunos
Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');

// Mostra o formulário para criar um novo aluno
Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');

// Salva um novo aluno no banco de dados
Route::post('/alunos/store', [AlunoController::class, 'store'])->name('alunos.store');

// Mostra um aluno específico
Route::get('/alunos/{aluno}', [AlunoController::class, 'show'])->name('alunos.show');

// Mostra o formulário para editar um aluno
Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');

// Deleta um aluno
Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');