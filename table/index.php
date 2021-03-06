
<?php

/* get table fields */
$fields = json_decode(file_get_contents(__DIR__.'/fields.json'), true);

include(__DIR__.'/modal.php'); 

?>

<link rel="stylesheet" href="<?= BASE_URL?>/table/table.css">

<a href="<?php echo BASE_URL.'exportar/whole_export.php' ?>">
    <button class="btn btn-secondary">Exportar todo</button>
</a>

<!-- this is the colse-tag of the .container one on the header -->
</div>
<div id="table-scrollable">
    <table class='table table-striped'> 
	<thead id="table-head">
	    <tr>

		<?php foreach($fields as $field): ?>
		<th class="<?php
		    /* if large field expand td */
		    if($field['key'] == 'notes' || $field['key'] == 'problem_description') 
			echo 'td_large'; 
		    else echo 'td_short'
		?>" >
		<?= $field['name']?></th>
		<? endforeach; ?>
	    </tr>
	</thead>
	<tbody>
	    <?php
	    if(isset($result)):
		while($row =mysqli_fetch_assoc($result) ): 
	    ?>
	    <tr 
	   data-toggle="modal" data-target="#exampleModal" class="table_row"
	   <?php
	    $row_id = $row['id'];
	    echo "data-row_id='$row_id'";
	   ?>
		>
		<?php
		foreach($fields as $field): 

		    /* format dates */
		    if(
			$field['key'] == 'service_date' || 
			$field['key'] == 'delivery_date' ||
			$field['key'] == 'last_update_date'
		    )
			$row[$field['key']] = explode(' ',$row[$field['key']])[0];

		?>

		<td>

		<!-- FOR ACTIVE FIELD -->
		<?php if($field['key'] == 'active'): ?>
		<span class="dot" style="background-color: <?php 
		    if($row[$field['key']] == 1){ echo 'green'; }
			else { echo 'red'; }
			?>;"></span>

		<!-- FOR ACTIVE DAYS FIELD -->
		<?php elseif($field['key'] == 'active_days' && $row['active'] == 1): 
		    /* if active, print diference of service date and now */
		    echo date_diff(date_create($row['service_date']),
		    date_create(date("Y-m-d")))->format("%a");

		/* FOR MULTILINE FIELDS */
		elseif($field['key'] == 'notes' || $field['key'] == 'problem_description'):
		?>
		<div style="height: 80px; overflow: scroll;"><?php echo $row[$field['key']] ?></div>
		<?php
		    

		/* FOR ANY OTHER FIELD */
		else: 
		     echo $row[$field['key']]?>
		</td>

		<?php endif; endforeach; ?>
	    </tr>
	    <?php endwhile; endif; ?>
	</tbody>


    </table>
</div>

<!-- this is the open tag of the .container one in the footer -->
<div>

 <script src="<?php echo BASE_URL.'table/fixTableHead.js' ?>"></script>
