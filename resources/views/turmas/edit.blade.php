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
    <button><i class="icofont-ui-edit" id="btn_editar_turma"></i></button>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('turma.update', $turma->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
        <b><label for="Modalidade">Modalidade</label><br></b>
        <input type="radio" name="modalidade" id="modalidade" value="connections"
        {{ $turma->modalidade==="connections" ? 'checked' : '' }}>
        <label for="Connections">Connections</label>
        <input type="radio" name="modalidade" id="modalidade" value="interactive"
        {{ $turma->modalidade==="interactive" ? 'checked' : '' }}>>
        <label for="Interactive">Interactive</label>
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
        <button><i class="icofont-ui-edit" id="btn_editar_lista_alunos"></i></button>
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