<div class="modal create-modal" tabindex="-1" id="createLesson">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Lição</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('licoes.create', $livro_id) }}">
                            @csrf
                            <div class="row">
                                <!-- Informações do Aluno -->
                                <div class="col-md-12">
                                    <label for="inputName" class="form-label mt-4 mb-2">Nome</label>
                                    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="name">
                                    @error('nome')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>