    <form action="" method="POST">
	<div class="form-row">
	    <div class="form-group col-md-6">
		<label for="">Nombre</label>
		<input name="name" class="form-control" type="text">
	    </div>
	    <div class="form-group col-md-6">
		<label for="">email</label>
		<input name="email" class="form-control" type="text">
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-6">
		<label for="">contraseña</label>
		<input name="password" class="form-control" type="password">
	    </div>
	    <div class="form-group col-md-6">
		<label for="">Nivel de acceso</label>
		<select name="access_level" class="form-control" name="">
		    <option selected="selected" value="1">Asesor</option>
		    <option value="2">Supervisor</option>
		    <option value="3">Administrador</option>
		</select>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-12">
		<label for="">Pa&iacute;s</label>
		<select name="country" class="form-control" name="">
		    <option value=""></option>
		    <option value="El Salvador">El Salvador</option>
		    <option value="Guatemala">Guatemala</option>
		    <option value="Honduras">Honduras</option>
		    <option value="Nicaragua">Nicaragua</option>
		    <option value="México">México</option>
		</select>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-12">
		<input name="submit" class="form-control btn btn-success" type="submit" value="Dar de alta">
	    </div>
	</div>
    </form>
