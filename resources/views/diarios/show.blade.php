@extends('layouts.app')
@section('content')
<div class="my-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('diario.index', $turma->id) }}">Diários da Turma /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Diário de Aula</li>
        </ol>
    </nav>
</div>
<div class="row align-items-center">
    <div class="col">
        <div class="my-4">
            <h3>Diário de Aula {{ $diario->id }}</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p class="card-text float-start text-sm">Turma {{ $turma->id }}</p>
                    </div>
                    <div class="col">
                        <p class="card-text text-muted text-end text-sm mb-2"><i class="icofont-ui-calendar main-color"></i> {{ ucfirst($turma->dias_semana) }} </p>
                        <p class="card-text text-muted text-end text-sm"><i class="icofont-clock-time main-color"></i> {{ $turma->hr_inicio }} - {{ $turma->hr_termino }}</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h5 class="card-title font-weight-700"><i class="icofont-cube second-main-color"></i> {{ strtoupper($turma->modalidade) }}</h5>
                        <h5 class="card-title">{{ isset($turma->livros->nome) ? ucfirst($turma->livros->nome) : '' }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <form action="{{ route('diario.store', $turma->id) }}" method="POST">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="data" class="form-label text-sm">Data</label>
                            <input type="text" class="form-control @error('data') is-invalid @enderror" value="{{ $diario->data }} " id="data" disabled>
                            @error('data')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="licao" class="form-label text-sm">Lição</label>

                            @if($turma->modalidade === "connections")

                            <input type="hidden" id="connections" value="1">

                            <select class="form-select " name="licao_id" id="licaoDiario" disabled>
                                @forelse($turma->livros->licoes as $licao)
                                <option value="{{ $licao->id == $diario->turmas->licao_id ? 'selected' : '' }}">{{ $licao->nome }}</option>
                                @empty

                                @endforelse
                            </select>
                            @else

                            <input type="hidden" id="connections" value="0">

                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Lição</th>
                    <th>Presença</th>
                    <th>Tarefa</th>
                    <th>Prep.</th>
                    <th>F</th>
                    <th>A</th>
                    <th>L</th>
                    <th>E</th>
                    <th>Obs.</th>
                </tr>
            </thead>
            @csrf
            <tbody>
                @forelse($diario->horasAula as $aula)
                <input type="hidden" name="id_aluno[]" value="{{ $aula->alunos->id }}">
                <tr>
                    <td>
                        {{ $aula->alunos->nome }}
                    </td>
                    <td>
                        @if($turma->modalidade === "connections")
                        <select class="form-select " name="licao[]" id="licao" disabled>
                            @forelse($turma->livros->licoes as $licao)
                            <option value="{{ $licao->id }}">{{ $licao->nome }}</option>
                            @empty
                            <option value="">Nenhuma lição disponível</option>
                            @endforelse
                        </select>
                        @else
                        <select class="form-select " name="licao[]" id="licao" disabled>
                            <option value="{{ $aula->licoes->id }}">{{ $aula->licoes->nome }}</option>
                        </select>
                        @endif
                    </td>
                    <td>
                        <select class="form-select" name="presenca[]" id="presenca" disabled>
                            <option value="{{ $aula->presenca }}" checked>{{ $aula->presenca }}</option>
                            <option value="F">F</option>
                            <option value="P">P</option>
                            <option value="C">C</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="tarefa[]" id="tarefa" disabled>
                            <option value="{{ $aula->tarefa }}" checked>{{ $aula->tarefa }}</option>
                            <option value="F">F</option>
                            <option value="P">P</option>
                            <option value="C">C</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="preparo[]" id="preparo" disabled>
                            <option value="{{ !empty($aula->preparacao) ? $aula->preparacao : '' }}">{{ !empty($aula->preparacao) ? $aula->preparacao : '' }}</option>
                            <option value="P">P</option>
                            <option value="N">N</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="fala[]" id="fala" disabled>
                            <option value="{{ !empty($aula->nota_fala) ? $aula->nota_fala : '' }}">{{ !empty($aula->nota_fala) ? $aula->nota_fala : '' }}</option>
                            <option value="B">B</option>
                            <option value="MB">MB</option>
                            <option value="O">O</option>
                            <option value="R">R</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="audicao[]" id="audicao" disabled>
                            <option value="{{ !empty($aula->nota_audicao) ? $aula->nota_audicao : '' }}">{{ !empty($aula->nota_audicao) ? $aula->nota_audicao : '' }}</option>
                            <option value="B">B</option>
                            <option value="MB">MB</option>
                            <option value="O">O</option>
                            <option value="R">R</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="leitura[]" id="leitura" disabled>
                            <option value="{{ !empty($aula->nota_leitura) ? $aula->nota_leitura : '' }}">{{ !empty($aula->nota_leitura) ? $aula->nota_leitura : '' }}</option>
                            <option value="B">B</option>
                            <option value="MB">MB</option>
                            <option value="O">O</option>
                            <option value="R">R</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="escrita[]" id="escrita" disabled>
                            <option value="{{ !empty($aula->nota_escrita) ? $aula->nota_escrita : '' }}">{{ !empty($aula->nota_escrita) ? $aula->nota_escrita : '' }}</option>
                            <option value="B">B</option>
                            <option value="MB">MB</option>
                            <option value="O">O</option>
                            <option value="R">R</option>
                        </select>
                    </td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#observation-{{ $aula->alunos->id }}">
                            <i class="icofont-ui-text-chat"></i>
                        </a>
                    </td>
                </tr>
                @include( 'diarios.observacoes-modal', ['id' => $aula->alunos->id, 'obs' => isset($aula->observacoes) ? $aula->observacoes : ''  ] )
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="row my-4">
    <div class="d-flex justify-content-start">
        <button class="btn btn-danger">
            {{ __('Voltar') }}
        </button>
    </div>
</div>
</form>

@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {

        $('#data').mask('00/00/0000');

        verificaModalidadeTurma()

    })


    function verificaModalidadeTurma() {
        var licoes = $('#connections')
        var diarioLicao = $('#licaoDiario')
        var alunosLicoes = $('#licao')

        if (licoes.val() == 1) {
            diarioLicao.on('change', function() {
                $('select:disabled').each(function() {
                    $(this).val(diarioLicao.val()).change()
                })
            })
        }
    }
</script>
@endsection