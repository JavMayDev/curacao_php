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

/* database */
include(__DIR__.'/../../db.php');

/* fetch row */
$row = mysqli_fetch_assoc(mysqli_query($dbconn, "SELECT * FROM services WHERE id = ${_GET['id']}"));

if(!$row)
    exit("No existe tal servicio en la base de datos");

/* format dates */
$row['service_date'] = explode(' ', $row['service_date'])[0];
$row['delivery_date'] = explode(' ', $row['delivery_date'])[0];

/* html encode multiline strings */
$row['problem_description'] = str_replace("\r\n", "<br>", $row['problem_description']);
$row['notes'] = str_replace("\r\n", "<br>", $row['notes']);

require(__DIR__.'/../../vendor/autoload.php');

/* import table parts */
require(__DIR__.'/tables/client_info.php');
require(__DIR__.'/tables/service_info.php');
require(__DIR__.'/tables/product_info.php');

$document = "
<style>
    table {
	width: 100%;
    }
    .section {
	margin-top: 50px;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;    
    }
    .field {
	background-color: #ddd;
    }
    .header {
	background-color: #aaa;
	text-align: center;
    }
</style>
$service_info_table
$client_info_table
$product_info_table
";

$filename = 'servicio_'.$row['order_num'];

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($document);
$mpdf->setTitle($filename);
$mpdf->Output($filename.'.pdf','I');

?>
