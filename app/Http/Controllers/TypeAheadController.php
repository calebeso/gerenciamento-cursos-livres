<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aluno;

class TypeAheadController extends Controller
{
    public function index(){
        return view('listadealunos');
    }
    public function autocompleteSearch(Request $request){
        /*$query=$request->get('query');
        $filterResult=Aluno::where('nome','LIKE','%'.$query.'%')->get();
        return response()->json($filterResult);*/

        return Aluno::select('nome')
            ->where('nome','like',"%{$request->term}%")
            ->pluck('nome');
    }
}
