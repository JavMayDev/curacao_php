<?php
/* to avoid header redirect fails */
ob_start();
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

if(isset($_POST['user_update_submit'])) {
    include(__DIR__.'/../db.php');

    $res = mysqli_fetch_row(mysqli_query($dbconn, "SELECT password FROM users WHERE id=".$_SESSION['user_id'].";"));

    if(password_verify($_POST['current_password'], $res[0])) {
	$query = 'UPDATE users SET ';
	if($_POST['email'] !== '') $query .= "email = '${_POST['email']}'";
	if($_POST['name'] !== '') $query .= ", name = '${_POST['name']}'";
	if($_POST['new_password'] !== '') {
	    $hashed_pass = password_hash($_POST['new_password'],PASSWORD_DEFAULT);
	    $query .= ", password = '$hashed_pass'";
	}

	$query .= " WHERE id = ${_SESSION['user_id']};";

	$res = mysqli_query($dbconn, $query);

	if($res) {
	    $_SESSION['msg'] = 'Informaci&oacute;n actualziada con &eacute;xito';
	    $_SESSION['msg_type'] = 'success';
	} else {
	    $_SESSION['msg'] = 'No se pudo actualizar su informaci&oacute;n';
	    $_SESSION['msg_type'] = 'danger';
	}

    } else {
	$_SESSION['msg'] = 'Contraseña incorrecta';
	$_SESSION['msg_type'] = 'danger';
    }
}

?>
