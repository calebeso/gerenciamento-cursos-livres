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
                    <h2 class="card-title">Novo Aluno</h2>
                </div>
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{ route('alunos.store')}}">
                        @csrf
                        <!-- Informações do Aluno -->
                        <div class="col-md-12">
                            <label for="inputName" class="form-label">Nome Completo</label>
                            <input type="name" name="nome" class="form-control" id="inputName">
                        </div>
                        <div class="col-md-6">
                            <label for="inputRg" class="form-label">RG</label>
                            <input type="number" class="form-control" id="inputRg" name="rg" placeholder="0.000.000-0">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCpf" class="form-label">CPF</label>
                            <input type="number" class="form-control" id="inputCpf" name="cpf" placeholder="000.000.000-00">
                        </div>
                        <div class="col-md-6">
                            <label for="inputBirthday" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="inputBirthday" name="data_nascimento">
                        </div>
                        <div class="col-md-6">
                            <label for="inputTel" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="inputTel" name="telefone">
                        </div>

                        <!-- CheckBox Sim ou Não para Responsável do Aluno -->
                        <div class="col-md-12">
                            <label class="form-label">Responsável</label>
                            <div class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkRespYes">
                                        <label class="form-check-label" for="inlineFormCheck">
                                            Sim
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkRespNo">
                                        <label class="form-check-label" for="inlineFormCheck">
                                            Não
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informações Responsábel -->
                        <div class="col-md-12">
                            <label for="inputNameResponsavel" class="form-label">Nome do Responsável</label>
                            <input type="name" name="nomeResponavel" class="form-control" id="inputNameResponsavel">
                        </div>
                        <div class="col-md-12">
                            <label for="inputGrauParent" class="form-label">Grau de Parentesco</label>
                            <input type="name" name="nomeResponavel" class="form-control" id="inputGrauParent">
                        </div>
                        <div class="col-md-6">
                            <label for="inputTelResp" class="form-label">Telefone Responsavel</label>
                            <input type="tel" class="form-control" id="inputTel" name="inputTelResp">
                        </div>

                        
                        <div id="buttonGroup" class="col-md-12" style="margin-top: 20px;">
                            <div class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success">Confirmar</button>
                                </div>
                                <div class="col-6">
                                    <a href="/"><button type="" class="btn btn-danger">Cancelar</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    @include('partials.javascript')
</body>

</html>