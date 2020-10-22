<?php

include('../includes/session_check.php');

if(!user_logged()) {
    header('Location: ../index.php');
    exit();
}

include(__DIR__.'/../includes/header.php');

if(isset($_POST['submit'])){
    echo "Getting request";
}

?>

<form action="index.php" method="POST">

    <!-- INFORMACION DEL SERVICIO -->
    <div>
	<h2>Información del servicio</h2>
	<div class="form-row">
	    <div class=" col-md-6 form-group">
		<label for="servicio">servicio</label>
		<select class="form-control" id="service" name="">
		    <option value="">servicio</option>
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
		<input class="form-control" type="date">
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

    <!-- CLIENTE Y BENEFICIARIO -->
    <div>
	<h2>Información del cliente y beneficiario</h2>
	<div class="form-row">
	    <div class="form-group col-md-6">
		<label for="">nombre del cliente que envía</label>
		<input class="form-control" type="text">
	    </div>
	    <div class="form-group col-md-6">
		<label for="">nombre del cliente que recibió</label>
		<input class="form-control" type="text">
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
		<input class="form-control" type="tel">
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

    <!-- PRODUCTO Y PROBLEMA -->
    <div>
	<h2>Información del producto y problema</h2>
	<div class="form-row">
	    <div class="form-group col-md-4">
		<label for="">Articulo</label>
		<select id="" class="form-control" name=""></select>
	    </div>
	    <div class="form-group col-md-4">
		<label for="">Marca</label>
		<input class="form-control" type="">
	    </div>
	    <div class="form-group col-md-4">
		<label for="">Modelo</label>
		<input class="form-control" type="">
	    </div>
	</div>
	<div class="form-row">

	    <div class="form-group col-md-4">
		<label for="">Garantía</label>
		<input type="text" class="form-control" type="">
	    </div>
	    <div class="form-group col-md-4">
		<label for="">Cobertura</label>
		<input type="text" class="form-control" type="">
	    </div>
	    <div class="form-group col-md-4">
		<label for="">No aplica</label>
		<input type="checkbox" class="form-control" type="">
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-12">
		<label for="">Descripción</label>
		<textarea class="form-control" id="" name="" cols="30" rows="5"></textarea>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-6">
		<label for="">Servicio enviado por (Asociado)</label>
		<input class="form-control" type="">
	    </div>
	    <div class="form-group col-md-6">
		<label for="">Revisado por (Supervisor)</label>
		<input class="form-control" type="">
	    </div>
	</div>
    </div>

    <!-- GUARDAR Y LIMPIAR -->
    <div>
	<div class="form-row">
	    <div class="form-group col-md-4">
		<input class="form-control btn btn-secondary" type="submit" value="Limpiar">
	    </div>
	    <div class="form-group col-md-4">
		<input class="form-control btn btn-success" name="submit" type="submit" value="Guardar">
	    </div>
	</div>
    </div>
</form>

<?php include(__DIR__.'/../includes/footer.php') ?>
