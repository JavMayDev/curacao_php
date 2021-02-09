<form method="POST">
    <div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">

	    <?php if($_SESSION['access_level'] >= 3): ?>
	    <div class="row">
		<label for="">Pa&iacute;s</label>
		<select name="country" class="form-control">
		    <option value="">Todos</option>
		    <option value="El Salvador">El Salvador</option>
		    <option value="Guatemala">Guatemala</option>
		    <option value="Honduras">Honduras</option>
		    <option value="Nicaragua">Nicaragua</option>
		    <option value="México">México</option>
		</select>
	    </div>
	    <?php endif ?>

	    <div class="row">
	    <label for="servicio">Servicio</label>
	    <select name="service_type" class="form-control" id="service" >
		<option value="">Todos</option>
		<option value="servicio">servicio</option>
		<option value="reclamo">reclamo</option>
		<option value="anulacion parcial">anulacion parcial</option>
		<option value="anulacion total">anulacion total</option>
	    </select>
	    </div>

	    <div class="row" style="margin: 7px 0px;">
		<div class="col-md-3">&Uacute;ltimos</div>
		<input placeholder="Vac&iacute;o para no filtrar" class="col-md-6 form-control" type="number" name="last_days">
		<div class="col-md-3">d&iacute;as</div>
	    </div>

	    <div class="row">
		<button class="form-control btn btn-primary" name="filter_submit">Buscar servicios</button>
	    </div>
	</div>
	<div class="col-md-3"></div>
    </div>
</form>
