<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Acciones disponibles para este servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php if($_SESSION['access_level'] >= 2): ?>
	  <div class="form-group">
	      <a id="edit_button"><button class="btn btn-primary form-control">Editar</button></a>
	  </div>
	  <? endif; ?>
	  <div class="form-group">
	      <a id="export_button"><button class="btn btn-secondary form-control">Exportar</button></a>
	  </div>
	  <div class="form-group">
	      <a id="view_pdf_button" target="_blank"><button class="btn btn-secondary form-control">Ver en PDF</button></a>
	  </div>
	  <?php if($_SESSION['access_level'] >= 3): ?>
	  <div class="form-group">
	      <a id="delete_button"><button class="btn btn-danger form-control">Eliminar</button></a>
	  </div>
	  <? endif; ?>
      </div>
    </div>
  </div>
</div>


<script>

$('#exampleModal').on('show.bs.modal', function (event) {
    var triggerer = $(event.relatedTarget); // Button that triggered the modal
    var rowId = triggerer.data('row_id'); // Extract info from data-* attributes

    var modal = $(this);

    modal.find('#edit_button').attr('href','<?= BASE_URL?>'+'editar/index.php?id='+rowId);
    modal.find('#export_button').attr('href','<?= BASE_URL?>'+'exportar/index.php?id='+rowId);
    modal.find('#delete_button').attr('href','<?= BASE_URL?>'+'editar/delete.php?id='+rowId);
    modal.find('#view_pdf_button').attr('href','<?= BASE_URL?>'+'exportar/pdf_table/index.php?id='+rowId);

})

</script>
