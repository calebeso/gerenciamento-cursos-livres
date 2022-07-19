<?php

use App\Http\Controllers\Alunos\AlunoController;
use App\Http\Controllers\Livros\LivroController;
use Illuminate\Support\Facades\Route;

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

Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');

Route::get('/livros', [LivroController::class, 'index'])->name('livro.index');

Route::get('/cadastrar-livro', [LivroController::class, 'create'])->name('livro.create');
Route::post('/cadastrar-livro', [LivroController::class, 'store'])->name('livro.store');
Route::get('/editar-livro/{id}', [LivroController::class, 'edit'])->name('livro.edit');
Route::patch('/atualizar-livro/{id}', [LivroController::class, 'update'])->name('livro.update');
Route::delete('/excluir-livro/{id}', [LivroController::class, 'delete'])->name('livro.delete');

