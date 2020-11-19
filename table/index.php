
<?php

/* get table fields */
$fields = json_decode(file_get_contents(__DIR__.'/fields.json'), true);

include(__DIR__.'/modal.php'); 

?>

<link rel="stylesheet" href="<?= BASE_URL?>/table/table.css">

<!-- this is the colse-tag of the .container one on the header -->
</div>

<div class="scrollable">
    <table class='table table-striped'> 
	<thead>
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
		while($row = mysqli_fetch_array($result)): 
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
		<?php elseif($field['key'] == 'active_days' && !$row[$field['key']]): 
		    /* if empty from database, print today's date */
		    echo date_diff(date_create($row['service_date']),
		    date_create(date("Y-m-d")))->format("%a");

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
