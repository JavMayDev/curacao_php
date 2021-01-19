<?php
/* database */
include(__DIR__.'/../db.php');

$query = "SELECT * FROM services WHERE active = ".$active;

if($_SESSION['access_level'] >= 3) {
    /* filter form */
    include(__DIR__.'/filter.php');
    if(isset($_POST['filter_submit']) && $_POST['country'] !== '')
	$query .= " AND country = '".$_POST['country']."'";

} else if ($_SESSION['access_level'] == 2)
    $query .= " AND country = '${_SESSION['country']}'";

$query .= ";";

$result = mysqli_query($dbconn, $query);
if(!$result) echo "No hay servicios para mostrar";
else 
    include(__DIR__.'/../table/index.php');

?>
