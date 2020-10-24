<?php

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
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

</div>

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
	<tr
	    <?php
		if($_SESSION['access_level'] >= 2){
		    $url = BASE_URL."editar/index.php?id=${row['id']}";
		    $window = "window.location='$url'";
		    echo "onclick=".'"'.$window.'"';
		}
	    ?>
	>
	    <?php
	    foreach($fields as $field):
		if($field['key'] == 'active'):
	    ?>
	    <td><div style="background-color:
		<?php 
		    if($row[$field['key']] == 1){ echo 'green'; }
		    else { echo 'red'; }
		?>;">O</div></td>
	    <?php else: ?>
	    <td><?= $row[$field['key']]?></td>
	    <?php endif; endforeach; ?>
	</tr>
	<?php endwhile; ?>
    </tbody>


</table>

<div>

    <?php include(__DIR__.'/../includes/footer.php'); ?>
