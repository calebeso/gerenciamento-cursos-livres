<!-- Modal -->
<div class="modal fade" id="parentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Adicionar Responsável</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="responsavel-div">
                    <form method="POST" action="">
                        <!-- Informações Responsábel -->
                        <div class="col-md-12">
                            <label for="inputNameResponsavel" class="form-label">Nome do Responsável</label>
                            <input type="text" name="nome_responavel" class="form-control" id="inputNameResponsavel">
                        </div>
                        <div class="col-md-6">
                            <label for="inputGrauParent" class="form-label">Grau de Parentesco</label>
                            <input type="text" name="grau_parentesco" class="form-control" id="inputGrauParent">
                        </div>
                        <div class="col-md-6">
                            <label for="inputTelResp" class="form-label">Telefone Responsavel</label>
                            <input type="tel" class="form-control" id="inputTel" name="telefone_responsavel">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Adicionar</button>
            </div>
        </div>
    </div>
</div>