@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('livro.index') }}">Livros /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lições</li>
        </ol>
    </nav>
</div>
<div class="row align-items-center">
    <div class="col">
        <div class="my-4">
            <h3>Lições do Livro {{ $livro->nome }}</h3>
        </div>
    </div>
    <div class="col">
        <a href="#">
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#createLesson">Novo Lição</button>
        </a>
    </div>
</div>
@include('livros.licoes.create', ['livro_id' => $livro->id])
<div class="card">
    <div class="card-body">
        <table class="table" id="licoes">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($livro->licoes as $licao)
                <tr>
                    <th scope="row">
                        <span class="badge rounded-pill bg-dark">#{{ $licao->id }}</span>
                    </th>
                    <td>{{ $licao->nome }}</td>
                    <td>
                        <a href="{{ route('licoes.edit', ['id' => $livro->id, 'licao' => $licao->id]) }}" class="edit-icon me-1">
                            <i class="icofont-ui-edit"></i>Editar
                        </a>

                        <form class="d-inline-block" method="POST" action="{{ route('licoes.delete', ['id' => $livro->id, 'licao' => $licao->id]) }}">
                            @csrf
                            @method('DELETE')
                                <button id="excluir">
                                    <a class="remove-icon"><i class='icofont-ui-delete'></i>Excluir</a>
                                </button>
                        </form>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('#licoes').DataTable({
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