<?php

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

$active = "0";

include(__DIR__.'/../table/query.php');

?>

<?php include(__DIR__.'/../includes/footer.php') ?>
