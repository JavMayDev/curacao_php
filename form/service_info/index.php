

<!-- INFORMACION DEL SERVICIO -->
<div>
    <h2>Información del servicio</h2>
    <div class="form-row">

	<div class="form-group col-md-4">
	    <label for="">Cuenta con garantía</label>
	    <input name="warranty" type="checkbox" class="form-control" onchange="checkServiceAvailability()">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Cobertura</label>
	    <input name="coverage" type="number" placeholder="años" class="form-control" onchange="checkServiceAvailability()">
	</div>
	<div class="form-group col-md-4">
	    <label for="">No aplica</label>
	    <input name="n_a" type="checkbox" class="form-control" onblur="onBlurNA()">
	</div>
    </div>
    <div class="form-row">
	<div class=" col-md-6 form-group">
	    <label for="servicio">servicio</label>
	    <select name="service_type" class="form-control" id="service" onchange="checkServiceAvailability()">
		<option value="servicio">servicio</option>
		<option value="reclamo">reclamo</option>
		<option value="anulacion parcial">anulacion parcial</option>
		<option value="anulacion total">anulacion total</option>
	    </select>
	</div>
	<div class="col-md-6 form-group">
	    <label for="servicio">No. de cuenta del cliente</label>
	    <input name="client_account_num"  class="form-control" type="text" >
	</div>
    </div>
    <div class="form-row">
	<div class="col-md-6 form-group">
	    <label for="">fecha del servicio</label>
	    <input name="service_date" class="form-control" type="date" disabled>
	</div>
	<div class="col-md-6 form-group">
	    <label for="">fecha de entrega</label>
	    <input name="delivery_date" type="date" class="form-control" onchange="checkServiceAvailability()">
	</div>
    </div>
    <div class="form-row">
	<div class="col-md-6 form-group">
	    <label for="">No. de order</label>
	    <input name="order_num" class="form-control" type="">
	</div>
	<div class="col-md-6 form-group">
	    <label for="">Tienda donde se realizó la venta</label>
	    <select name="sale_store" id="" class="form-control" name="">
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

