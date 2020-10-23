<?php
$dbconn = mysqli_connect('localhost', 'root', '', 'curacao_db_test');
if (!$dbconn) {
    echo "database connection error";
}
