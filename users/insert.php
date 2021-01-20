<?php
/* to avoid header redirect fails */
ob_start();
if(!user_logged(3)) {
    header('Location: ../index.php');
    exit();
}

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
?>
