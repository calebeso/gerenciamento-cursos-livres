@extends('layouts.app')
@section('content')
<div class="my-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
      <li class="breadcrumb-item active" aria-current="page">Diários da Turma</li>
    </ol>
  </nav>
</div>

<div class="row align-items-center">
  <div class="col">
    <div class="my-4">
      <h3>Diários de Turma</h3>
    </div>
  </div>
  <div class="col">
    <a href="{{ route('diario.create', $id) }}">
      <button class="btn btn-success float-end">Novo Diário de Turma</button>
    </a>
  </div>
</div>
@forelse($diarios as $diario)
<div class="row">
  <div class="col">
    <div class="card my-2">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <p class="card-text float-start text-sm">Turma {{ $diario->turmas->id }}</p>
          </div>
          <div class="col">
            <p class="card-text text-muted text-end text-sm mb-2"><i class="icofont-ui-calendar main-color"></i> {{ ucfirst($diario->turmas->dias_semana) }} </p>
            <p class="card-text text-muted text-end text-sm"><i class="icofont-clock-time main-color"></i> {{ $diario->turmas->hr_inicio }} - {{ $diario->turmas->hr_termino }}</p>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <h5 class="card-title font-weight-700"><i class="icofont-cube second-main-color"></i> {{ strtoupper($diario->turmas->modalidade) }}</h5>
            <h5 class="card-title">{{ isset($diario->turmas->livros->nome) ? ucfirst($diario->turmas->livros->nome) : '' }}</h5>
          </div>
          <div class="col">
            <span class="text-sm float-end position-relative top-50">
              <a class="main-color" href="{{ route('diario.edit', ['id' => $id, 'diario' => $diario->id]) }}"><i class="icofont-ui-edit"></i> Editar</a>
            </span>

            <span class="text-sm float-end position-relative top-50 me-2">
              <a class="main-color" href="{{ route('diario.show', ['id' => $id, 'diario' => $diario->id]) }}"><i class="icofont-eye"></i> Visualizar</a>
            </span>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@empty
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col">
        <h5 class="float-end">
          <i class="second-main-color icofont-sad icofont-5x"></i>
        </h5>
      </div>
      <div class="col mt-2">
        <h3 class="second-main-color font-weight-700">Ooops!</h3>
        <h5 class="font-weight-600">Nenhum Diário de Turma cadastrado</h5>
      </div>
    </div>
  </div>
</div>
@endforelse
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function() {
    $('#diarios').DataTable({
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
@include('includes.toastr')
@endsection