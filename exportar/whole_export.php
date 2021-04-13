<?php
/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

$csv_data = '';

/* write columns names */
$fields = json_decode(file_get_contents(__DIR__.'/../table/fields.json'), true);
foreach($fields as $field) {
    $csv_data .= "\"${field['name']}\",";
}

/* write database data */
include(__DIR__.'/../db.php');
$services = mysqli_query($dbconn, 'SELECT * FROM services;');
while($service = mysqli_fetch_assoc($services)) {
    $csv_data .= "\n";

    /* get active days for open services */
    $service['active_days'] = date_diff(date_create($service['service_date']),
	date_create(date("Y-m-d")))->format("%a");

    foreach($fields as $field) {
	$key = $field['key'];
	$csv_data .= "\"${service[$key]}\",";
    }
}

/* download tha shit */
header('Content-Description: File Transfer');
header("Content-Type: application/csv") ;
header("Content-Disposition: attachment; filename=curacao_servicios.csv");
header("Expires: 0");
echo $csv_data;

?>
