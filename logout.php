<?php 

include('session.php');

session_destroy();
$_SESSION['logged'] = false;
var_dump($_SESSION);
header('Location: index.php');

?>
