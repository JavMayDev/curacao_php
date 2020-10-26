<?php
/* to avoid header redirect fails */
ob_start();

include('../session.php');

function user_logged($min_access_level) {
    if (!$_SESSION['user_id']) {
	return false;
    } else {
	if($_SESSION['access_level'] >= $min_access_level)
	    return true;
	else return false;
    }
}
ob_end_flush();
