<?php

include('../db.php');

function user_logged(){
    if(!$_SESSION['user_id'])
	return false;
    else return true;
}
?>
