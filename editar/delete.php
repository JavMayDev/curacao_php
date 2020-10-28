<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(3)) {
    header('Location: ../index.php');
    exit();
}

if(isset($_GET['id'])){

    include(__DIR__.'/../db.php');
    $query = "DELETE FROM services WHERE id='${_GET['id']}';";
    echo $query;
    $res = mysqli_query($dbconn, $query);
    var_dump($res);
    if($res){
	$_SESSION['msg'] = "El servicio se eliminó";
	$_SESSION['msg_type'] = "success";
    } else {
	$_SESSION['msg'] = "No se pudo eliminar el servicio";
	$_SESSION['msg_type'] = "danger";
    }
}

header('Location: ../');

ob_end_flush();
?>

