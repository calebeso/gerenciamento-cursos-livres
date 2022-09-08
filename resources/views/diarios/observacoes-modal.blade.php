<div class="modal fade" id="observation-{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Observações</h5>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <textarea class="form-control" name="observacoes[]" id="message-text" {{ isset($obs) ? 'disabled' : '' }}>{{ isset($obs) ? $obs : '' }}</textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        @if(!isset($obs))
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
        @endif
      </div>
    </div>
  </div>
</div>