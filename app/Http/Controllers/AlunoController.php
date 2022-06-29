<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Aluno, Responsavel};
use App\Http\Requests\StoreAlunoRequest;

/**
 * Controller responsavel pela manipulação de alunos.
 * @author Eduardo Rezes
 * @version 1.0
 */
class AlunoController extends Controller
{
    /**
     * Pagina para listar todos os alunos
     */
    public function index(){
        $alunos = Aluno::all();
        //dd($alunos);
        return view('alunos.index', compact('alunos'));
        //return view('alunos.index');
    }

    /**
     * Função que mostra o formulário para criar um novo aluno
     */
    public function create(){
        return view('alunos.create');
    }

    /**
     * Função inserir um novo aluno no banco.
     * @param StoreAlunoRequest $request
     */
    public function store(StoreAlunoRequest $request){
        //dd($request->all());
        return view('alunos.index');
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
