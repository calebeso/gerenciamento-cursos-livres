<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

/**
 * Controller responsavel pela manipulação de alunos.
 * @author Eduardo Rezes
 */
class AlunoController extends Controller
{
    /**
     * Pagina para listar todos os alunos
     */
    public function index(){
        //Aluno::all();
        //dd(Aluno::all());
        return view('alunos.index');
    }

    /**
     * Função para criar um novo aluno.
     */
    public function create(Request $request){
        /**
         * Instancia de Aluno para inserção no banco de dados;
         */
        // Aluno::create([
        //     'nome' => $request->nome,
        //     'data_nascimento' => $request->data_nascimento,
        //     'matricula' => $request->matricula,
        //     'status' => $request->status,
        //     'telefone' => $request->telefone,
        //     'rg' => $request->rg,
        //     'cpf' => $request->cpf,
        // ]);
        //dd($request->all());
        return view('alunos.create');
    }

    /**
     * Está função tem por finalidade buscar todos os registro de alunos no banco de dados, 
     * e retornar um array com os dados para a pagina de alunos.
     */
    public function list() {
        $alunos = Aluno::all();
        return view('alunos.list', compact('alunos'));
    }
}
