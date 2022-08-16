<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Responsavel};
use Illuminate\Support\Facades\Validator;

class ResponsavelController extends Controller
{
    public function index() 
    {
        $responsavel = Responsavel::all();
        return view('responsavel.index')->with('responsaveis', $responsavel);
    }

    public function create() 
    {
        return view('responsavel.create');
    }

    public function store(Request $request) 
    {
        $rules = [
            'nome' => 'required|string|max:255',
            'parentesco' => 'required|string|max:255',
            'telefone' => 'required',
        ];
        
        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'parentesco.required' => 'O campo parentesco é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
        ];

        $validate = Validator::make($request->all(), $rules, $messages);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }

        $responsavel = new Responsavel();
        $responsavel->nome = $request->nome;
        $responsavel->parentesco = $request->parentesco;
        $responsavel->telefone = $request->telefone;

        $responsavel->save();
        return redirect()->route('responsavel.index')->with('success', 'Responsável cadastrado com sucesso!');
    }

    public function edit($id) 
    {
        $responsavel = Responsavel::find($id);
        if($responsavel->exists()) {
            return view('responsavel.edit')->with('responsavel', $responsavel);
        } else {
            //TODO: Redirecionar para pagina de erro
        }
    }

    public function update(Request $request, $id) {
        $rules = [
            'nome' => 'required|string|max:255',
            'parentesco' => 'required|string|max:255',
            'telefone' => 'required',
        ];
        
        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'parentesco.required' => 'O campo parentesco é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
        ];

        $validate = Validator::make($request->all(), $rules, $messages);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }

        $responsavel = Responsavel::find($id);
        
        if ($responsavel->exists()) {
            $responsavel->nome = $request->nome;
            $responsavel->parentesco = $request->parentesco;
            $responsavel->telefone = $request->telefone;
            $responsavel->update();
            return redirect()->route('responsavel.index')->with('success', 'Responsável atualizado');
        } else {
            return redirect()->route('responsavel.index')->with('error', 'Erro no sistema, contate o administrador!');
        }
    }

    public function delete($id){
        $responsavel = Responsavel::find($id);
        
        if($responsavel->exists()) {
            $responsavel->delete();
            return redirect()->route('responsavel.index')->with('success', 'Responsável excluído com sucesso!');
        } else {
            return redirect()->route('responsavel.index')->with('error', 'Erro no sistema, contate o administrador!');
        }
    }
}
