<?php

namespace App\Http\Controllers\Turmas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;
/*AS LINHAS ABAIXO TALVEZ SEJAM NECESSÁRIAS NA VALIDAÇÃO?*/
//OBS: SIM, necessarias para enviar dados para alimentar os selects na criação e edição
use App\Models\User;
use App\Models\Livro;
use App\Models\Aluno;
use Illuminate\Support\Facades\Validator;
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
        $livros=Livro::all();

        return view('turmas.create',compact('users','livros'));
    }
    
    public function store(Request $request)
    {
        $turma = new Turma; 
        $turma->idioma=$request->idioma;
        $turma->modalidade=$request->modalidade;
        $vetor_dias=$request->input('dias_semana');
        $escolhidos='';
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
        $turma->status="Em formação";
        $turma->save();
        if($turma->modalide==='Connections'){
            return redirect()->route('turma.infoconnections',$turma->id)->with('success', 'Turma connections criada com sucesso');;
        }else if($turma->modalidade='Interactive'){
            return redirect()->route('turma.infointeractive',$turma->id)->with('success', 'Turma interactive criada com sucesso');;
        }
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
            if($turma->modalidade=='Connections'){
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
        //dd($request->all());
        $rules =  [
            'user' => 'required',
            'idioma' => 'required',
        ];
        $messages = [
            'user.required' => 'O campo usuário (professor) é obrigatório',
            'idioma.required' => 'O campo idioma é obrigatório',
        ];
        $validate = Validator::make($request->all(), $rules, $messages);
        if($validate->fails()){
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        $turma = Turma::find($id);
        if($turma->exists()){
            $turma->idioma=$request->idioma;
            $turma->modalidade=$request->modalidade;
            $vetor_dias=$request->input('dias_semana');
            $escolhidos='';
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
            return redirect()->route('turma.index')->with('success', 'Turma alterada com sucesso');;
        }else{
            // retorna página de listagem com aviso de livro não encontrado na base
            return view('turmas.index')->with('turmas' , $turmas);
        }
    }
    
    public function delete($id)
    {
        $turma = Turma::find($id);
        if($turma->exists()){
            /*Validação para confirmar se não há alunos vinculados à turma. Se houverem,
            será feita apenas uma exclusão lógica, alterando o status da turma para "Encerrada"
            */
            /*if(){
                $turma->status="Arquivada";
            }else{
                $turma->delete();
            }*/
            $turma->delete();
            return redirect()->route('turma.index');
        }else{
            // retorna página de listagem com aviso de turma não encontrada na base
        }
    }
    public function matricularalunos(Request $request){
        //$lesson->livros()->associate($livro);
    }
    
    public function listadealunos(Request $request){
        $turma = Turma::find($request->id);
        if($turma->exists()){
            return view('turmas.listadealunos')->with('turma',$turma);
        }else{
            return view('turmas.index')->with('turmas' , $turmas);
        }
    }

    //FUNÇÃO PARA TESTAR O TYPEAHEAD
    function action(Request $request){
        $data=$request->all();
        $query=$data['query'];
        $filter_data=Aluno::select('nome')
            ->where('nome','LIKE','%'.$query.'%')
            ->get();
        return response()->json($filter_data);
    }
}
    