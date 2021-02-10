<?php

if(isset($_GET['id'])){

    include(__DIR__.'/../db.php');
    echo 'testing export page';

    $filename = "curacao_service${_GET['id']}.xls"; // File Name
    $result = mysqli_query($dbconn, "SELECT * FROM services WHERE id = '${_GET['id']}'");
    if (!$result) exit('no database result');

} else {
    exit('No se ha especificado ningun servicio');
}

?>
