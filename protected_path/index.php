<?php

include('../includes/session_check.php');

if(!user_logged()) {
    header('Location: ../index.php');
    exit();
}

echo "super secret path";

?>
