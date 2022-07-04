@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">Cadastrar Turma</div>
    </div>
    <div class="card-body">
  <form action="{{ route('turma.store') }}" method="POST">
    @csrf
    <!--ORDEM DE EXIBIÇÃO NO INDEX:
        MODALIDADE
        IDIOMA
        LIVRO
        PROFESSOR
        DIAS DE AULA
        HORARIO
        STATUS
    -->
    <div class="form-group">
        <label for="Modalidade">Modalidade</label>
        <input type="radio" name="modalidade" class="form-control" id="modalidade" value="connections">
        <label for="Connections">Connections</label>
        <input type="radio" name="modalidade" class="form-control" id="modalidade" value="interactive">
        <label for="Interactive">Interactive</label>
    </div>
    <!--FAZER SELECT IDIOMAS-->
    <div class="form-group">
        <label for="Livro">Livro</label>
        <select name="livro" class="form-control" id="livro">
            <option value="">---</option>
            @foreach($livros as $livro)
            <option value={{ $livro->id }}>{{ $livro->nome }}({{ $livro->serie }})</value>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Livro">Livro</label>
        <select name="livro" class="form-control" id="livro">
            <option value="">---</option>
            @foreach($livros as $livro)
            <option value={{ $livro->id }}>{{ $livro->nome }}({{ $livro->serie }})</value>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Professor">Professor(a)</label>
        <select name="user" class="form-control" id="user">
            <option value="">---</option>
            @foreach($users as $user)
            <option value={{ $user->id }}>{{$user->nome}}</value>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Dias da semana">Dias da semana</label>
        <fieldset>
            <div>
                <input type="checkbox" id="segunda-feira" name="dias_semana" value="segunda-feira">
                <label for = "Segunda-feira">Segunda-feira</label>
                <input type="checkbox" id="terça-feira" name="dias_semana" value="terça-feira">
                <label for = "Terça-feira">Terça-feira</label>
                <input type="checkbox" id="quarta-feira" name="dias_semana" value="quarta-feira">
                <label for = "Quarta-feira">Quarta-feira</label>
                <input type="checkbox" id="quinta-feira" name="dias_semana" value="quinta-feira">
                <label for = "Quinta-feira">Quinta-feira</label>
                <input type="checkbox" id="sexta-feira" name="dias_semana" value="sexta-feira">
                <label for = "Sexta-feira">Sexta-feira</label>
                <input type="checkbox" id="sábado" name="dias_semana" value="sábado">
                <label for = "Sábado">Sábado</label>
            </div>
        </fieldset>
    </div>

  <div class="form-group">
    <label for="serie">Série</label>
    <input type="text" name="serie" class="form-control" id="serie">
  </div>
	<!--OU:
	<div class="form-group">
   		<label for="serie">Série</label>
		<select name="serie" class="form-control" id="serie">
			<option value="Inglês"></option>
			<option value="Espanhol"></option>
			<option value="Alemão"></option>
			<option value="Francês"></option>
			<option value="Italiano"></option>
			<option value="Chinês"></option>
			<option value="Japonês"></option>
			<option value="Português para estrangeiros"></option>
		</select>
	</div>
	-->
  <div class="form-group">
    <label for="idioma">Idioma</label>
    <input type="text" name="idioma" class="form-control" id="idioma">
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
    </div>
</div>
@endsection
