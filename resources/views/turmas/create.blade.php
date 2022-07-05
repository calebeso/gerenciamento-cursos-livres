@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">Cadastrar Turma</div>
    </div>
    <div class="card-body">
  <form action="{{ route('turma.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <b><label for="Modalidade">Modalidade</label><br></b>
        <input type="radio" name="modalidade" id="modalidade" value="connections">
        <label for="Connections">Connections</label>
        <input type="radio" name="modalidade" id="modalidade" value="interactive">
        <label for="Interactive">Interactive</label>
    </div>
    <!--FAZER SELECT IDIOMAS-->
    <div class="form-group">
        <label for="Livro">Livro</label>
        <select name="livro" class="form-control" id="livro">
            <option value="">---</option>
            @foreach($livros as $livro)
            <option value="{{ $livro->id }}">{{ $livro->nome }}({{ $livro->serie }})</value>
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <label for="serie">Série</label>
    <select name="serie" class="form-control" id="serie">
            <option value="">---</option>
            <option value="Tots">Tots</value>
            <option value="Little Kids">Little Kids</value>
            <option value="Kids">Kids</value>
            <option value="Teens">Teens</value>
            <option value="Adults">Adults</value>
            <option value="Idiomas">Idiomas</value>
            <option value="Outra">Outra</value>
        </select>
    </div>
    <div class="form-group">
        <label for="Idioma">Idioma</label>
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

    <div class="form-group">
        <label for="Professor">Professor(a)</label>
        <select name="user" class="form-control" id="user">
            <option value="">---</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{$user->nome}}</value>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Dias da semana">Dias da semana</label>
        <fieldset>
            <div>
                <input type="checkbox" id="segunda-feira" name="dias_semana" value="Segunda">
                <label for = "Segunda-feira">Segunda-feira</label>
                <input type="checkbox" id="terça-feira" name="dias_semana" value="Terça">
                <label for = "Terça-feira">Terça-feira</label>
                <input type="checkbox" id="quarta-feira" name="dias_semana" value="Quarta">
                <label for = "Quarta-feira">Quarta-feira</label>
                <input type="checkbox" id="quinta-feira" name="dias_semana" value="Quinta">
                <label for = "Quinta-feira">Quinta-feira</label>
                <input type="checkbox" id="sexta-feira" name="dias_semana" value="Sexta">
                <label for = "Sexta-feira">Sexta-feira</label>
                <input type="checkbox" id="sábado" name="dias_semana" value="Sábado">
                <label for = "Sábado">Sábado</label>
            </div>
        </fieldset>
    </div>
    <div class="col-md-12">
        <label for="Horário" class="form-label">Horário</label>
        <input type="text" name="hr_inicio" class="form-control" id="hr_inicio">
        às
        <input type="text" name="hr_termino" class="form-control" id="hr_termino">
    </div>
    <br>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
    </div>
</div>
@endsection
@section('javascript')
@endsection