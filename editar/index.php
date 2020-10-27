<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(2)) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

/* database */
include(__DIR__.'/../db.php');

if(!isset($_GET['id']))
    exit('no se ha especificado ningun servicio para editar');


$row = mysqli_fetch_assoc(mysqli_query($dbconn, "SELECT * FROM services WHERE id=${_GET['id']}"));

/* format carraige return (for multiline strings) to be supported by json parser in the browser */
$row['problem_description'] = (str_replace("\r\n", "\\r\\n", $row['problem_description']));
$row['notes'] = (str_replace("\r\n", "\\r\\n", $row['notes']));

$json_encoded_row = json_encode($row );

/* json pretty print for debug */
/* printf("<pre>%s</pre>", json_encode($row, JSON_PRETTY_PRINT)); */

?>


<script>
var row_data = JSON.parse('<?= $json_encoded_row?>');
</script>

<script src="./filter.js"> </script>

<h1 class="text-center text-primary">Editando servicio</h1>

<form action="./update.php?id=<?= $_GET['id']?>" method="POST" onsubmit="return filter()">

    <?php include(__DIR__.'/../form/tech_info/index.php') ?>
    <?php include(__DIR__.'/../form/service_info/index.php') ?>
    <?php include(__DIR__.'/../form/client_info/index.php') ?>
    <?php include(__DIR__.'/../form/product_info/index.php') ?>

    <!-- UPDATE & CANCEL -->
    <div>
	<div class="form-row">
	    <div class="form-group col-md-4">
		<input name="cancel" class="form-control btn btn-secondary" type="submit" value="Cancelar">
	    </div>
	    <div class="form-group col-md-4">
		<input class="form-control btn btn-success" name="submit" type="submit" value="Actualizar">
	    </div>
	</div>
    </div>
</form>

<script src="./fill.js"></script>

<?php include(__DIR__.'/../includes/footer.php');
ob_end_flush();
?>
