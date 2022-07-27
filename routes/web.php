<?php

use App\Http\Controllers\Alunos\AlunoController;
use App\Http\Controllers\Livros\LivroController;
use App\Http\Controllers\Usuarios\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Turmas\TurmaController;

// Rotas de autenticação
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::middleware(['auth'])->group(function() {

    Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
    Route::get('/cadastra-usuario', [UserController::class, 'register'])->name('user.create');
    Route::post('/cadastra-usuario', [UserController::class, 'store'])->name(('user.save'));
    Route::get('/editar-usuario/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/atualizar-usuario/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/excluir-usuario/{id}', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/livros', [LivroController::class, 'index'])->name('livro.index');
    Route::get('/cadastrar-livro', [LivroController::class, 'create'])->name('livro.create');
    Route::post('/cadastrar-livro', [LivroController::class, 'store'])->name('livro.store');
    Route::get('/editar-livro/{id}', [LivroController::class, 'edit'])->name('livro.edit');
    Route::patch('/atualizar-livro/{id}', [LivroController::class, 'update'])->name('livro.update');
    Route::delete('/excluir-livro/{id}', [LivroController::class, 'delete'])->name('livro.delete');
    
    Route::get('/alunos', [AlunoController::class, 'index'])->name('aluno.index');
    Route::get('/alunos/create', [AlunoController::class, 'create'])->name('aluno.create');
    Route::post('/alunos/store', [AlunoController::class, 'store'])->name('aluno.store');
    Route::post('/alunos/atualiza-status', [AlunoController::class, 'updateStatus'])->name('aluno.update-status');
    Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('aluno.edit');
    Route::patch('/alunos/atualizar-aluno/{id}', [AlunoController::class, 'update'])->name('aluno.update');
    Route::delete('/alunos/excluir-aluno/{id}', [AlunoController::class, 'delete'])->name('aluno.delete');

    Route::get('/turmas', [TurmaController::class, 'index'])->name('turma.index');

    Route::get('/cadastrar-turma',[TurmaController::class, 'create'])->name('turma.create');
    Route::post('/cadastrar-turma',[TurmaController::class,'store'])->name('turma.store');
    Route::get('/editar-turma',[TurmaController::class,'edit'])->name('turma.edit');
    Route::patch('/atualizar-turma',[TurmaController::class,'update'])->name('turma.update');
    Route::delete('/excluir-turma{id}',[TurmaController::class,'delete'])->name('turma.delete');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
