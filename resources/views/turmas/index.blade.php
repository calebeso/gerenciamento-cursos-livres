<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head')
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        @include('partials.sidebar')
        @extends('layouts.app')
        @section('content')
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            @include('partials.navbar')
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Turmas</h2>
                    <a href="{{ route('turma.create') }}"><button type="button" class="btn btn-primary">Nova turma</button></a>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Connections</h2>
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
                    @if($turma->modalidade==='Connections') 
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
                            <a href="#" class="edit-icon me-1" style="color:#02b6bf;">
                            <i class="icofont-paper"> Diários de aula</i>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Interactive</h2>
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
                    @if($turma->modalidade==='Interactive') 
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
                            <a href="#" class="edit-icon me-1" style="color:#02b6bf;">
                            <i class="icofont-paper"> Diários de aula</i>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    @include('partials.javascript')
</body>
</html>
@endsection
@section('javascript')
@include('includes.toastr')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
<script type="text/javascript">
    var route="{{ url('autocomplete-search') }}";
    $('#buscaaluno').typeahead({
        source:function(query,process){
            return $.get(route,{
                query:query
            },function(data){
                return process(data);
            });
        }
    });
    function add_aluno() {
        var nomealuno=document.getElementById("buscaaluno").value;
        if(nomealuno!=""){
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