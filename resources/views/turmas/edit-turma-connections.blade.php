@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Turma Connections #{{ $turma->id }}
            </li>
        </ol>
    </nav>
</div>
<div class="my-4">
    <h3>Dados da turma</h3>
    <!--<a href="#">
        <i class="icofont-ui-edit" id="btn_editar_turma" style="font-size:14px;"> Editar</i>
    </a>-->
    <!--<button><i class="icofont-ui-edit" id="btn_editar_turma"></i></button>-->
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('turma.update', $turma->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
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
            </div>
            <div class="col-md-2">
                <label for="id" class="form-label mt-4 mb-2">Código</label>
                <input type="text" name="id" class="form-control" value="{{ $turma->id }}" id="inputId" readonly>
            </div>
            <div class="col-md-2">
                <label for="modalidade" class="form-label mt-4 mb-2">Modalidade</label>
                <input type="text" name="modalidade" class="form-control" value="{{ $turma->modalidade }}" id="inputModalidade" readonly>
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label mt-4 mb-2">Status</label>
                <select name="status" class="form-control" id="status">
                    <option value="Ativa" {{$turma->status==='Ativa' ? 'selected':''}}>Ativa</option>
                    <option value="Em formação" {{$turma->status==='Em formação' ? 'selected':''}} >Em formação</option>
                    <option value="Encerrada" {{$turma->status==='Encerrada' ? 'selected':''}} >Encerrada</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Dias da semana" class="form-label mt-4 mb-2">Dias da semana</label>
                <fieldset>
                    <div>
                        <input type="checkbox" id="segunda-feira" name="dias_semana[]" value="Segunda">
                        <label for = "Segunda-feira">Segunda-feira</label>
                        <input type="checkbox" id="terça-feira" name="dias_semana[]" value="Terça">
                        <label for = "Terça-feira">Terça-feira</label>
                        <input type="checkbox" id="quarta-feira" name="dias_semana[]" value="Quarta">
                        <label for = "Quarta-feira">Quarta-feira</label>
                        <input type="checkbox" id="quinta-feira" name="dias_semana[]" value="Quinta">
                        <label for = "Quinta-feira">Quinta-feira</label>
                        <input type="checkbox" id="sexta-feira" name="dias_semana[]" value="Sexta">
                        <label for = "Sexta-feira">Sexta-feira</label>
                        <input type="checkbox" id="sábado" name="dias_semana[]" value="Sábado">
                        <label for = "Sábado">Sábado</label>
                    </div>
                </fieldset>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label for="Idioma" class="form-label mt-4 mb-2">Idioma</label>
                    <select name="idioma" class="form-control" id="idioma">
                        <option value="">---</option>
                        <option value="Inglês" {{$turma->idioma==='Inglês'?'selected':''}}>Inglês</value>
                        <option value="Espanhol" {{$turma->idioma==='Espanhol'?'selected':''}}>Espanhol</value>
                        <option value="Alemão" {{$turma->idioma==='Alemão'?'selected':''}}>Alemão</value>
                        <option value="Francês" {{$turma->idioma==='Francês'?'selected':''}}>Francês</value>
                        <option value="Italiano" {{$turma->idioma==='Italiano'?'selected':''}}>Italiano</value>
                        <option value="Chinês" {{$turma->idioma==='Chinês'?'selected':''}}>Chinês</value>
                        <option value="Japonês" {{$turma->idioma==='Japonês'?'selected':''}}>Japonês</value>
                        <option value="Português" {{$turma->idioma==='Português para estrangeiros'?'selected':''}}>Português para estrangeiros</value>
                    </select>
                </div>
            </div>
            <div class="col-md-6" id="divlivro">
                <label for="inputLivro" class="form-label mt-4 mb-2">Livro</label>
                <select name="livro" class="form-control" id="livro">
                    <option value="">---</option>
                    @foreach($livros as $livro)
                    <option value="{{ $livro->id }}" {{$turma->livros->id===$livro->id ? 'selected':''}}>
                        {{ $livro->nome }} ({{ $livro->serie }})
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="row-md-3">
            <label for="Horário" class="form-label">Horário</label>
                <div class="col-md-3">
                    <input type="text" name="hr_inicio" class="form-control" id="hr_inicio" value="{{$turma->hr_inicio}}">
                    às
                </div>
                <div class="col-md-3">
                    <input type="text" name="hr_termino" class="form-control" id="hr_termino" value="{{$turma->hr_termino}}">
                </div>
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
    </div> 
</div>
<div class="card" style="margin-top:10px;">
    <div class="card-body">
        <form method="POST" action="#">
            <div class="my-4">
                <h3>Lista de alunos</h3>
                <a href="#">
                    <i class="icofont-ui-edit" id="btn_editar_lista_alunos" style="font-size:14px;"> Editar</i>
                </a>
                <div id="listaAlunos">Não há alunos vinculados a essa turma no momento</div>
            </div>
        </form>
    </div>
</div>  
@endsection
@section('javascript')
@include('includes.toastr')
<script>
$('#hr_inicio').mask('00:00');
$('#hr_termino').mask('00:00');
</script>
@endsection