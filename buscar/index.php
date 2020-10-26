<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

/* filter form */
include(__DIR__.'/filter_form.php');

/* database */
include(__DIR__.'/../db.php');
 
if(isset($_POST['filter_submit']) && isset($_POST['service_code'])) {

    $query = "SELECT * FROM services WHERE order_num = '${_POST['service_code']}'";
    $result = mysqli_query($dbconn, $query);

    if(!$result) exit("No se encontraron resultados");

    include(__DIR__.'/../table/index.php');

} 


include(__DIR__.'/../includes/footer.php');

ob_end_flush();
?>


