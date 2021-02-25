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

    /* image upload */
    if(isset($_FILES['product_image'])) {
	$filename = uniqid('product_image_'). '.' .pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
	$upload_path = realpath(__DIR__.'/../products_images')."/$filename";
	if(move_uploaded_file($_FILES['product_image']['tmp_name'], $upload_path))
	    $_POST['product_image_filename'] = $filename;
    }

    unset($_POST['submit']);
    if($_POST['service_date'] == '') unset($_POST['service_date']);


    $post_keys = array_keys($_POST);

    /* clean empty fields */
    foreach($post_keys as $field){
	if($_POST[$field] == '') 
	    unset ($_POST[$field]);
    }

    /* set last update date */
    $_POST['last_update_date'] = date('Y-m-d');

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

    if($res){
	$_SESSION['invasive_alert'] = 'SU SERVICIO SE ENVIO CON EXITO';
	$_SESSION['alert_type'] = 'success';
	$insert_id = mysqli_insert_id($dbconn);
	include(__DIR__.'/send_mail.php');

    } else {
	$_SESSION['invasive_alert'] = 'El servicio no se pudo registrar';
	$_SESSION['alert_type'] = 'danger';
    }

    header("Location: ../buscar");
}

/* to avoid header redirect fails */
ob_end_flush();
?>
