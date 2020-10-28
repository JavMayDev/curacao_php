<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(3)) {
    header('Location: ../index.php');
    exit();
}


/* header */
include(__DIR__.'/../includes/header.php');

include('../db.php');

/* on create */
if(isset($_POST['submit_email'])){
    /* if input isn't empty */
    if(!$_POST['email'] == '') {

	/* first, check if already registered */
	$res = mysqli_query($dbconn, "SELECT email FROM emails WHERE email = '${_POST['email']}';");
	if($res && $res->num_rows > 0){
	    $_SESSION['msg'] = 'Ese email ya está registrado';
	    $_SESSION['msg_type'] = 'danger';
	} else {
	    $query = "INSERT INTO emails (email) VALUES ('${_POST['email']}');";
	    $res = mysqli_query($dbconn, $query);
	    if(!$res) {
		$_SESSION['msg'] = 'No se pudo registrar el correo';
		$_SESSION['msg_type'] = 'danger';
	    }
	}
    }
}

/* on delete */
if(isset($_POST['delete_email'])){
    $query = "DELETE FROM emails WHERE id = '${_GET['id']}'";
    $res = mysqli_query($dbconn, $query);
    if(!$res){
	$_SESSION['msg'] = 'No se pudo eliminar el email';
	$_SESSION['msg_type'] = 'danger';
    }
}

$query = "SELECT * FROM emails";
$result = mysqli_query($dbconn, $query);

?>

<h2 class="text-center">Correos a los que se informa una alta de servicio</h2>
<div class="row mx-auto">
    <div class="col-md-6">
	<form action="" method="POST" class="form-inline row d-flex">
	    <div class="form-group w-auto mx-auto">
		<input name="email" class="form-control flex-grow-1" type="email" placeholder="Nuevo correo">
	    </div>
	    <div class="form-group mx-auto">
		<input value="Agregar" class="form-control btn btn-success" type="submit" name="submit_email">
	    </div>
	</form>
    </div>
    <div class="col-md-6">
	<?php if($result): ?>
	<ul class="list-group">
	    <?php
	    if(isset($result)):
	    while($row = mysqli_fetch_array($result)):
	    ?>
	    <li class="list-group-item">
		<?= $row['email']?>
		<form action=".?id=<?php echo $row['id']?>" method="POST">
		    <input type="submit" class="btn btn-danger float-right" name="delete_email" value="Eliminar">
		</form>
	    </li>
	    <?php endwhile; endif; ?>
	</ul>
	<?php endif; ?>
    </div>
</div>

<?php

include(__DIR__.'/../includes/footer.php');
/* to avoid header redirect fails */
ob_end_flush();
?>
