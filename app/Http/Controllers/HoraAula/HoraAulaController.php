<?php

namespace App\Http\Controllers\HoraAula;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiarioTurma;
use App\Models\Aluno;
use App\Models\DiarioAula;
use App\Models\HoraAula;
use App\Models\Licao;
use App\Models\Livro;
use App\Models\Turma;
use Illuminate\Http\Request;

class HoraAulaController extends Controller
{
    public function edit($id, $diario)
    {
        $turma = Turma::findOrFail($id);
        $diario = DiarioAula::findOrFail($diario);
        $licoes = 0;

        return view('diarios.edit', compact('turma', 'diario', 'licoes'));
    }

    public function store($id, DiarioTurma $request)
    {
        $turma = Turma::findOrFail($id);

        //salva diário de aula
        $diarioDeAula = $this->storeDiarioDeAula($request, $turma);

        // caso connection, escolhe uma licao para todos alunos
        if ($request->licao_id) {
            $connections = true;

            $livro = Livro::find($turma->livro_id);
            $licao = Licao::find($request->licao_id);
        } else {
            // caso interactive, cada aluno possui sua propria licao
            $connections = false;

            $licaoDoAluno = $request->licao;
        }

        $idAluno = $request->id_aluno;
        $presenca = $request->presenca;
        $tarefa = $request->tarefa;
        $preparo = $request->preparo;
        $fala = $request->fala;
        $audicao = $request->audicao;
        $leitura = $request->leitura;
        $escrita = $request->escrita;
        $observacoes = $request->observacoes;

        for ($i = 0; $i < count($idAluno); $i++) {
            $aluno = Aluno::findOrFail($idAluno[$i]);
            $data = new HoraAula();
            $data->presenca = $presenca[$i];
            $data->tarefa = $tarefa[$i];
            $data->preparacao = $preparo[$i];
            $data->nota_fala = $fala[$i];
            $data->nota_audicao = $audicao[$i];
            $data->nota_leitura = $leitura[$i];
            $data->nota_escrita = $escrita[$i];
            $data->observacoes = $observacoes[$i];
            $data->alunos()->associate($aluno);
            if (!$connections) {
                $licao = Licao::findOrFail($licaoDoAluno[$i]);
                $livro = $licao->livros;
            }

            $data->livros()->associate($livro);
            $data->licoes()->associate($licao);
            $data->diariosAula()->associate($diarioDeAula);
            $data->save();
        }

        return redirect()->route('diario.index', $turma->id)->with('success', 'Novo diário registrado com sucesso!');
    }

    public function show($id, $diario)
    {

        $turma = Turma::findOrFail($id);
        $diario = DiarioAula::findOrFail($diario);

        return view('diarios.show', compact('diario', 'turma'));
    }

    public function storeDiarioDeAula($request, $turma)
    {
        $data = new DiarioAula;
        $data->data = $request->data;
        $data->turmas()->associate($turma);
        $data->save();

        return $data;
    }

    public function updateDiarioDeAula($request, $diario)
    {
        $data = DiarioAula::findOrFail($diario);
        $data->data = $request->data;
        $data->save();

        return $data;
    }

    public function update($id, $diario, DiarioTurma $request)
    {
        $turma = Turma::findOrFail($id);

        $this->updateDiarioDeAula($request, $diario);

        if ($request->licao_id) {
            $connections = true;

            $livro = Livro::find($turma->livro_id);
            $licao = Licao::find($request->licao_id);
        } else {
            // caso interactive, cada aluno possui sua propria licao
            $connections = false;

            $licaoDoAluno = $request->licao;
        }

        $idAluno = $request->id_aluno;
        $idHoraAula = $request->id_hora_aula;
        $presenca = $request->presenca;
        $tarefa = $request->tarefa;
        $preparo = $request->preparo;
        $fala = $request->fala;
        $audicao = $request->audicao;
        $leitura = $request->leitura;
        $escrita = $request->escrita;
        $observacoes = $request->observacoes;

        for ($i = 0; $i < count($idAluno); $i++) {
            $data = HoraAula::findOrFail($idHoraAula[$i]);

            $data->presenca = $presenca[$i];
            $data->tarefa = $tarefa[$i];
            $data->preparacao = $preparo[$i];
            $data->nota_fala = $fala[$i];
            $data->nota_audicao = $audicao[$i];
            $data->nota_leitura = $leitura[$i];
            $data->nota_escrita = $escrita[$i];
            $data->observacoes = $observacoes[$i];
            if (!$connections) {
                $licao = Licao::findOrFail($licaoDoAluno[$i]);
                $livro = $licao->livros;
            }

            $data->livros()->associate($livro);
            $data->licoes()->associate($licao);
            $data->save();
        }

        return redirect()->route('diario.index', $turma->id)->with('success', 'Diário de Aula atualizado com sucesso!');
    }
}
