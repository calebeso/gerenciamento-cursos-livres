<?php

namespace App\Http\Controllers\Alunos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Aluno, Responsavel};
use App\Http\Requests\StoreAlunoRequest;
use Illuminate\Support\Facades\Validator;

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
    $rules = [
      'nome' => 'required|string|max:255',
      'cpf' => 'required|cpf',
      'rg'  => 'required',
      'telefone' => 'required',
      'data_nascimento' => 'required|date'
    ];

    $messages = [
      'nome.required' => 'O campo nome é obrigatório',
      'cpf.required' => 'O campo CPF é obrigatório',
      'cpf.cpf' => 'O campo CPF deve ser preenchido com um CPF válido',
      'rg.required' => 'O campo RG é obrigatório',
      'telefone.required' => 'O campo telefone é obrigatório',
      'data_nascimento.required' => 'O campo data de nascimento é obrigatório',
      'data_nascimento.date' => 'O campo data de nascimento deve ser preenchido com uma data válida',
    ];

    $validate = Validator::make($request->all(), $rules, $messages);

    if ($validate->fails()) {
      return redirect()->back()->with('error', $validate->errors()->first());
    }

    $aluno = new Aluno();
    $aluno->nome = $request->nome;
    $aluno->data_nascimento = $request->data_nascimento;
    $aluno->status = $request->status == "1";
    $aluno->telefone = $request->telefone;
    $aluno->rg = $request->rg;
    $aluno->cpf = $request->cpf;

    $aluno->save();
  
    $aluno->matricula = $aluno->id;
    $aluno->update();

    return redirect()->route('aluno.index')->with('success', 'Novo aluno cadastrado');
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
    } else {
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

    $rules = [
      'nome' => 'required|string|max:255',
      'cpf' => 'required|cpf',
      'rg'  => 'required',
      'telefone' => 'required',
      'data_nascimento' => 'required|date'
    ];

    $messages = [
      'nome.required' => 'O campo nome é obrigatório',
      'cpf.required' => 'O campo CPF é obrigatório',
      'cpf.cpf' => 'O campo CPF deve ser preenchido com um CPF válido',
      'rg.required' => 'O campo RG é obrigatório',
      'telefone.required' => 'O campo telefone é obrigatório',
      'data_nascimento.required' => 'O campo data de nascimento é obrigatório',
      'data_nascimento.date' => 'O campo data de nascimento deve ser preenchido com uma data válida',
    ];

    $validate = Validator::make($request->all(), $rules, $messages);

    if ($validate->fails()) {
      return redirect()->back()->with('error', $validate->errors()->first());
    }

    $aluno = Aluno::find($id);

    if ($aluno->exists()) {
      $id = $request->id;
      $aluno->nome = $request->nome;
      $aluno->data_nascimento = $request->data_nascimento;
      $aluno->telefone = $request->telefone;
      $aluno->rg = $request->rg;
      $aluno->cpf = $request->cpf;
      $aluno->save();
      return redirect()->route('aluno.index')->with('success', 'Aluno atualizado');
    } else {
      //Apresentar pop-pup de erro.
      return view('alunos.edit');
    }
  }

  public function delete($id)
  {
    $aluno = Aluno::find($id);

    dd($aluno, $id);
    if ($aluno->exists()) {
      $aluno->delete();
      return redirect()->route('aluno.index')->with('success', 'Aluno removido');
    } else {
      //Apresentar pop-pup de erro.
    }
  }

  public function updateStatus(Request $request)
  {
    if($request->ajax())
    {
      $aluno = Aluno::findOrFail($request->id);
      $aluno->status = $request->status;
      $aluno->save(); 
      return response()->json(["status" => "success"]);
    }
  }
}
