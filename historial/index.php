<?php

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

/* filter form */
include(__DIR__.'/filter_form.php');

/* database */
include(__DIR__.'/../db.php');
 
/* get table fields */
$fields = json_decode(file_get_contents('./fields.json'), true);

if(isset($_POST['filter_submit'])) {
    if(isset($_POST['filter_field'])){
	if($_POST['filter_field'] == 'ver_todo'){
	    $query = "SELECT * FROM services;";
	} else {
	    if($_POST['filter_field'] == 'active'){
		$checked = isset($_POST['filter_value']);
		$_POST['filter_value'] = $checked ? 1 : 0;
	    }
	    $query =  "SELECT * FROM services WHERE ${_POST['filter_field']}=${_POST['filter_value']}";
	}
	$result = mysqli_query($dbconn,$query);

	if(!$result) exit("No se encontraron resultados");

	?>
	    

<link rel="stylesheet" href="table.css">

<!-- this is the colse-tag of the .container one on the header -->
</div>

<div class="scrollable">
    <table class='table table-striped'> 
	<thead>
	    <tr>

		<td>Días activo</td>
		<?php foreach($fields as $field): ?>
		<td><?= $field['name']?></td>
		<? endforeach; ?>
	    </tr>
	</thead>
	<tbody>
	    <?php
	    if(isset($result)):
	    while($row = mysqli_fetch_array($result)): ?>
	    <tr 
	   data-toggle="modal" data-target="#exampleModal" class="table_row"
	   <?php
	    $row_id = $row['id'];
	    echo "data-row_id='$row_id'";
	   ?>
		>

		<!-- Active days -->
		<td>
		    <?php 
			if($row['active'] == 0) echo "cerrado";
			else 
			    echo date_diff(date_create($row['service_date']), date_create(date("Y-m-d")))->format("%a");
		    ?>
		</td>

		<?php
		foreach($fields as $field):
		if($field['key'] == 'active'):
		?>
		<td><span class="dot" style="background-color:
			<?php 
			if($row[$field['key']] == 1){ echo 'green'; }
			else { echo 'red'; }
			?>;"></span></td>
		<?php else: ?>
		<td><?= $row[$field['key']]?></td>
		<?php endif; endforeach; ?>
	    </tr>
	    <?php endwhile; endif; ?>
	</tbody>


    </table>

</div>

<?php include(__DIR__.'/modal.php') ?>
<div>
	<?php

    } else {
	echo "Sin filtro";
    }

}


?>
    <?php include(__DIR__.'/../includes/footer.php'); ?>
<script>

$('#exampleModal').on('show.bs.modal', function (event) {
    var triggerer = $(event.relatedTarget) // Button that triggered the modal
    var rowId = triggerer.data('row_id') // Extract info from data-* attributes

    var modal = $(this)
    modal.find('#edit_button').attr('href',"http://localhost/curacao_php/editar/index.php?id="+rowId);
    modal.find('#export_button').attr('href', "http://localhost/curacao_php/exportar/index.php?id="+rowId);
    // modal.
})

</script>


