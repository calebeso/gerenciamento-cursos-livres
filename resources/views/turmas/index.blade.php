@extends('layouts.app')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <div class="my-4">
      <h3>Turmas</h3>
    </div>
  </div>
  <div class="col">
    <a href="{{ route('turma.create') }}">
      <button class="btn btn-success float-end">Nova Turma</button>
    </a>
  </div>
</div>

<div class="card">
    <div class="card-header">
        <p class="card-title">Connections</p>
    </div>
    <div class="card-body">
        <table class="table" id="turmas_connections">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Modalidade</th>
                    <th scope="col">Idioma</th>
                    <th scope="col">Livro</th>
                    <th scope="col">Professor(a)</th>
                    <th scope="col">Dias de aula</th>
                    <th scope="col">Horário início</th>
                    <th scope="col">Horário término</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                @if($turma->modalidade=== 'connections')
                <tr>
                    <th scope="row">{{ $turma->id }}</th>
                    <td>{{ $turma->modalidade }}</td>
                    <td>{{ $turma->idioma }}</td>
                    <td>
                        {{ $turma->livros == NULL ? ' ' : $turma->livros->nome }}

                    </td>
                    <td>{{ $turma->users->name }}</td>
                    <td>{{ $turma->dias_semana}}</td>
                    <td>{{ $turma->hr_inicio }}</td>
                    <td>{{ $turma->hr_termino }}</td>
                    <td>{{ $turma->status }}

                    </td>
                    <td>
                        <a href="{{ route('turma.edit', $turma->id ) }}" class="edit-icon me-1">
                            <i class="icofont-ui-edit"> Editar</i>
                        </a>
                        <a href="{{ route('turma.listadealunos', $turma->id ) }}" class="edit-icon me-1">
                            <i class="icofont-navigation-menu"> Ver integrantes</i>
                        </a>
                        <a href="{{ route( 'diario.index', $turma->id ) }}" class="edit-icon me-1 main-color">
                            <i class="icofont-paper"> Diários de aula</i>
                        <form class="d-inline-block" method="POST" action="{{ route('turma.delete', $turma->id ) }}">
                            @csrf
                            @method('DELETE')
                            <button id="excluir">
                                <a class="remove-icon"><i class='icofont-ui-delete'></i> Excluir</a>
                            </button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card mt-4">
    <div class="card-header">
        <p class="card-title">Interactive</p>
    </div>
    <div class="card-body">
        <table class="table" id="turmas_interactive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Modalidade</th>
                    <th scope="col">Idioma</th>
                    <th scope="col">Livro</th>
                    <th scope="col">Professor(a)</th>
                    <th scope="col">Dias de aula</th>
                    <th scope="col">Horário início</th>
                    <th scope="col">Horário término</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                @if($turma->modalidade=== 'interactive')
                <tr>
                    <th scope="row">{{ $turma->id }}</th>
                    <td>{{ $turma->modalidade }}</td>
                    <td>{{ $turma->idioma }}</td>
                    <td>
                        {{ $turma->livros == NULL ? ' ' : $turma->livros->nome }}

                    </td>
                    <td>{{ $turma->users->name }}</td>
                    <td>{{ $turma->dias_semana}}</td>
                    <td>{{ $turma->hr_inicio }}</td>
                    <td>{{ $turma->hr_termino }}</td>
                    <td>{{ $turma->status }}

                    </td>
                    <td>
                        <a href="{{ route('turma.edit', $turma->id ) }}" class="edit-icon me-1">
                            <i class="icofont-ui-edit"> Editar</i>
                        </a>
                        <a href="{{ route('turma.listadealunos', $turma->id ) }}" class="edit-icon me-1">
                            <i class="icofont-navigation-menu"> Ver integrantes</i>
                        </a>
                        <form class="d-inline-block" method="POST" action="{{ route('turma.delete', $turma->id ) }}">
                            @csrf
                            @method('DELETE')
                            <button id="excluir">
                                <a class="remove-icon"><i class='icofont-ui-delete'></i> Excluir</a>
                            </button>
                        </form>
                        <a href="{{ route( 'diario.index', $turma->id ) }}" class="edit-icon me-1" style="color:#02b6bf;">
                            <i class="icofont-paper"> Diários de aula</i>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    var route = "{{ url('autocomplete-search') }}";

    $('#buscaaluno').typeahead({
        source: function(query, process) {
            return $.get(route, {
                query: query
            }, function(data) {
                return process(data);
            });
        }
    });

    function add_aluno() {
        var nomealuno = document.getElementById("buscaaluno").value;
        if (nomealuno != "") {
            document.getElementById('listaAlunos').innerHTML += nomealuno;
        }
    }
    $(document).ready(function() {
        $('#turmas_connections').DataTable({
            "info": false,
            "bPaginate": true,
            "pagingType": 'numbers',
            "bLengthChange": false,
            "language": {
                "emptyTable": "Nenhum registro encontrado",
                "search": "Procurar"
            },
        });
        $('#turmas_interactive').DataTable({
            "info": false,
            "bPaginate": true,
            "pagingType": 'numbers',
            "bLengthChange": false,
            "language": {
                "emptyTable": "Nenhum registro encontrado",
                "search": "Procurar"
            },
        });
    });
</script>
@endsection