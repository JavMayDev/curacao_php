<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(2)) {
    header('Location: ../index.php');
    exit();
}

if(isset($_POST['cancel'])){
    header("Location: ../");
    exit();
}

if(isset($_POST['submit'])){
    unset($_POST['submit']);

    $post_keys = array_keys($_POST);

    /* clean empty fields */
    foreach($post_keys as $field){
	if($_POST[$field] == '') 
	    unset ($_POST[$field]);
    }

    /* echo "<br>active on post: ${_POST['active']}<br>"; */

    /* set active value */
    if(isset($_POST['active']))
	$_POST['active'] = 1;
    else
       	$_POST['active'] = 0;

    var_dump($_POST);

    $query = "UPDATE services SET ";

    $post_keys = array_keys($_POST);
    $i = 0;
    $count = count($post_keys);
     
    foreach($post_keys as $key){
	$query .= "$key = '${_POST[$key]}'";
	if($i < count($post_keys) - 1)
	    $query .= ',';
	$query .= ' ';
	$i++;
    }

    $query .= "WHERE id = ${_GET['id']};";

    echo "<br>$query<br>";

    include(__DIR__.'/../db.php');
    $res = mysqli_query($dbconn, $query);

    echo "<br>result: $res<br>";

    if($res){
	$_SESSION['msg'] = 'Servicio actualizado con éxito';
	$_SESSION['msg_type'] = 'success';
    } else {
	$_SESSION['msg'] = 'No se pudo actualizar el servicio';
	$_SESSION['msg_type'] = 'danger';
    }

    header('Location: ../');
}

ob_end_flush();
?>
