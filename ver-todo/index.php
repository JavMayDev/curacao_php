<?php

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

/* database */
include(__DIR__.'/../db.php');
 
$query = "SELECT * FROM services WHERE active = 0;";

$result = mysqli_query($dbconn, $query);
if(!$result) echo "No hay servicios para mostrar";
else 
    include(__DIR__.'/../table/index.php');

?>

<?php include(__DIR__.'/../includes/footer.php') ?>
