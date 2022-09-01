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
        Não há alunos matriculados nessa turma por enquanto
        </div>
        <div class="my-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control @error('buscaaluno') is-invalid @enderror" id="buscaaluno" name="buscaaluno" placeholder="Matricular aluno(a)"/>
                    <button id="btn_add_aluno" type="button" style="margin-top:5px;" class="btn btn-outline-success" onclick="add_aluno()">+</button>
                </div>
            </div>
            <div>
                <ol id="listaAlunos"></ol>
            </div>
        </div>
        </form>
    </div>
</form>
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
            document.getElementById('listaAlunos').innerHTML += "<li name='aluno_a_adicionar[]'>"+nomealuno+"</li>";
        }
    }
</script>
@endsection