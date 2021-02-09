<?php
/* database */
include(__DIR__.'/../db.php');
$query = "SELECT * FROM services WHERE active = ".$active;

/* filter form */
include(__DIR__.'/filter.php');
if(isset($_POST['filter_submit']) ) {

    /* supervisors and admins */
    if($_SESSION['access_level'] >= 2) {
	if($_POST['service_type'] !== '')
	    $query .= " AND service_type = '".$_POST['service_type']."'";
	if($_POST['last_days'] !== '')
	    $query .= " AND service_date >= '"
	    .date('Y-m-d', strtotime('-'.$_POST['last_days'].' days', time()))
	    ."'";
    }

    /* only admins */
    if($_SESSION['access_level'] >= 3) {
	if($_POST['country'] !== '')
	    $query .= " AND country = '".$_POST['country']."'";

    }
}
/* only supervisors */
if ($_SESSION['access_level'] == 2)
    $query .= " AND country = '${_SESSION['country']}'";

$query .= " ORDER BY order_num DESC;";

$result = mysqli_query($dbconn, $query);
if(!$result) echo "No hay servicios para mostrar";
else 
    include(__DIR__.'/../table/index.php');


?>
