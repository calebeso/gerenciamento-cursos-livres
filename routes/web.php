<?php

use App\Http\Controllers\Alunos\AlunoController;
use App\Http\Controllers\DiarioAula\DiarioAulaController;
use App\Http\Controllers\HoraAula\HoraAulaController;
use App\Http\Controllers\Responsavel\ResponsavelController;
use App\Http\Controllers\Livros\LivroController;
use App\Http\Controllers\Licoes\LicaoController;
use App\Http\Controllers\Usuarios\UserController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Turmas\TurmaController;
use App\Http\Controllers\TypeAheadController;

// Rotas de autenticação
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::middleware(['auth'])->group(function() {

    //Usuarios
    Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
    Route::get('/cadastra-usuario', [UserController::class, 'register'])->name('user.create');
    Route::post('/cadastra-usuario', [UserController::class, 'store'])->name(('user.save'));
    Route::get('/editar-usuario/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/atualizar-usuario/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/excluir-usuario/{id}', [UserController::class, 'delete'])->name('user.delete');

    //Diario de Aula 
    Route::get('/turma/{id}/diarios', [DiarioAulaController::class, 'index'])->name('diario.index');
    Route::get('/turma/{id}/novo-diario', [DiarioAulaController::class, 'create'])->name('diario.create');

    //Hora Aula
    Route::get('/turma/{id}/visualizar-diario/{diario}', [HoraAulaController::class, 'show'])->name('diario.show');
    Route::get('/turma/{id}/editar-diario/{diario}', [HoraAulaController::class, 'edit'])->name('diario.edit');
    Route::post('/turma/{id}/novo-diario', [HoraAulaController::class, 'store'])->name('diario.store');
    Route::patch('/turma/{id}/atualizar-diario/{diario}', [HoraAulaController::class, 'update'])->name('diario.update');

    //Livros
    Route::get('/livros', [LivroController::class, 'index'])->name('livro.index');
    Route::get('/cadastrar-livro', [LivroController::class, 'create'])->name('livro.create');
    Route::post('/cadastrar-livro', [LivroController::class, 'store'])->name('livro.store');
    Route::get('/editar-livro/{id}', [LivroController::class, 'edit'])->name('livro.edit');
    Route::patch('/atualizar-livro/{id}', [LivroController::class, 'update'])->name('livro.update');
    Route::delete('/excluir-livro/{id}', [LivroController::class, 'delete'])->name('livro.delete');
    
    //Lições
    Route::get('/livros/{id}/licoes', [LicaoController::class, 'index'])->name('licoes.index');
    Route::get('/livros/{id}/editar-licao/{licao}', [LicaoController::class, 'edit'])->name('licoes.edit');
    Route::post('/livros/{id}/cadastrar-licao', [LicaoController::class, 'store'])->name('licoes.create');
    Route::patch('/livros/{id}/atualizar-licao/{licao}', [LicaoController::class, 'update'])->name('licoes.update');
    Route::delete('/livros/{id}/excluir-licao/{licao}', [LicaoController::class, 'delete'])->name('licoes.delete');

    //Alunos
    Route::get('/alunos', [AlunoController::class, 'index'])->name('aluno.index');
    Route::get('/alunos/create', [AlunoController::class, 'create'])->name('aluno.create');
    Route::post('/alunos/store', [AlunoController::class, 'store'])->name('aluno.store');
    Route::post('/alunos/atualiza-status', [AlunoController::class, 'updateStatus'])->name('aluno.update-status');
    Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('aluno.edit');
    Route::patch('/alunos/atualizar-aluno/{id}', [AlunoController::class, 'update'])->name('aluno.update');
    Route::delete('/alunos/excluir-aluno/{id}', [AlunoController::class, 'delete'])->name('aluno.delete');

    //Responsaveis
    Route::get('/alunos/{id}/responsavel', [ResponsavelController::class, 'index'])->name('responsavel.index');
    Route::get('/alunos/{id}/editar-responsavel/{responsavel}', [ResponsavelController::class, 'edit'])->name('responsavel.edit');
    Route::post('/alunos/{id}/cadastrar-responsavel', [ResponsavelController::class, 'store'])->name('responsavel.create');
    Route::patch('/alunos/{id}/atualizar-responsavel/{responsavel}', [ResponsavelController::class, 'update'])->name('responsavel.update');
    Route::delete('/alunos/{id}/excluir-responsavel/{responsavel}', [ResponsavelController::class, 'delete'])->name('responsavel.delete');
    
    //Turmas
    Route::get('/turmas', [TurmaController::class, 'index'])->name('turma.index');
    Route::get('/cadastrar-turma',[TurmaController::class, 'create'])->name('turma.create');
    Route::post('/cadastrar-turma',[TurmaController::class,'store'])->name('turma.store');
    Route::post('/turmas/{id}/vincular-alunos',[TurmaController::class,'vincularalunos'])->name('turma.vincularalunos');
    Route::post('/turmas/{id}/desvincular-aluno/{idaluno}',[TurmaController::class,'desvincularaluno'])->name('turma.desvincularaluno');
    Route::get('/turmas/{id}/vincular-aluno-a-livro/{idaluno}',[TurmaController::class,'vincularalunoalivro'])->name('turma.vincularalunoalivro');
    Route::post('/turmas/alterar-livro/{idaluno}',[TurmaController::class,'alterarlivro'])->name('turma.alterarlivro');
    Route::get('/editar-turma/{id}',[TurmaController::class,'edit'])->name('turma.edit');
    Route::get('/editar-turma-connections/{id}',[TurmaController::class,'edit'])->name('turma.editconnections');
    Route::get('/editar-turma-interactive/{id}',[TurmaController::class,'edit'])->name('turma.editinteractive');
    Route::patch('/atualizar-turma/{id}',[TurmaController::class,'update'])->name('turma.update');
    Route::delete('/excluir-turma{id}',[TurmaController::class,'delete'])->name('turma.delete');
    Route::get('/turmas/{id}/lista-alunos', [TurmaController::class, 'listadealunos'])->name('turma.listadealunos');

    //TURMAS -> rotas que provavelmente serão inutilizadas e removidas em breve
    Route::get('/info-turma/{id}',[TurmaController::class,'info'])->name('turma.info');
    Route::get('/info-turma-connections/{id}',[TurmaController::class,'info'])->name('turma.infoconnections');
    Route::get('/info-turma-interactive/{id}',[TurmaController::class,'info'])->name('turma.infointeractive');

    //TURMAS -> rotas necessárias para Typeahead
    Route::get('/home',[TypeAheadController::class,'index']);
    Route::get('/autocomplete-search',[TypeAheadController::class,'autocompleteSearch']);
    Route::get('/home',[TypeAheadController::class,'index']);
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
