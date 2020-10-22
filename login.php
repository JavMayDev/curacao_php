<?php

include('db.php');
unset($_SESSION['message']);

/* get credentials */
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT email, password, id FROM users WHERE email='$email'";

$result = mysqli_query($dbconn, $query);

if(mysqli_num_rows($result) == 0){
    $_SESSION['message'] = 'no such user';
    header('Location: index.php');
    exit();
}

$row = mysqli_fetch_assoc($result);

if($row['password'] == $password){
    $_SESSION['user_id'] = $row['id'];
    unset($_SESSION['message']);

    header('Location: protected_path');
} else {
    $_SESSION['message'] = 'Wrong password';
    header('Location: index.php');
}


?>
