

<!-- INFORMACION DEL SERVICIO -->
<div>
    <h2>Información del servicio</h2>
    <div class="form-row">
	<div class=" col-md-6 form-group">
	    <label for="servicio">servicio</label>
	    <select name="service_type" class="form-control" id="service" name="">
		<option value="service">servicio</option>
		<option value="">reclamo</option>
		<option value="">anulacion total</option>
	    </select>
	</div>
	<div class="col-md-6 form-group">
	    <label for="servicio">No. de cuenta del cliente</label>
	    <input class="form-control" type="text" >
	</div>
    </div>
    <div class="form-row">
	<div class="col-md-6 form-group">
	    <label for="">fecha del servicio</label>
	    <input name="service_date" class="form-control" type="date">
	</div>
	<div class="col-md-6 form-group">
	    <label for="">fecha de entrega</label>
	    <input class="form-control" type="date">
	</div>
    </div>
    <div class="form-row">
	<div class="col-md-6 form-group">
	    <label for="">No. de order</label>
	    <input class="form-control" type="">
	</div>
	<div class="col-md-6 form-group">
	    <label for="">Tienda donde se realizó la venta</label>
	    <select id="" class="form-control" name="">
		<option value="">Los Angeles</option>
		<option value="">Panorama</option>
		<option value="">South Gate</option>
	    </select>
	</div>
    </div>
</div>

<script src="./form/service_info/fill.js"></script>
