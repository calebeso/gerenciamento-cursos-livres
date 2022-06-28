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
                    <h2 class="card-title">Alunos</h2>
                    <a href="/alunos/create"><button type="button" class="btn btn-primary">Novo Aluno</button></a>
                </div>
                <div class="card-body"></div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Matricula</th>
                            <th scope="col">Status</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">RG</th>
                            <th scope="col">CPF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                        <tr>
                            <th scope="row">{{ aluno.index }}</th>
                            <td>{{ aluno->nome }}</td>
                            <td>{{ aluno->data_nascimento }}</td>
                            <td>{{ aluno->matricula }}</td>
                            <td>{{ aluno->status }}</td>
                            <td>{{ aluno->telefone }}</td>
                            <td>{{ aluno->rg }}</td>
                            <td>{{ aluno->cpf }}</td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <th scope="row">2</th>
                            <td>Calebe</td>
                            <td>01/01/2000</td>
                            <td>00235</td>
                            <td>Ativo</td>
                            <td>(45)99999-9999</td>
                            <td>9.999.999-9</td>
                            <td>999.999.999-99</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Joao</td>
                            <td>08/06/2000</td>
                            <td>00052</td>
                            <td>Ativo</td>
                            <td>(45)99999-9999</td>
                            <td>9.999.999-9</td>
                            <td>999.999.999-99</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Jessica</td>
                            <td>15/01/2000</td>
                            <td>00001</td>
                            <td>Ativo</td>
                            <td>(45)99999-9999</td>
                            <td>9.999.999-9</td>
                            <td>999.999.999-99</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            @yield('content')
        </div>
    </div>
    @include('partials.javascript')
</body>

</html>