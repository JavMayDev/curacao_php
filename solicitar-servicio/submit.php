<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

include('../db.php');

if(isset($_POST['submit'])){

    unset($_POST['submit']);
    if($_POST['service_date'] == '') unset($_POST['service_date']);


    $post_keys = array_keys($_POST);

    /* clean empty fields */
    foreach($post_keys as $field){
	if($_POST[$field] == '') 
	    unset ($_POST[$field]);
    }

    $query = "INSERT INTO services (";

    $i = 0;
    $post_keys = array_keys($_POST);
    foreach($post_keys as $field){
	$query .= "$field";

	/* put ',' in each field except the last one */
	if($i < count($post_keys) - 1)
	    $query.=', ';
	$i++;
    }

    $query .= ") VALUES(";

    $i = 0;
    foreach($_POST as $value){
	$query .= "'$value'";
	if($i < count($_POST) -1)
	    $query .= ', ';
	$i++;
    }

    $query .= ");";


    /* perform the query */
    $res = mysqli_query($dbconn,$query);

/*     error_reporting(-1); */
/*     ini_set('display_errors', 'On'); */
/*     set_error_handler("var_dump"); */

    if($res){
	$_SESSION['msg'] = 'Servicio registrado con éxito';
	$_SESSION['msg_type'] = 'success';

	mail(
	    'javimayorque@gmail.com',
	    'Test',
	    'testing mail function',
	    'From: new_service@curacaoexportservices.com'
	);

    } else {
	$_SESSION['msg'] = 'El servicio no se pudo registrar';
	$_SESSION['msg_type'] = 'danger';
    }

    header("Location: ../buscar");
}

/* to avoid header redirect fails */
ob_end_flush();
?>
