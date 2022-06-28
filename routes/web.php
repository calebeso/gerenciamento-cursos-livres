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