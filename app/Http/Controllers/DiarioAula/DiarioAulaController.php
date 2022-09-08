<?php

namespace App\Http\Controllers\DiarioAula;

use App\Http\Controllers\Controller;
use App\Models\DiarioAula;
use App\Models\Livro;
use App\Models\Turma;

class DiarioAulaController extends Controller
{
    public function index($id)
    {
        $diarios = DiarioAula::where('turma_id', $id)->get();

        return view('diarios.index', compact('id', 'diarios'));
    }

    public function create($id)
    {
        $turma = Turma::findOrFail($id);
        $licoes = 0;
        if ($turma) {
            if ($this->verificaTurmaContemAlunos($turma)) {
                if ($turma->modalidade === "connections") {
                    $licoes = $turma->livros->licoes;
                } else {
                    if (!$this->verificaTodosAlunosContemLicoes($turma)) {
                        return redirect()->back()->with('error', 'Essa turma contém alunos não vinculados a livros!');
                    };
                }
            }else{
                return redirect()->back()->with('error', 'Essa turma não contém alunos vinculados!');
            };
        }

        return view('diarios.create', compact('turma', 'licoes'));
    }


    public function verificaTurmaConnections($turma, $request)
    {
        if ($turma->modalidade === "connections") {
            $livro = Livro::findOrFail($turma->livro_id);
            return $livro;
        } else {
            $livro = $request->licao;
            return $livro;
        }
    }

    public function verificaTurmaContemAlunos($turma)
    {
        if (count($turma->alunos) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verificaTodosAlunosContemLicoes($turma)
    {
        $licoes = [];
        foreach ($turma->alunos as $alunos) {
            foreach ($alunos->livros as $livros) {
                $licoes[] = $alunos->nome;
            }
        }

        if (count($turma->alunos) <> count($licoes)) {
            return false;
        } else {
            return true;
        }
    }
}
