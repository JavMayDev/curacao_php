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

    $fields = array('client_sender_name, local_tel');

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
    /* var_dump($dbconn); */
    $res = mysqli_query($dbconn,$query);

    echo '<br>';
    var_dump($res);

}

?>
