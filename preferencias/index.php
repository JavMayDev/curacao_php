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

/* database */
include(__DIR__.'/../db.php');

$query = "SELECT name, email FROM users WHERE id=".$_SESSION['user_id'].";";
$userjson = json_encode(mysqli_fetch_assoc(mysqli_query($dbconn, $query)));

include(__DIR__.'/update.php');

?>

<form method="POST" action="">
    <div class="form-row">
	<div class="form-group col-md-6">
	    <label for="">Nombre</label>
	    <input id="user-name" class="form-control" type="text" name="name">
	</div>
    </div>
    <div class="form-row">
	<div class="form-group col-md-6">
	    <label for="">Email</label>
	    <input id="user-email" class="form-control" type="text" name="email">
	</div>
    </div>
    <div class="form-row">
	<div class="form-group col-md-6">
	    <label for="">Contraseña</label>
	    <input class="form-control" type="password" name="new_password" placeholder="dejese vacio para no actualizar">
	</div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
	    <input class="form-control" type="password" name="current_password" placeholder="contrase&ntilde;a actual">
	</div>
        <div class="form-group col-md-3">
	    <input class="form-control btn btn-success" type="submit" name="user_update_submit" value="actualizar">
	</div>
    </div>
</form>


<script>
var userData = JSON.parse('<?= $userjson ?>')
console.log( userData )
$('#user-name').val(userData.name)
$('#user-email').val(userData.email)
</script>

<?php

include(__DIR__.'/../includes/footer.php');

ob_end_flush();
?>
