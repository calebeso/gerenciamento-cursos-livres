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

// Mostra a pagina de formulário para criação de um novo aluno
Route::get('/aluno/cadastrar-aluno', [AlunoController::class, 'create'])->name('aluno.create');

// Salva um novo aluno no banco de dados
Route::post('/aluno/cadastrar-aluno', [AlunoController::class, 'store'])->name('aluno.store');

// Mostra o formulário para editar um aluno
Route::get('/aluno/editar-aluno/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');

// Atualiza um aluno no banco de dados
Route::patch('/aluno/atualizar-aluno/{id}', [AlunoController::class, 'update'])->name('aluno.update');

// Deleta um aluno
Route::delete('/aluno/excluir-aluno/{id}', [AlunoController::class, 'delete'])->name('aluno.delete');