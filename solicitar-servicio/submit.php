<?php

/* redirect if no logged */
include('../includes/session_check.php');
if(!user_logged()) {
    header('Location: ../index.php');
    exit();
}

include('../db.php');

if(isset($_POST['submit'])){
    echo "form submitted <br>";

    unset($_POST['submit']);
    if($_POST['service_date'] == '') unset($_POST['service_date']);

    var_dump($_POST);
    echo "<br>";

    $fields = array('service_type', 'client_sender_name', 'local_tel');

    $query = "INSERT INTO services (";

    for($i = 0; $i < count($fields); $i++){
	$query .= "$fields[$i]";

	/* put ',' in each field except the last one */
	if($i < count($fields) - 1)
	    $query.=',';
    }

    $query .= ") VALUES(";

    $i = 0;
    foreach($_POST as $value){
	$query .= "'$value'";
	if($i < count($_POST) -1)
	    $query .= ',';
	$i++;
    }

    $query .= ");";

    echo $query;
    $res = mysqli_query($dbconn,$query);

    echo '<br>';
    var_dump($res);

}

?>
