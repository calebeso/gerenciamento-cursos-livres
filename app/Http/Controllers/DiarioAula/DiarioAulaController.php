<?php

namespace App\Http\Controllers\DiarioAula;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\DiarioAula;
use App\Models\HoraAula;
use App\Models\Licao;
use App\Models\Livro;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            if ($turma->modalidade === "connections") {
                $licoes = $turma->livros->licoes;
            }else{
                if(!$this->verifyIfStudentHasLesson($turma))
                {
                    return redirect()->back()->with('error', 'Essa turma contém alunos não vinculados a livros!');
                };
            }
        }

        return view('diarios.create', compact('turma', 'licoes'));
    }

    public function verifyIfStudentHasLesson($turma)
    {
        $licoes = []; 
        foreach($turma->alunos as $alunos)
        {
            foreach($alunos->livros as $livros)
            {
                    $licoes[] = $alunos->nome;
            }
        }

        if(count($turma->alunos) <> count($licoes))
        {
            return false;
        }else{
            return true;
        }

    }

    public function store($id, Request $request)
    {
        //valida dados do formulario
        $this->validateData($request);

        $turma = Turma::findOrFail($id);

        //salva diário de aula
        $diarioDeAula = $this->storeDiarioDeAula($request, $turma);

        dd($request->all());
        
        // caso connection, escolhe uma licao para todos alunos
        if($request->licao_id){
            $connections = true;

            $livro = Livro::find($turma->livro_id);
            $licao = Licao::find($request->licao_id); 
        }else{
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
            if(!$connections)
            {
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

    public function verificaTurmaConnections($turma, $request)
    {
        if ($turma->modalidade === "connections") {
            $livro = Livro::findOrFail($turma->livro_id);
            return $livro; 
        }else{
            $livro = $request->licao;
            return $livro;
        }
    }

    public function validateData($request)
    {
        $rules = [
            'presenca' => 'required',
            'tarefa' => 'required',
        ];

        $messages = [
            'presenca.required' => 'O campo presença é obrigatório',
            'tarefa.required' => 'O campo tarefa é obrigatório',
        ];

        $validate = Validator::make($request->all(), $rules, $messages);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
    }

    public function storeDiarioDeAula($request, $turma)
    {
        $data = new DiarioAula;
        $data->data = $request->data;
        $data->turmas()->associate($turma);
        $data->save();

        return $data;
    }
}
