
<script src="./form/client_info/validate.js"></script>

<!-- CLIENTE Y BENEFICIARIO -->
<div>
    <h2>Información del cliente y beneficiario</h2>
    <div class="form-row">
	<div class="form-group col-md-6" id="client_sender_name_input_group">
	    <label for="">nombre del cliente que envía</label>
	    <input id="client_sender_name" name="client_sender_name" class="form-control" type="text">
	</div>
	<div class="form-group col-md-6" >
	    <label for="">nombre del cliente que recibió</label>
	    <input class="form-control" type="text" id="validationCustom02">
	</div>
    </div>

    <h5>Dirección (Dónde esta actualmente el producto)</h5>
    <div class="form-row">
	<div class="form-group col-md-4">
	    <label for="">País</label>
	    <select id="" class="form-control" name=""></select>
	</div>
	<div class="form-group col-md-4">
	    <label for="">Estado</label>
	    <select id="" class="form-control" name=""></select>
	</div>
	<div class="form-group col-md-4">
	    <label for="">Ciudad o Municipio</label>
	    <select id="" class="form-control" name=""></select>
	</div>
    </div>
    <div class="form-row">

	<div class="form-group col-md-4">
	    <label for="">Colonia</label>
	    <input class="form-control" type="">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Calle</label>
	    <input class="form-control" type="">
	</div>
	<div class="form-group col-md-2">
	    <label for=""># Exterior</label>
	    <input class="form-control" type="number">
	</div>
	<div class="form-group col-md-2">
	    <label for=""># Interior</label>
	    <input class="form-control" type="number">
	</div>
    </div>
    <div class="form-row">

	<div class="form-group col-md-4">
	    <label for="">Teléfono local</label>
	    <input name="local_tel" class="form-control" type="tel">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Teléfono celular</label>
	    <input class="form-control" type="tel">
	</div>
	<div class="form-group col-md-4">
	    <label for="">Codigo Postal</label>
	    <input class="form-control" type="number">
	</div>
    </div>
</div>


<script src="./form/client_info/fill.js"></script>
