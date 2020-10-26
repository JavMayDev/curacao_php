<?php

if(isset($_GET['id'])){

    include(__DIR__.'/../db.php');
    echo 'testing export page';

    $filename = "curacao_service${_GET['id']}.xls"; // File Name

    // Download file
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");
    $result = mysqli_query($dbconn, "SELECT * FROM services WHERE id = '${_GET['id']}'");
    // Write data to file
    $flag = false;
    while ($row = mysqli_fetch_assoc($result)) {
	if (!$flag) {
	    // display field/column names as first row
	    echo implode("\t", array_keys($row)) . "\r\n";
	    $flag = true;
	}
	echo implode("\t", array_values($row)) . "\r\n";
    }

} else {
    exit('No se ha especificado ningun servicio');
}

?>
