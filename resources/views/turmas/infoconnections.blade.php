@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Informações da Turma
                {{$turma->modalidade==='Connections' ? 'Connections':'Interactive'}}
                #{{ $turma->id }}
            </li>
        </ol>
    </nav>
</div>
<div class="my-4">
    <h3>Dados da turma</h3>
    <a href="{{ route('turma.edit', $turma->id ) }}">
        <i class="icofont-ui-edit" id="btn_editar_turma" style="font-size:14px;"> Editar</i>
    </a>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label for="Professor">Professor(a)</label>
                    <input type="text" name="user" class="form-control" value="{{ $turma->users->name }}" id="user" readonly>
                </div>
                <div class="col-md-2">
                    <label for="inputId" class="form-label mt-4 mb-2">Código da turma</label>
                    <input type="text" name="id" class="form-control" value="{{ $turma->id }}" id="inputId" readonly>
                </div>
                <div class="col-md-6">
                    <label for="inputLivro" class="form-label mt-4 mb-2">Livro</label>
                    <input type="text" name="livro" class="form-control" value="{{ $turma->livros->nome }}" id="livro" readonly>
                    <label for="inputSerie" class="form-label mt-4 mb-2">Série</label>
                    <input type="text" name="serie" class="form-control" value="{{ $turma->livros->serie }}" id="serie" readonly>
                </div>
                <div class="col-md-2">
                    <label for="inputModalidade" class="form-label mt-4 mb-2">Modalidade</label>
                    <input type="text" name="modalidade" class="form-control" value="{{ $turma->modalidade }}" id="modalidade" readonly>
                </div>
                <div class="col-md-6">
                    <label for="inputDiasdasemana" class="form-label mt-4 mb-2">Dias da semana</label>
                    <input type="text" name="dias_semana" class="form-control" value="{{ $turma->dias_semana }}" id="dias_semana" readonly>
                </div>
                <div class="col-md-2">
                <label for="inputHorarios" class="form-label mt-4 mb-2">Horário</label>
                    <input type="text" name="hr_inicio" class="form-control" value="{{ $turma->hr_inicio }}" id="hr_inicio" readonly> às
                    <input type="text" name="hr_termino" class="form-control" value="{{ $turma->hr_termino }}" id="hr_termino" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="my-4">
            <h3>Lista de alunos</h3>
            <a href="#">
                <i class="icofont-ui-edit" id="btn_editar_lista_alunos" style="font-size:14px;"> Editar</i>
            </a>
            <input type="text" class="form-control @error('buscaaluno') is-invalid @enderror" id="buscaaluno" name="buscaaluno" placeholder="Procurar aluno(a)"/>
             <!--<button><i class="icofont-ui-edit" id="btn_editar_lista_alunos"></i></button>-->
            {{ csrf_field() }}
            <!--Campo oculto que lida com hash de exceções (?)-->
            <div id="listaAlunos"></div>
            </div>
        </form>
    </div>
</form>
@endsection
@section('javascript')
@include('includes.toastr')
<script>
</script>
@endsection