<?php

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(3)) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

/* database */
include(__DIR__.'/../db.php');

if(isset($_POST['submit'])){

    $query = "SELECT email FROM users WHERE email = '${_POST['email']}'";
    $res = mysqli_query($dbconn, $query);
    if($res->num_rows > 0){
	$_SESSION['msg'] = 'Ya existe un usuario con ese email';
	$_SESSION['msg_type'] = 'danger';
    } else {

	$hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$query = "INSERT INTO users (name, email, password, access_level) values 

	    (
		'${_POST['name']}',
		'${_POST['email']}',
		'$hashed_pass',
		'${_POST['access_level']}'
	)
	;";
	$res = mysqli_query($dbconn, $query);
	if($res) {
	    $_SESSION['msg'] = 'Usuario registrado con éxito';
	    $_SESSION['msg_type'] = 'success';
	} else {

	    $_SESSION['msg'] = 'No se pudo registrar el usuario';
	    $_SESSION['msg_type'] = 'danger';
	}

    }
}

?>

<div class="container mx-auto">

    <form action="" method="POST">
	<div class="form-row">
	    <div class="form-grou col-md-6">
		<label for="">Nombre</label>
		<input name="name" class="form-control" type="text">
	    </div>
	    <div class="form-group col-md-6">
		<label for="">email</label>
		<input name="email" class="form-control" type="text">
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-8">
		<label for="">contraseña</label>
		<input name="password" class="form-control" type="password">
	    </div>
	    <div class="form-grou col-md-4">
		<label for="">Nivel de acceso</label>
		<select name="access_level" id="" class="form-control" name="">
		    <option selected="selected" value="1">Asesor</option>
		    <option value="2">Supervisor</option>
		    <option value="3">Administrador</option>
		</select>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-12">
		<input name="submit" class="form-control btn btn-success" type="submit" value="Dar de alta">
	    </div>
	</div>
    </form>
</div>

<!-- Prevent form submit on reload -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?  include(__DIR__.'/../includes/footer.php'); ?>
