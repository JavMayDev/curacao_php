<?php
/* GET USERS */
$query = "SELECT id, name, access_level, email, country FROM users;";
$users_result = mysqli_query($dbconn, $query);
?>

<div class="col-md-6">
<p>
Haga click en un usuario para modificarlo o eliminarlo
</p>
<ul class="list-group">
	<?php
	    $roles = array(0, 'asesor', 'supervisor', 'administrador');
	    while($row = mysqli_fetch_assoc($users_result)): 
	?>
	<li 
	    class="list-group-item d-flex justify-content-between" 
	    data-toggle="modal" data-target="#userOptionsModal"
	    <? foreach(array_keys($row) as $row_key){
		echo 'data-'.$row_key.'="'.$row[$row_key].'" ';
	    } ?>
	>
	    <span ><?= $row['name']?></span>
	    <span ><?= $row['email']?></span>
	    <span ><?= $roles[$row['access_level']]?></span>
	</li>
	<? endwhile; ?>
    </ul>
</div>
