<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
if(!user_logged(3)) {
    header('Location: ../index.php');
    exit();
}

/* database */

if(isset($_POST['user_update_submit'])) {
    include(__DIR__.'/../db.php');
    unset($_POST['user_update_submit']);

    $post_keys = array_keys($_POST);

    /* clean empty fields */
    foreach($post_keys as $field){
	if($_POST[$field] == '') 
	    unset ($_POST[$field]);
    }

    $query = "UPDATE users SET ";

    $i = 0;
    $count = count($post_keys);

    if(isset($_POST['password'])) 
	$_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
     
    $post_keys = array_keys($_POST);
    foreach($post_keys as $key){
	$query .= "$key = '${_POST[$key]}'";
	if($i < count($post_keys) - 1)
	    $query .= ',';
	$query .= ' ';
	$i++;
    }

    $query .= "WHERE id=".$_GET['id'].";";

    $res = mysqli_query($dbconn,$query);
    if($res){
	$_SESSION['msg'] = 'Usuario actualizado con éxito';
	$_SESSION['msg_type'] = 'success';
	header("Refresh:0");
    } else {
	$_SESSION['msg'] = 'No se pudo actualizar el usuario';
	$_SESSION['msg_type'] = 'danger';
    }

}

?>
