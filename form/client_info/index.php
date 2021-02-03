

<!-- CLIENTE Y BENEFICIARIO -->
<div>
    <h2>Información del cliente y beneficiario</h2>
    <div class="form-row">
	<div class="form-group col-md-6" id="client_sender_name_input_group">
	    <label for="">nombre del cliente que envía</label>
	    <input denyempty="true" lockable="true" name="client_sender_name" class="form-control" type="text">
	</div>
	<div class="form-group col-md-6" >
	    <label for="">nombre del cliente que recibió</label>
	    <input denyempty="true" required lockable="true" name="client_receiver_name" class="form-control" type="text" id="validationCustom02">
	</div>
    </div>

    <!-- PLACE -->
    <h5>Dirección (Dónde esta actualmente el producto)</h5>
    <div class="form-row">
	<div class="form-group col-md-4">
	    <label for="">País</label>
	    <select denyempty="true" lockable="true" onblur="onCountryBlur()" name="country" class="form-control">
		<option selected="selected" hidden></option>
	    </select>
	</div>
	<div class="form-group col-md-4">
	    <label for="">Estado</label>
	    <select denyempty="true" lockable="true" name="state" class="form-control"></select>
	</div>
	<div class="form-group col-md-4">
	    <label for="">Ciudad o Municipio</label>
	    <input denyempty="true" lockable="true" class="form-control" name="city" type="text">
	</div>
    </div>
    <div class="form-row">

	<div class="form-group col-md-4">
	    <label for="">Colonia</label>
	    <input denyempty="true" lockable="true" name="suburb" class="form-control" type="">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Calle</label>
	    <input denyempty="true" lockable="true" name="street" class="form-control" type="">
	</div>
	<div class="form-group col-md-2">
	    <label for=""># Exterior</label>
	    <input denyempty="true" lockable="true" name="exterior_num" class="form-control" type="number">
	</div>
	<div class="form-group col-md-2">
	    <label for=""># Interior</label>
	    <input lockable="true" name="interior_num" class="form-control" type="number">
	</div>
    </div>
    <div class="form-row">

	<div class="form-group col-md-4">
	    <label for="">Teléfono de casa</label>
	    <input denyempty="true" lockable="true" name="local_tel" class="form-control" type="tel">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Teléfono celular</label>
	    <input denyempty="true" lockable="true" name="cel_tel" class="form-control" type="tel">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Codigo Postal</label>
	    <input denyempty="true" lockable="true" name="zip_code" class="form-control" type="number">
	</div>
    </div>
</div>

<script src="<?= BASE_URL.'/form/client_info/stateSelect.js'?>"></script>
