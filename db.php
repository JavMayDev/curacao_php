<?php
$dbconn = mysqli_connect('localhost', 'root', '', 'curacao_db');
if (!$dbconn) {
    echo "database connection error";
}
