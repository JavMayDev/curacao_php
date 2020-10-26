
<!-- CLIENTE Y BENEFICIARIO -->
<div>
    <h2>Información del cliente y beneficiario</h2>
    <div class="form-row">
	<div class="form-group col-md-6" id="client_sender_name_input_group">
	    <label for="">nombre del cliente que envía</label>
	    <input name="client_sender_name" class="form-control" type="text">
	</div>
	<div class="form-group col-md-6" >
	    <label for="">nombre del cliente que recibió</label>
	    <input name="client_receiver_name" class="form-control" type="text" id="validationCustom02">
	</div>
    </div>

    <!-- PLACE -->
    <h5>Dirección (Dónde esta actualmente el producto)</h5>
    <div class="form-row">
	<div class="form-group col-md-4">
	    <label for="">País</label>
	    <select onblur="onCountryBlur()" name="country" class="form-control">
		<option value="México">México</option>
	    </select>
	</div>
	<div class="form-group col-md-4">
	    <label for="">Estado</label>
	    <select name="state" class="form-control"></select>
	</div>
	<div class="form-group col-md-4">
	    <label for="">Ciudad o Municipio</label>
	    <input class="form-control" name="city" type="text">
	</div>
    </div>
    <div class="form-row">

	<div class="form-group col-md-4">
	    <label for="">Colonia</label>
	    <input name="suburb" class="form-control" type="">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Calle</label>
	    <input name="street" class="form-control" type="">
	</div>
	<div class="form-group col-md-2">
	    <label for=""># Exterior</label>
	    <input name="exterior_num" class="form-control" type="number">
	</div>
	<div class="form-group col-md-2">
	    <label for=""># Interior</label>
	    <input name="interior_num" class="form-control" type="number">
	</div>
    </div>
    <div class="form-row">

	<div class="form-group col-md-4">
	    <label for="">Teléfono local</label>
	    <input name="local_tel" class="form-control" type="tel">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Teléfono celular</label>
	    <input name="cel_tel" class="form-control" type="tel">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Codigo Postal</label>
	    <input name="zip_code" class="form-control" type="number">
	</div>
    </div>
</div>

<script src="<?= BASE_URL.'/form/client_info/stateSelect.js'?>"></script>
