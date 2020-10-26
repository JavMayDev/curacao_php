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
    if($res){
	exit( "ya existe un usuario registrado con ese email");
    }
    var_dump($res);

    $query = "INSERT INTO users (name, email, password, access_level) values 

	(
	'${_POST['name']}',
	'${_POST['email']}',
	'${_POST['password']}',
	'${_POST['access_level']}'
	)
	;";
    $res = mysqli_query($dbconn, $query);
    var_dump($res);
    if(!$res) echo "no se pudo registrar el usuario";

}

?>

<div class="container mx-auto">

    <form action="" method="POST">
	<div class="form-group">
	    <label for="">Nombre</label>
	    <input name="name" class="form-control" type="text">
	</div>
	<div class="form-group">
	    <label for="">email</label>
	    <input name="email" class="form-control" type="text">
	</div>
	<div class="form-group">
	    <label for="">contraseña</label>
	    <input name="password" class="form-control" type="password">
	</div>
	<div class="form-group">
	    <label for="">Nivel de acceso</label>
	    <select name="access_level" id="" class="form-control" name="">
		<option selected="selected" value="1">Asesor</option>
		<option value="2">Supervisor</option>
		<option value="3">Administrador</option>
	    </select>
	</div>
	<div class="form-group">
	    <label for="">contraseña</label>
	    <input name="submit" class="form-control btn btn-success" type="submit" value="Dar de alta">
	</div>
    </form>
</div>
