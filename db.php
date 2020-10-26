<?php
include(__DIR__.'/env.php');

$dbconn = mysqli_connect('localhost', DB_USER, DB_PASSWD, DB_NAME);
if (!$dbconn) {
    echo "database connection error";
}
