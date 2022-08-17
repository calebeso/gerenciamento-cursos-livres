@extends('layouts.app')
@section('content')
<div class="row align-items-center">
    <div class="col">
        <div class="my-4">
            <h3>Responsáveis</h3>
        </div>
    </div>
    <div class="col">
        <a href="{{ route('responsavel.create') }}">
            <button class="btn btn-success float-end">Novo Responsável</button>
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover" id="responsaveis">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Parentesco</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responsaveis as $responsavel)
                <tr>
                    <td scope="row">
                        <span class="badge badge-phil bg-dark">
                            # {{ $responsavel->id }}
                        </span>
                    </td>
                    <td>
                        {{ $responsavel->nome }}
                    </td>
                    <td>
                        {{ $responsavel->parentesco }}
                    </td>
                    <td>
                        {{ $responsavel->telefone }}
                    </td>
                    <td>
                        <a href="{{ route('responsavel.edit', $responsavel->id ) }}" class="edit-icon me-1">
                            <i class="icofont-ui-edit"></i>Editar
                        </a>
                        <form class="d-inline-block" method="POST" action="{{ route('responsavel.delete', $responsavel->id) }}">
                            @csrf
                            @method('DELETE')
                            <button id="excluir">
                                <a class="remove-icon"><i class='icofont-ui-delete'></i>Excluir</a>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection