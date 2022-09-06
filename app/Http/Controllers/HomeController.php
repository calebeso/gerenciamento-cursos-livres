<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Aluno, Turma, Livro};


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alunos = Aluno::all();
        $livros = Livro::all();
        $t_connections = Turma::where('modalidade', 'connections')->get();
        $t_interactive = Turma::where('modalidade', 'interactive')->get();

        return view('home', compact('alunos', 't_connections', 't_interactive', 'livros'));
    }
}
