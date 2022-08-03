<?php

namespace App\Http\Controllers\Licoes;

use App\Http\Controllers\Controller;
use App\Models\Licao;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LicaoController extends Controller
{
    public function index($id)
    {
        $livro = Livro::find($id);
        
        if($livro->exists()){
            return view('livros.licoes.index', compact('livro'));
        }
    }

    public function store(Request $request, $id)
    {
        $rules = [
            'nome' => 'required'
        ];

        $message = [
            'nome.required' => 'O campo nome é obrigatório'
        ];

        $validate = Validator::make($request->all(), $rules, $message);
        
        if($validate->fails()){
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        
        $livro = Livro::find($id);
        
        if($livro->exists()){
            $lesson = new Licao(); 
            $lesson->nome = $request->nome; 
            $lesson->livros()->associate($livro);
            $lesson->save();

            return redirect()->route('licoes.index', $id)->with('success', 'Lição criada com sucesso');
        }
    }

    public function edit($id_livro, $id_licao)
    {
        $livro = Livro::find($id_livro);
        
        if($livro->exists()){
            $lesson = Licao::findOrFail($id_licao); 

            return view('livros.licoes.edit', compact('livro', 'lesson'));

        }
    }

    public function update(Request $request, $id, $licao)
    {
        $rules = [
            'nome' => 'required'
        ];

        $message = [
            'nome.required' => 'O campo nome é obrigatório'
        ];

        $validate = Validator::make($request->all(), $rules, $message);
        
        if($validate->fails()){
            return redirect()->back()->with('error', $validate->errors()->first());
        }

        $livro = Livro::find($id);
        
        if($livro->exists()){
            $lesson = Licao::findOrFail($licao); 
            $lesson->nome = $request->nome; 
            $lesson->livros()->associate($livro);
            $lesson->save();

            return redirect()->route('licoes.index', $id)->with('success', 'Lição atualizada com sucesso');
        }
    }

    public function delete($livro_id, $id)
    {
        $livro = Livro::find($livro_id);
        
        if($livro->exists()){
            $lesson = Licao::findOrFail($id); 
            $lesson->delete();

            return redirect()->route('licoes.index', $livro_id)->with('success', 'Lição removido com sucesso');
        }
    }
}
