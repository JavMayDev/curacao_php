<!-- Modal -->
<div class="modal fade" id="userOptionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modificar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	
      <div class="modal-body">
	

    <form action="" method="POST">
	<div class="form-row">
	    <div class="form-group col-md-6">
		<label for="">Nombre</label>
		<input id="user-name" name="name" class="form-control" type="text">
	    </div>
	    <div class="form-group col-md-6">
		<label for="">email</label>
		<input id="user-email" name="email" class="form-control" type="text">
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-6">
		<label for="">contraseña</label>
		<input id="user-password" name="password" class="form-control" type="password">
	    </div>
	    <div class="form-group col-md-6">
		<label for="">Nivel de acceso</label>
		<select id="user-access_level" name="access_level" id="" class="form-control" name="">
		    <option selected="selected" value="1">Asesor</option>
		    <option value="2">Supervisor</option>
		    <option value="3">Administrador</option>
		</select>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-12">
		<label for="">Pa&iacute;s</label>
		<select id="user-country" name="country" class="form-control" id="" name="">
		    <option value=""></option>
		    <option value="El Salvador">El Salvador</option>
		    <option value="Guatemala">Guatemala</option>
		    <option value="Honduras">Honduras</option>
		    <option value="Nicaragua">Nicaragua</option>
		    <option value="México">México</option>
		</select>
	    </div>
	</div>
	<!-- <input type="" id="user-id" style="display: none;" name="id"> -->
	<div class="form-row">
	    <div class="col-md-6">
		<input name="user_delete_submit" class="form-control btn btn-danger" type="submit" value="Eliminar usuario">
	    </div>
	    <div class="form-group col-md-6">
		<input name="user_update_submit" class="form-control btn btn-success" type="submit" value="Actualizar usuario">
	    </div>
	</div>
    </form>
      </div>
    </div>
  </div>
</div>

<script src="./setmodal.js"></script>
