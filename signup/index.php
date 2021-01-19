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

/* INSERT USER */
if(isset($_POST['submit'])){

    $query = "SELECT email FROM users WHERE email = '${_POST['email']}'";
    $res = mysqli_query($dbconn, $query);
    if($res->num_rows > 0){
	$_SESSION['msg'] = 'Ya existe un usuario con ese email';
	$_SESSION['msg_type'] = 'danger';
    } else {

	$hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$query = "INSERT INTO users (name, email, password, access_level, country) values 

	    (
		'${_POST['name']}',
		'${_POST['email']}',
		'$hashed_pass',
		'${_POST['access_level']}',
		'${_POST['country']}'
	    );";
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

/* DELETE USER */
if(isset($_POST['delete_user'])){
    echo "on delete";
    $query = "DELETE FROM users WHERE id='${_GET['id']}';";
    $res = mysqli_query($dbconn, $query);
    var_dump($res);
    if($res){
	$_SESSION['msg'] = 'Usuario elimiado';
	$_SESSION['msg_type'] = 'success';
    } else {
	$_SESSION['msg'] = 'El usuario no se pudo eliminar';
	$_SESSION['msg_type'] = 'danger';
    }
}

/* GET USERS */
$query = "SELECT id, name, access_level, email, country FROM users;";
$users_result = mysqli_query($dbconn, $query);

?>

<div class="row">

<div class="card col-md-6">
<div class="card-body">
    <form action="" method="POST">
	<div class="form-row">
	    <div class="form-group col-md-6">
		<label for="">Nombre</label>
		<input name="name" class="form-control" type="text">
	    </div>
	    <div class="form-group col-md-6">
		<label for="">email</label>
		<input name="email" class="form-control" type="text">
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-6">
		<label for="">contraseña</label>
		<input name="password" class="form-control" type="password">
	    </div>
	    <div class="form-group col-md-6">
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
		<label for="">Pa&iacute;s</label>
		<select name="country" class="form-control" id="" name="">
		    <option value=""></option>
		    <option value="El Salvador">El Salvador</option>
		    <option value="Guatemala">Guatemala</option>
		    <option value="Honduras">Honduras</option>
		    <option value="Nicaragua">Nicaragua</option>
		    <option value="México">México</option>
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
</div>
    <div class="col-md-6">
	<ul class="list-group">
	    <?php
		$roles = array(0, 'asesor', 'supervisor', 'administrador');
		while($row = mysqli_fetch_array($users_result)): 
	    ?>
	    <li class="list-group-item d-flex justify-content-between">
		<span ><?= $row['name']?></span>
		<span ><?= $row['country']?></span>
		<span ><?= $row['email']?></span>
		<span ><?= $roles[$row['access_level']]?></span>
		<form method="POST" action=".?id=<?= $row['id']?>">
		    <input type="submit" value="Eliminar" name="delete_user" class="btn btn-danger">
		</form>
	    </li>
	    <? endwhile; ?>
	</ul>
    </div>
</div>

<!-- Prevent form submit on reload -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?  include(__DIR__.'/../includes/footer.php'); ?>
