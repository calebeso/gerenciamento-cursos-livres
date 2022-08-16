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
        //dd($request->all());
        $turma = new Turma; 
        $turma->idioma=$request->idioma;
        /*A modalidade da turma não pode ser alterada*/
        $turma->modalidade=$request->modalidade;
        //TRATAR, virá como Array
        $vetor_dias=$request->input('dias_semana');
        $escolhidos='';
        /*for($i=0;$i<=6;$i++){
            $escolhidos.=$vetor_dias[$i]->val();
        }*/
        $r=0;
        foreach ($vetor_dias as $dia){
            if(($dia!=NULL)&&($dia!='')){
                if($r!=0){
                    $escolhidos.='/';
                }
                $escolhidos.=$dia;
                $r++;
            }
        }
        //dd($vetor_dias);
        //dd($escolhidos);
        $turma->dias_semana=$escolhidos;
        $turma->hr_inicio=$request->hr_inicio;
        $turma->hr_termino=$request->hr_termino;
        $user=User::find($request->user);
        $turma->users()->associate($user);
        $livro=new Livro;
       if(!empty($request->livro)){
            $livro=Livro::find($request->livro);
        }else{
            $livro=NULL;
        }
        $turma->livros()->associate($livro);
        //$turma->user_id=$request->user_id;
        //$turma->livro_id=$request->livro_id;
        $turma->status=1;
        $turma->save();
        if($turma->modalide==='Connections'){
            return redirect()->route('turma.infoconnections',$turma->id);
        }else if($turma->modalidade='Interactive'){
            return redirect()->route('turma.infointeractive',$turma->id);
        }
        //return view('turmas.index');
    }
    
        public function edit($id)
        {
            $turma = Turma::find($id);
            $users=User::all();
            if($turma->exists()){
                if($turma->modalidade==='Connections'){
                    $livros=Livro::all();
                    return view('turmas.edit-turma-connections',compact('turma','users','livros'));
                }else if($turma->modalidade=='Interactive'){
                    return view('turmas.edit-turma-interactive',compact('turma','users'));
                }else{
                }
            }
        }
        public function info($id)
        {
            $turma = Turma::find($id);
            if($turma->exists()){
                /*$aux_nomeserie='---';
                $aux_nomelivro='---';*/
                if($turma->modalidade=='Connections'){
                    /*$aux_nomeserie=$turma->livro->serie;
                    $aux_nomelivro=$turma->livro->nome;*/
                    return view('turmas.infoconnections')->with('turma',$turma);
                }else if($turma->modalidade=='Interactive'){
                    return view('turmas.infointeractive')->with('turma',$turma);
                }
                /*Tentando fazer uma blade info que funcione para ambas as
                modalidades. Se não der certo, comentar a linha abaixo e
                descomentar os 'return view' de cada if*/
                //return view('turmas.info',compact('turma','aux_nomeserie','aux_nomelivro'));
            }else{
                return view('turmas.index')->with('turmas' , $turmas);
            }
        }
    
        public function update(Request $request, $id)
        {
            //adicionar validações mais tarde
            $turma = Turma::find($id);
            if($turma->exists()){
                $turma->idioma=$request->idioma;
                $turma->modalidade=$request->modalidade;
                $vetor_dias=$request->input('dias_semana');
                $escolhidos='';
                /*for($i=0;$i<=6;$i++){
                    $escolhidos.=$vetor_dias[$i]->val();
                }*/
                $r=0;
                foreach ($vetor_dias as $dia){
                    if(($dia!=NULL)&&($dia!='')){
                        if($r!=0){
                            $escolhidos.='/';
                        }
                        $escolhidos.=$dia;
                        $r++;
                    }
                }
                $turma->dias_semana=$escolhidos;
                $turma->status=$request->status;
                $user=User::find($request->user);
                $turma->users()->associate($user);
                $livro=new Livro;
                if(!empty($request->livro)){
                    $livro=Livro::find($request->livro);
                }else{
                    $livro=NULL;
                }
                $turma->save();
                return redirect()->route('turma.index');
            }else{
                // retorna página de listagem com aviso de livro não encontrado na base
                return view('turmas.index')->with('turmas' , $turmas);
            }
        }
    
        public function delete($id)
        {
            $turma = Turma::find($id);
            if($turma->exists()){
                $turma->delete();
                return redirect()->route('turma.index');
            }else{
                // retorna página de listagem com aviso de turma não encontrado na base
            }
        }
    }
    