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

/* var_dump($row); */

require(__DIR__.'/../../vendor/autoload.php');

require(__DIR__.'/tables/client_info.php');
/* require(__DIR__.'/tables/service_info.php'); */


$grid = "
<style>
table { 
    width: 100%;
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
    background-color: #aaa;
}
</style>
<table>
    <tr>
        <td class='field'>Name</td>
        <td colspan='2'>Juan fenicio de la Cana</td>
    </tr>
    <tr>
        <td class='field' colspan='2'>Some super large field name</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Some</td>
        <td>other</td>
        <td>things</td>
    </tr>
</table>
";

$document = "
<style>
    table {
	width: 100%;
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
	background-color: #aaa;
    }
</style>
$client_info_table
";

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($document);
/* $mpdf->WriteHTML($grid); */
$mpdf->Output();


?>
