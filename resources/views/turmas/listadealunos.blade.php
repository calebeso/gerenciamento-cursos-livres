@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Turma
                {{$turma->modalidade}} #{{ $turma->id }}
            </li>
        </ol>
    </nav>
</div>
<div class="my-4">
    <h3>Dados da turma</h3>
    <a href="{{ route('turma.edit', $turma->id ) }}">
        <i class="icofont-ui-edit" id="btn_editar_turma" style="font-size:14px;"> Editar</i>
    </a>
    <div class="col-md-6">
        <div>
            <label for="Professor">Professor(a): {{$turma->users->name}} </label>
        </div>
        <div>
            <label for="Dias da semana">{{ $turma->dias_semana }} {{$turma->hr_inicio}}-{{$turma->hr_termino}}
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="my-4">
            <h3>Lista de alunos</h3>
            <a href="#">
                <i class="icofont-ui-edit" id="btn_editar_lista_alunos" style="font-size:14px;"> Editar</i>
            </a>
            <input type="text" class="form-control @error('buscaaluno') is-invalid @enderror" id="buscaaluno" name="buscaaluno" placeholder="Procurar aluno(a)"/>
            <div id="listaAlunos"></div>
            </div>
        </form>
    </div>
</form>
@endsection
@section('javascript')
@include('includes.toastr')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var path="{{url('lista-alunos/action')}}";
    $('#buscaaluno').typeahead({
        source:function(query,process){
            return $.get(path,{query:query},function(data){
                return process(data);
            });
        }
    });
</script>
@endsection