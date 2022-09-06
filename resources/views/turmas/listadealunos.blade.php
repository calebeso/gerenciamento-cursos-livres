@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Turma
                {{$turma->modalidade}} #{{ $turma->id }} | Professor(a): {{$turma->users->name}} | Data e hora: {{ $turma->dias_semana }} {{$turma->hr_inicio}} às {{$turma->hr_termino}}
            </li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-header">
        <h3>Alunos matriculados:</h3>
    </div>
        <div class="card-body">
            <div class="my-4">
                @if(!empty($vetoralunos))
                    <table class="table">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de nascimento</th>
                            @if($turma->modalidade==='Interactive')
                                <th scope="col">Livro</th>
                            @endif
                            <th scope="col">Remover</th>
                        </tr>
                    @foreach($vetoralunos as $am)
                        <tr>
                            <th scope="col">{{$am->id}}</td>
                            <td>{{$am->nome}}</td>
                            <td>{{$am->data_nascimento}}</td>
                            @if($turma->modalidade==='Interactive')
                                <td>
                                    <a href="{{ route('turma.vincularalunoalivro',['id'=>$turma->id,'idaluno'=>$am->id]) }}" class="edit-icon me-1">
                                        <i class="icofont-ui-edit"></i>
                                    </a>
                                    {{$am->rg}}
                                </td>
                            @endif
                            <td>
                                <form class="d-inline-block" method="POST" action="{{ route('turma.desvincularaluno',['id'=>$turma->id,'idaluno'=>$am->id]) }}">
                                @csrf
                                @method('POST')
                                <button id="excluir">
                                    <a class="remove-icon"><i class="icofont-close-circled"></i></a>
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                @else
                    Não há alunos matriculados nessa turma no momento
                @endif
            </div>
            <div class="my-4">
            <form action="{{ route('turma.vincularalunos',$turma->id) }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control @error('buscaaluno') is-invalid @enderror" id="buscaaluno" name="buscaaluno" placeholder="Matricular aluno(a)"/>
                        <button id="btn_add_aluno" type="button" style="margin-top:5px;" class="btn btn-outline-success" onclick="add_aluno()">+</button>
                    </div>
                    
                </div>
                <div class="mt-4" class="shadow-p-3 mb-5 bg-white rounded">
                    <table id="listaAlunos"></table>
                    <div id="botoesLista"></div>
                </div>
            </form>
            </div>
        </div>
</div>
@endsection
@section('javascript')
@include('includes.toastr')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
<script type="text/javascript">
    var route="{{ url('autocomplete-search') }}";
    $('#buscaaluno').typeahead({
        source:function(query,process){
            return $.get(route,{
                query:query
            },function(data){
                return process(data);
            });
        }
    });
    function add_aluno() {
        var nomealuno=document.getElementById("buscaaluno").value;
        if(nomealuno!=""){
            document.getElementById('botoesLista').innerHTML="<button type='submit' class='btn btn-primary'>Vincular alunos</button>";

            //document.getElementById('listaAlunos').innerHTML += "<tr><td width='400px'>";
            document.getElementById('listaAlunos').innerHTML += "<input type='text' class='form-control' style='background-color:transparent; border: 0; font-size: 1em;' name='aluno_a_matricular[]' value='"+nomealuno+"' readonly/>";
            //document.getElementById('listaAlunos').innerHTML +="</td></tr>"; 
        }
    }
</script>
@endsection