<?php

namespace App\Http\Controllers\Turmas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;
/*AS LINHAS ABAIXO TALVEZ SEJAM NECESSÁRIAS NA VALIDAÇÃO?*/
//OBS: SIM, necessarias para enviar dados para alimentar os selects na criação e edição
use App\Models\User;
use App\Models\Livro;
//use App\Models\Aluno;

/**
 * Controller responsavel pela manipulação de turmas.
 * A parte de inserção de alunos na turma será polida posteriormente utilizando ajax
 * @author Jéssica Lima
 */
class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return view('turmas.index')->with('turmas' , $turmas);
    }
    
    public function create()
    {
        $users=User::all();
        /*Verificar aqui com um for each se o status do user é inativo. Se for, não acrescentar no select*/
        $livros=Livro::all();

        //RETORNANDO MAIS DE UM VETOR USANDO COMPACT
        return view('turmas.create',compact('users','livros'));
        //return view('turmas.create')->with('data',['users'=>$users,'livros'=>$livros]);
        /*COMO ACESSAR OS DADOS DEPOIS:
            $data->users->id;
        */
    }
    
    public function store(Request $request)
    {
        $turma = new Turma; 
        $turma->idioma=$request->idioma;
        $turma->modalidade=$request->modalidade;
        $turma->dias_semana=$request->dias_semana;
        $turma->horario=$request->horario;
        $turma->user_id=$request->user_id;
        $turma->livro_id=$request->livro_id;
        $turma->status=1;
        $turma->save();
    
        return view('turmas.index');
    }
    
        public function edit($id)
        {
            $turma = Turma::find($id);
            
            if($turma->exists()){
                return view('turmas.edit')->with('turma' , $turma);
            }else{
                // retorna página de listagem com aviso de turma não encontrado na base
            }
        }
    
        public function update(Request $request, $id)
        {
            //adicionar validações mais tarde
            $turma = Turma::find($id);
            if($turma->exists()){
                $turma->idioma=$request->idioma;
                $turma->modalidade=$request->modalidade;
                $turma->horario=$request->horario;
                $turma->user_id=$request->user_id;
                $turma->livro_id=$request->livro_id;
                //agora sim, permitir alterar o status?
                $turma->status=$request->status;
                $turma->save();
                return redirect()->route('turma.index');
            }else{
                // retorna página de listagem com aviso de livro não encontrado na base
            }
        }
    
        public function delete($id)
        {
            $turma = Turma::find($id);
            /*Como fazer a validação pelo laravel se a tabela composta Turmas_aluno (?) não configura um model e o aluno não possui atributo id_turma(s)?
            RESOLVER DEPOIS
            */
            $alunos=Aluno::findAll();

            if($turma->exists() && $turma->alunos()){
                $turma->delete();
                return redirect()->route('turma.index');
            }else{
                // retorna página de listagem com aviso de turma não encontrado na base
            }
        }
    }
    
