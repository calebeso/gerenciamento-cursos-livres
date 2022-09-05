<?php

namespace App\Http\Controllers\Responsavel;

use App\Http\Controllers\Controller;
use App\Models\{ Aluno, Responsavel };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResponsavelController extends Controller
{
    public function index($id)
    {
        $aluno = Aluno::find($id);
        if($aluno->exists()){
            return view('alunos.responsaveis.index', compact('aluno'));
        }else{
            return redirect()->route('alunos.index')->with('error', 'Aluno não encontrado');
        }
    }

    public function store(Request $request, $id)
    {
        $rules = [
            'nome' => 'required',
            'parentesco' => 'required|parentesco',
            'telefone' => 'required'
        ];

        $message = [
            'nome.required' => 'O campo nome é obrigatório',
            'parentesco.required' => 'O campo parentesco é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório'
        ];
        
        $validate = Validator::make($request->all(), $rules, $message);
        
        if($validate->fails()){
            return redirect()->back()->with('error', $validate->errors()->first());
        }

        $aluno = Aluno::find($id);

        if($aluno->exists())
        {
            $responsavel = new Responsavel();
            $responsavel->nome = $request->nome;
            $responsavel->parentesco = $request->parentesco;
            $responsavel->telefone = $request->telefone;
            $responsavel->alunos()->associate($aluno);
            $responsavel->save();
            
            return redirect()->route('responsaveis.index', $id)->with('success', 'Responsável criado com sucesso');
        }
    }

    public function edit($id_aluno, $id_responsavel)
    {
        $aluno = Aluno::find($id_aluno);

        if($aluno->exists())
        {
            $responsavel = Responsavel::findOrFail($id_responsavel);

            return view('alunos.responsaveis.edit', compact('aluno', 'responsavel'));
        }
    }

    public function update(Request $request, $id, $responsavel)
    {
        $rules = [
            'nome' => 'required',
            'parentesco' => 'required|parentesco',
            'telefone' => 'required',
        ];

        $message = [
            'nome.required' => 'O campo nome é obrigatório',
            'parentesco.required' => 'O campo parentesco é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
        ];

        $validate = Validator::make($request->all(), $rules, $message);

        if($validate->fails())
        {
            return redirect()->back()->with('error', $validate->errors()->first());
        }

        $aluno = Aluno::find($id);

        if($aluno->exists())
        {
            $responsavel = Responsavel::findOrFail($responsavel);
            $responsavel->nome = $request->nome;
            $responsavel->parentesco = $request->parentesco ;
            $responsavel->telefone = $request->telefone;
            $responsavel->alunos()->associate($aluno);
            $responsavel->save();
            
            return redirect()->route('responsaveis.index', $id)->with('success', 'Responsável atualizado com sucesso');
        }else{
            return redirect()->route('responsaveis.index', $id)->with('error', 'Aluno não encontrado');
        }
    }

    public function delete($aluno_id, $id)
    {
        $aluno = Aluno::find($aluno_id);

        if($aluno->exists())
        {
            $responsavel = Responsavel::findOrFail($id);
            $responsavel->delete();
            
            return redirect()->route('responsaveis.index', $aluno_id)->with('success', 'Responsável excluído com sucesso');
        }else{
            return redirect()->route('responsaveis.index', $aluno_id)->with('error', 'Aluno não encontrado');
        }
    }
}