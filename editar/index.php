<?php

/* redirect if no logged */
include('../includes/session_check.php');
if(!user_logged()) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

/* database */
include(__DIR__.'/../db.php');

$row = mysqli_fetch_assoc(mysqli_query($dbconn, "SELECT * FROM services WHERE id=${_GET['id']}"));

var_dump($row);
echo "<br>";
echo "<br>";
var_dump(json_encode($row));
echo "<br>";
echo "<br>";
var_dump(file_get_contents(__DIR__.'/test.json'));


?>
