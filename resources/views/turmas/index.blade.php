<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head')
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        @include('partials.sidebar')

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            @include('partials.navbar')
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Turmas</h2>
                    <a href="{{ route('turma.create') }}"><button type="button" class="btn btn-primary">Nova turma</button></a>
                </div>
                <div class="card-body"></div>
                <table class="table">
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
                        <td>{{ $turma->status == 1 ? 'Em andamento' : 'Encerrada' }}

                        </td>
                        <td>
                            <a href="{{ route('turma.edit', $turma->id ) }}">
                                <i class="icofont-ui-edit"></i>
                            </a>
                            <form method="post" action="{{ route('turma.delete', $turma->id ) }}">
                            @method('delete')
                            @csrf
                                <button type="submit">
                                    <i class="icofont-ui-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                        <!--<tr>
                            <th scope="row">1</th>
                            <td>Connections</td>
                            <td>Inglês</td>
                            <td>T6B</td>
                            <td>Jéssica Lima</td>
                            <td>Seg/Qua</td>
                            <td>16:00/17:00</td>
                            <td>Ativa</td>
                        </tr>-->
                    </tbody>
                </table>
            </div>
            @yield('content')
        </div>
    </div>
    @include('partials.javascript')
</body>

</html>