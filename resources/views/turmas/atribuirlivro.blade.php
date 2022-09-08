@extends('layouts.app')
@section('content')
<div class="my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('turma.index') }}">Turmas /</a></li>
            <li class="breadcrumb-item active" aria-current="page">Livros do(a) aluno(a)
                {{$aluno->nome}} #{{ $aluno->id }} 
            </li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-header">
        <h3>Livro atual:</h3>
        @if($qtdelivros===1)
            {{$livroatual->nome}}
        @else
            {{$aluno->nome}} não está cursando nenhum livro no momento.
        @endif
    </div>
    <div class="card-body">
        <div class="my-4">
            <div class="form-group" id="divlivro">
                <form action="{{ route('turma.alterarlivro', $aluno->id) }}" method="POST">
                @csrf
                <input type="text" value="{{$aluno->id}}" name="id_aluno" id="id_aluno" hidden/>
                <input type="text" value="{{$it}}" name="id_turma" id="id_turma" hidden/>
                @if(!empty($livroatual))
                    <input type="text" value="{{$livroatual->id}}" name="livro_atual" id="livro_atual" hidden/>
                @endif
                <label for="Livro">Selecione o livro ao qual deseja vincular o(a) aluno(a)</label>
                <select name="livro_novo" class="form-control" id="livro_novo">
                    <!--<option value="">---</option>-->
                    @foreach($livros as $livro)
                        @if(!empty($livroatual))
                            <option value="{{ $livro->id }}" {{$livro->id===$livroatual->id?'selected':''}}>{{ $livro->nome }} ({{ $livro->serie }})</option>
                        @else
                            <option value="{{ $livro->id }}">{{ $livro->nome }} ({{ $livro->serie }})</option>
                        @endif
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Alterar livro</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
@include('includes.toastr')
<script type="text/javascript">
</script>
@endsection