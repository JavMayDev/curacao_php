<?php 
/* to avoid header redirect fails */
ob_start();

include('session.php');

session_destroy();
$_SESSION['logged'] = false;
$_SESSION['access_level'] = 0;
header('Location: index.php');

/* to avoid header redirect fails */
ob_end_flush();
?>
