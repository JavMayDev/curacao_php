<?php
/* to avoid header redirect fails */
ob_start();


include('db.php');
include('session.php');

/* get credentials */
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT email, password, id, access_level FROM users WHERE email='$email'";

$result = mysqli_query($dbconn, $query);

if(mysqli_num_rows($result) == 0){
    $_SESSION['msg'] = 'No existe ningun usuario con ese email';
    $_SESSION['msg_type'] = 'danger';
    header('Location: index.php');
    exit;
}

$row = mysqli_fetch_assoc($result);

if(password_verify($_POST['password'], $row['password'])){
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['access_level'] = $row['access_level'];
    $_SESSION['logged'] = true;


    header('Location: buscar');
} else {
    $_SESSION['msg'] = 'Contraseña incorrecta';
    $_SESSION['msg_type'] = 'danger';
    header('Location: index.php');
}

/* to avoid header redirect fails */
ob_end_flush();
?>
