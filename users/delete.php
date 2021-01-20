<?php

if(!user_logged(3)) {
    header('Location: ../index.php');
    exit();
}
/* DELETE USER */
if(isset($_POST['user_delete_submit'])){
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

?>
