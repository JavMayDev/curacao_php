<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

?>

<!-- if user's access_level 1, include a script for restrictions -->
<?php if($_SESSION['access_level'] <= 1): ?>
<script src="./error_feedback.js"></script>
<script src="./first_filter.js"></script>
<script src="./restrictions.js"></script>
<script src="./lockForm.js"></script>
<script src="./denyEmpty.js"></script>
<?php endif; ?>

</script>

<h1 class="text-center text-primary">Solicitar servicio</h1>

<form action="./submit.php" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">

<?php 
    /* include each part of the form */
    include(__DIR__.'/../form/service_info/index.php');
    include(__DIR__.'/../form/client_info/index.php');
    include(__DIR__.'/../form/product_info/index.php');
?>

    <!-- GUARDAR Y LIMPIAR -->
    <div>
	<div class="form-row">
	    <div class="form-group col-md-4">
		<input 
		    lockable="true" 
		    class="form-control 
		    btn btn-success" name="submit" type="submit" value="Guardar">
	    </div>
	</div>
    </div>
</form>

<!-- DEV SCRIPT -->
<!-- <script src="./fill.js"></script> -->

<?php
include(__DIR__.'/../includes/footer.php');

/* to avoid header redirect fails */
ob_end_flush();

?>
