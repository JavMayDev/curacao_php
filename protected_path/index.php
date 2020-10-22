<?php

include('../includes/session_check.php');

if(!user_logged()) {
    header('Location: ../index.php');
    exit();
}

include(__DIR__.'/../includes/header.php');

echo "super secret path";

?>
