
<!-- INFORMACION DEL SERVICIO -->
<div>
    <h2>Información del servicio</h2>
    <div class="form-row">

	<div class="form-group col-md-4">
	    <label for="">Cuenta con garantía</label>
	    <input name="warranty" type="checkbox" class="form-control">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Cobertura</label>
	    <input name="coverage" type="number" placeholder="años" class="form-control">
	</div>
	<div class="form-group col-md-4">
	    <label for="">No aplica</label>
	    <input name="n_a" type="checkbox" class="form-control" >
	</div>
    </div>
    <div class="form-row">
	<div class=" col-md-6 form-group">
	    <label for="servicio">servicio</label>
	    <select name="service_type" class="form-control" id="service" >

		<option value disabled selected hidden>-- tipo de servicio --</option>
		<option value="servicio">servicio</option>
		<option value="reclamo">reclamo</option>

		<!-- ONLY AVAILABLE FOR 2 =< ACCESS LEVEL USERS -->
		<?php if($_SESSION['access_level'] >= 2): ?>
		<option value="anulacion parcial">anulacion parcial</option>
		<option value="anulacion total">anulacion total</option>
		<?php endif; ?>

	    </select>
	    </div>
	<div class="col-md-6 form-group">
	    <label for="servicio">No. de cuenta del cliente</label>
	    <input name="client_account_num" denyempty="true" lockable="true" class="form-control" type="text" >
	</div>
    </div>
    <div class="form-row">
	<div class="col-md-6 form-group">
	    <label for="">fecha del servicio</label>
	    <input name="service_date"
		class="form-control" 
		type="date" <?= $_SESSION['access_level'] <= 1 ? 'disabled' : '' ?>>
	</div>
	<div class="col-md-6 form-group">
	    <label for="">fecha de entrega</label>
	    <input name="delivery_date" denyempty="true" type="date" class="form-control"
		>
	</div>
    </div>
    <div class="form-row">
	<div class="col-md-6 form-group">
	    <label for="">No. de orden</label>
	    <input name="order_num" lockable="true" denyempty="true" class="form-control" type="">
	</div>
	<div class="col-md-6 form-group">
	    <label for="">Tienda donde se realizó la venta</label>
	    <select name="sale_store" denyempty="true" lockable="true" id="" class="form-control" name="">
		<option disabled hidden selected="selected"></option>
		<option value="Los angeles">Los angeles</option>
		<option value="Panorama">Panorama</option>
		<option value="South Gate">South Gate</option>
		<option value="Huntington Park">Huntington Park</option>
		<option value="San Bernardino">San Bernardino</option>
		<option value="Santa Ana">Santa Ana</option>
		<option value="Chino">Chino</option>
		<option value="Phoenix">Phoenix</option>
		<option value="Anaheim">Anaheim</option>
		<option value="Lynwood">Lynwood</option>
		<option value="Las vegas">Las vegas</option>
	    </select>
	</div>
    </div>
</div>

<script>
    var now = new Date(Date.now());
    var day = ('0' + now.getDate()).slice(-2);
    var month = ('0' + (now.getMonth() + 1)).slice(-2);
    document.getElementsByName('service_date')[0].value =
        now.getFullYear() + '-' + month + '-' + day;
</script>
