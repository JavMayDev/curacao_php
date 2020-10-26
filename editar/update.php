<?php

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(2)) {
    header('Location: ../index.php');
    exit();
}

if(isset($_POST['cancel'])){
    header("Location: ../historial");
    exit();
}


if(isset($_POST['submit'])){
    unset($_POST['submit']);

    /* set active value */
    if(isset($_POST['active']))
	$_POST['active'] = '1';
    else
       	$_POST['active'] = '0';

    $post_keys = array_keys($_POST);

    /* clean empty fields */
    foreach($post_keys as $field){
	if($_POST[$field] == '') 
	    unset ($_POST[$field]);
    }

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

    include(__DIR__.'/../db.php');
    $res = mysqli_query($dbconn, $query);

    header('Location: ../historial');
}
?>
