<?php

/* redirect if no logged */
include('../includes/session_check.php');
if(!user_logged()) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

?>

<script src="./form/client_info/validate.js"></script>
<script>
function validateForm(){
    /* event.preventDefault(); */
    return validateClientInfo();
}
</script>
<form action="<?='./submit.php'?>" method="POST" onsubmit="return validateForm()">

<?php 
    /* include each part of the form */
    include(__DIR__.'/form/service_info/index.php');
    include(__DIR__.'/form/client_info/index.php');
    include(__DIR__.'/form/product_info/index.php');
?>

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
