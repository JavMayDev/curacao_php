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

/* get table fields */
$fields = json_decode(file_get_contents('./fields.json'), true);

$result = mysqli_query($dbconn, "SELECT * FROM services");


?>

<table class='table table-bordered'> 
    <thead>
	<tr>
	    <?php foreach($fields as $field): ?>
	    <td><?= $field['name']?></td>
	    <? endforeach; ?>
	</tr>
    </thead>
    <tbody>
	<?php while($row = mysqli_fetch_array($result)): ?>
	<tr onclick="window.location='<?= BASE_URL."editar?id=".$row["id"]?>'">
	    <?php foreach($fields as $field): ?>
	    <td><?= $row[$field['key']]?></td>
	    <?php endforeach; ?>
	</tr>
	<?php endwhile; ?>
    </tbody>


</table>
