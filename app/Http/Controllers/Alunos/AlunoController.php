<?php

namespace App\Http\Controllers\Alunos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
   * Pagina responsavel pela listagem de alunos
   */
  public function index()
  {
    $alunos = Aluno::all();
    return view('alunos.index')->with('alunos', $alunos);
  }

  /**
   * Função responsavel por mostrar o formulário de criar novo aluno
   */
  public function create()
  {
    return view('alunos.create');
  }

  /**
   * Função responsavel por inserir um novo aluno no banco.
   * @param StoreAlunoRequest $request
   */
  public function store(Request $request)
  {
    //dd($request);
    $aluno = new Aluno();
    $aluno->nome = $request->nome;
    $aluno->data_nascimento = $request->data_nascimento;
    $aluno->matricula = 1;
    $aluno->status = $request->status=="1";
    $aluno->telefone = $request->telefone;
    $aluno->rg = $request->rg;
    $aluno->cpf = $request->cpf;

    

    $aluno->save();
    $aluno->matricula = $aluno->id;
    $aluno->update();

    return redirect()->route('alunos.index');
  }

  /**
   * Função responsavel pela edição de um aluno.
   * @param $id
   */
  public function edit($id)
  {
    $aluno = Aluno::find($id);
    if ($aluno->exists()) {
      return view('alunos.edit')->with('aluno', $aluno);
    }else{
      // Retornar pagina de listagem com aviso de aluno não encontrado.
    }
  }

  /**
   * Função responsavel por atualizar um aluno no banco.
   * @param StoreAlunoRequest $request
   * @param $id
   */
  public function update(Request $request, $id)
  {
    //Validações
    $aluno = Aluno::find($id);
    if ($aluno->exists()) {
      $id = $request->id;
      $aluno->nome = $request->nome;
      $aluno->data_nascimento = $request->data_nascimento;
      //$aluno->matricula = renderMatricula($id); //$request->matricula;
      $aluno->status = $request->status;
      $aluno->telefone = $request->telefone;
      $aluno->rg = $request->rg;
      $aluno->cpf = $request->cpf;
      $aluno->save();
      return redirect()->route('alunos.index');
    } else {
      //Apresentar pop-pup de erro.
      return view('alunos.edit');
    }
  }

  public function delete($id)
  {
    $aluno = Aluno::find($id);
    if ($aluno->exists()) {
      $aluno->delete();
      return redirect()->route('alunos.index');
    } else {
      //Apresentar pop-pup de erro.
    }
  }

  public function renderMatricula($id)
  {
    $matricula = $id + 1;
    return $matricula; 
  }
 
}
