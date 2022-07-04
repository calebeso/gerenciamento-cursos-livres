<?php

namespace App\Http\Controllers\Livros;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index')->with('livros' , $livros);
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {   
        $livro = new Livro; 
        $livro->nome = $request->nome;
        $livro->serie = $request->serie;
        $livro->idioma = $request->idioma;
        $livro->save();

        return view('livros.index');
    }

    public function edit($id)
    {
        $livro = Livro::find($id);
        
        if($livro->exists()){
            return view('livros.edit')->with('livro' , $livro);
        }else{
            // retorna página de listagem com aviso de livro não encontrado na base
        }
    }

    public function update(Request $request, $id)
    {
        // validations 
        $livro = Livro::find($id);
        if($livro->exists()){
            $livro->nome = $request->nome; 
            $livro->serie = $request->serie; 
            $livro->idioma = $request->idioma; 
            $livro->save();
            return redirect()->route('livro.index');
        }else{
            // retorna página de listagem com aviso de livro não encontrado na base
        }
    }

    public function delete($id)
    {
        $livro = Livro::find($id);
        
        if($livro->exists()){
            $livro->delete();
            return redirect()->route('livro.index');
        }else{
            // retorna página de listagem com aviso de livro não encontrado na base
        }
    }
}
