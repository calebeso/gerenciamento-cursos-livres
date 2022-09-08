@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>
</div>
<div class="my-4">
    <h3>Cadastrar turma</h3>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('turma.store') }}" method="POST">
            @csrf
            <div class="row">
                <label for="Modalidade">Modalidade</label>
                <div class="col">
                    <div class="form-group">
                        <input type="radio" name="modalidade" id="modalidade" value="connections">
                        <label class="mt-4 mb-2" for="Connections">Connections</label>
                    </div>
                </div>
                <div class="col">
                    <input type="radio" name="modalidade" id="modalidade" value="interactive">
                    <label class="mt-4 mb-2" for="Interactive">Interactive</label>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="Professor">Professor(a)</label>
                    <select name="user" class="form-control" id="user">
                        <option value="">---</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</value>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group" id="divlivro">
                    <label class="mt-4 mb-2" for="Livro">Livro</label>
                    <select name="livro" class="form-control" id="livro">
                        <option value="">---</option>
                        @foreach($livros as $livro)
                        <option value="{{ $livro->id }}">{{ $livro->nome }} ({{ $livro->serie }})</value>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="Idioma">Idioma</label>
                    <select name="idioma" class="form-control" id="idioma">
                        <option value="">---</option>
                        <option value="Inglês">Inglês</value>
                        <option value="Espanhol">Espanhol</value>
                        <option value="Alemão">Alemão</value>
                        <option value="Francês">Francês</value>
                        <option value="Italiano">Italiano</value>
                        <option value="Chinês">Chinês</value>
                        <option value="Japonês">Japonês</value>
                        <option value="Português">Português para estrangeiros</value>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="mt-4 mb-2" for="Dias da semana">Dias da semana</label>
                    <fieldset>
                        <div>
                            <input class="ms-4" type="checkbox" id="segunda-feira" name="dias_semana[]" value="Segunda">
                            <label for="Segunda-feira">Segunda-feira</label>
                            <input class="ms-4" type="checkbox" id="terça-feira" name="dias_semana[]" value="Terça">
                            <label for="Terça-feira">Terça-feira</label>
                            <input class="ms-4" type="checkbox" id="quarta-feira" name="dias_semana[]" value="Quarta">
                            <label for="Quarta-feira">Quarta-feira</label>
                            <input class="ms-4" type="checkbox" id="quinta-feira" name="dias_semana[]" value="Quinta">
                            <label for="Quinta-feira">Quinta-feira</label>
                            <input class="ms-4" type="checkbox" id="sexta-feira" name="dias_semana[]" value="Sexta">
                            <label for="Sexta-feira">Sexta-feira</label>
                            <input class="ms-4" type="checkbox" id="sábado" name="dias_semana[]" value="Sábado">
                            <label for="Sábado">Sábado</label>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="mt-4" for="Horário">Horário</label>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Horário" class="mb-2 form-label"></label>
                        <input type="text" placeholder="00:00" name="hr_inicio" class="form-control" id="hr_inicio">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Horário" class="mb-2 form-label"></label>
                        <input type="text" placeholder="00:00" name="hr_termino" class="form-control" id="hr_termino">
                    </div>
                </div>
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
@endsection
@section('javascript')
<script>
    function validardados() {
        var hi = document.getElementById("hr_inicio").value;
        var ht = document.getElementById("hr_termino").value;
        //alert ('Horários de início e término: '+hi+'/'+ht);
    }
    $('#hr_inicio').mask('00:00');
    $('#hr_termino').mask('00:00');
    $(document).ready(function() {
        var modalidade = null
        $('input:radio[name=modalidade]').change(function() {
            modalidade = this.value
            //alert('Você selecionou a modalidade: '+modalidade);
            if (modalidade === "interactive") {
                $('#divlivro').hide()
                $('#divserie').hide()
                $('#livro').value = null
                $('#serie').value = null
            } else {
                if (modalidade === "connections") {
                    $('#divlivro').show()
                    $('#divserie').show()
                }
            }
        });



    });
</script>
@endsection