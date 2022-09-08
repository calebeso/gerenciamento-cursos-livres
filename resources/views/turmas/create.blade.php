@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav class="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>
</div>
<div class="my-4">
    <h3>Cadastrar Turma</h3>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('turma.store') }}" method="POST">
            @csrf
            <div class="row md-12">
                <div class="col">
                    <label class="form-label mt-4 mb-2" for="Modalidade"><h5>Modalidade</h5></label>

                    <div class="col">
                        <input type="radio" name="modalidade" id="modalidade" value="Connections">
                        <label class="form-label mb-2 me-5" for="Connections">Connections</label>
                        <input type="radio" name="modalidade" id="modalidade" value="Interactive">
                        <label class="form-label mb-2" for="Interactive">Interactive</label>
                    </div>
                </div>

                <div class="col">
                    <label for="Professor" class="form-label mt-4 mb-2"><h5>Professor(a)</h5></label>

                    <div class="col">
                        <select name="user" class="form-control" id="user">
                        <option value="">---</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</value>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row md-12 mt-4">
                <div class="col">
                    <label for="Livro" class="form-label"><h5>Livro</h5></label>
                    
                    <select name="livro" class="form-control" id="livro">
                        <option value=""> --- </option>
                        @foreach($livros as $livro)
                        <option value="{{ $livro->id }}">{{ $livro->nome }} ({{ $livro->serie }})</value>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="Idioma" class="form-label"><h5>Idioma</h5></label>

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
            <div class="row md-12 mt-4">
                <div class="col">
                    <label for="Dias da semana" class="form-label"><h5>Dias da semana</h5></label>

                    <fieldset>
                        <div>
                            <input class="form-check-input" type="checkbox" id="segunda-feira" name="dias_semana[]" value="Segunda">
                            <label class="form-check-label me-2" for="Segunda-feira">Segunda-feira</label>
                            <input class="form-check-input" type="checkbox" id="terça-feira" name="dias_semana[]" value="Terça">
                            <label class="form-check-label me-2" for="Terça-feira">Terça-feira</label>
                            <input class="form-check-input" type="checkbox" id="quarta-feira" name="dias_semana[]" value="Quarta">
                            <label class="form-check-label me-2" for="Quarta-feira">Quarta-feira</label>
                            <input class="form-check-input" type="checkbox" id="quinta-feira" name="dias_semana[]" value="Quinta">
                            <label class="form-check-label me-2" for="Quinta-feira">Quinta-feira</label>
                            <input class="form-check-input" type="checkbox" id="sexta-feira" name="dias_semana[]" value="Sexta">
                            <label class="form-check-label me-2" for="Sexta-feira">Sexta-feira</label>
                            <input class="form-check-input" type="checkbox" id="sábado" name="dias_semana[]" value="Sábado">
                            <label class="form-check-label me-2" for="Sábado">Sábado</label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row md-12 mt-4 g-3">
                <label for="Horário" class="form-label"><h5>Horário</h5></label>
                <div class="col-auto ml-3">
                    <input type="text" name="hr_inicio" class="form-control form-control-sm" id="hr_inicio">
                </div>
                <div class="col-auto justify-center">
                    <h6>às</h6>
                </div>
                <div class="col-auto">
                    <input type="text" name="hr_termino" class="form-control form-control-sm" id="hr_termino">
                </div>
            </div>
            <!-- <div class="form-group">
                <b><label for="Modalidade">Modalidade</label><br></b>
                <input type="radio" name="modalidade" id="modalidade" value="Connections">
                <label for="Connections">Connections</label>
                <input type="radio" name="modalidade" id="modalidade" value="Interactive">
                <label for="Interactive">Interactive</label>
            </div> -->
            <!--FAZER SELECT IDIOMAS-->
            <!-- <div class="form-group">
                <label for="Professor">Professor(a)</label>
                <select name="user" class="form-control" id="user">
                    <option value="">---</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</value>
                        @endforeach
                </select>
            </div> -->
            <!-- <div class="form-group" id="divlivro">
                <label for="Livro">Livro</label>
                <select name="livro" class="form-control" id="livro">
                    <option value="">---</option>
                    @foreach($livros as $livro)
                    <option value="{{ $livro->id }}">{{ $livro->nome }} ({{ $livro->serie }})</value>
                        @endforeach
                </select>
            </div> -->
            <!-- <div class="form-group">
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
            </div> -->
            <!-- <div class="form-group">
                <label for="Dias da semana">Dias da semana</label>
                <fieldset>
                    <div>
                        <input type="checkbox" id="segunda-feira" name="dias_semana[]" value="Segunda">
                        <label for="Segunda-feira">Segunda-feira</label>
                        <input type="checkbox" id="terça-feira" name="dias_semana[]" value="Terça">
                        <label for="Terça-feira">Terça-feira</label>
                        <input type="checkbox" id="quarta-feira" name="dias_semana[]" value="Quarta">
                        <label for="Quarta-feira">Quarta-feira</label>
                        <input type="checkbox" id="quinta-feira" name="dias_semana[]" value="Quinta">
                        <label for="Quinta-feira">Quinta-feira</label>
                        <input type="checkbox" id="sexta-feira" name="dias_semana[]" value="Sexta">
                        <label for="Sexta-feira">Sexta-feira</label>
                        <input type="checkbox" id="sábado" name="dias_semana[]" value="Sábado">
                        <label for="Sábado">Sábado</label>
                    </div>
                </fieldset>
            </div> -->
            <!-- <div class="col-md-12">
                <label for="Horário" class="form-label">Horário</label>
                <input type="text" name="hr_inicio" class="form-control" id="hr_inicio">
                às
                <input type="text" name="hr_termino" class="form-control" id="hr_termino">
            </div> -->
            <div class="row my-4">
                <div class="d-flex justify-content-start"> 
                    <button type="submit" class="btn btn-primary me-1" onclick="validardados()">{{ __('Salvar') }}</button>
                    <a class="btn btn-danger" href="{{ route('turma.index')}}" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
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
            if (modalidade === "Interactive") {
                $('#divlivro').hide()
                $('#divserie').hide()
                $('#livro').value = null
                $('#serie').value = null
            } else {
                if (modalidade === "Connections") {
                    $('#divlivro').show()
                    $('#divserie').show()
                }
            }
        });
    });

    $('hr_inicio').mask('00:00');
    $('hr_termino').mask('00:00');
</script>
@endsection