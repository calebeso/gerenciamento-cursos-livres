@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar turma #{{ $turma->id }}
            </li>
        </ol>
    </nav>
</div>
<div class="my-4">
    <h3>Dados da turma</h3>
    <a href="#">
        <i class="icofont-ui-edit" id="btn_editar_turma" style="font-size:14px;"> Editar</i>
    </a>
    <!--<button><i class="icofont-ui-edit" id="btn_editar_turma"></i></button>-->
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('turma.update', $turma->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group">
            <div class="col-md-2">
                <label for="Professor">Professor(a)</label>
                <select name="user" class="form-control" id="user">
                    <option value="">---</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{$turma->users->id===$user->id ? 'selected':''}}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2" id="divlivro">
                <label for="inputLivro" class="form-label mt-4 mb-2">Livro</label>
                <select name="livro" class="form-control" id="livro">
                    <option value="">---</option>
                    @foreach($livros as $livro)
                    <option value="{{ $livro->id }}">
                        {{ $livro->nome }} ({{ $livro->serie }})
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputId" class="form-label mt-4 mb-2">Código</label>
                <input type="text" name="id" class="form-control" value="{{ $turma->id }}" id="inputId" readonly>
            </div>
            <label for="inputModalidade" class="form-label mt-4 mb-2">Modalidade:</label> {{ $turma->modalidade }}<br>
        </div>
    </div>
    <div class="row my-4">
        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-success me-1">
                {{ __('Salvar') }}
            </button>
            <button class="btn btn-danger">
                {{ __('Cancelar') }}
            </button>
        </div>
    </div>
</form>
@endsection
@section('javascript')
@include('includes.toastr')
<div class="card-body">
    <div class="my-4">
        <h3>Lista de alunos</h3>
        <a href="#">
            <i class="icofont-ui-edit" id="btn_editar_lista_alunos" style="font-size:14px;"> Editar</i>
        </a>
        <!--<button><i class="icofont-ui-edit" id="btn_editar_lista_alunos"></i></button>-->
    </div>
</div>
<script>
$('#hr_inicio').mask('00:00');
$('#hr_termino').mask('00:00');
$(document).ready(function(){
    var modalidade=null
    $('input:radio[name=modalidade]').change(function() {
        modalidade=this.value
        if(modalidade==="interactive"){
            $('#divlivro').hide()
            $('#divserie').hide()
            $('#livro').value=null
            $('#serie').value=null
        }else{
            if(modalidade==="connections"){
                $('#divlivro').show()
                $('#divserie').show()
            }
        }
    });
});
</script>
@endsection