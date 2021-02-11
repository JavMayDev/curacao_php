<?php

/* redirect if no permission */
include(__DIR__.'/../../includes/session_check.php');
if(!user_logged(1)) {
    /* header('Location: ../index.php'); */
    exit();
}

/* if no id on request */
if(!isset($_GET['id']))
    exit("No se ha especificado ningun servicio");

include(__DIR__.'/make_pdf.php');

make_pdf($_GET['id'], false);


?>
