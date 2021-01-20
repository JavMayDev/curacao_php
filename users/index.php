<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(3)) {
    header('Location: ../index.php');
    exit();
}

/* header */
include(__DIR__.'/../includes/header.php');

/* database */
include(__DIR__.'/../db.php');

/* insert user */
include(__DIR__.'/insert.php');

/* delete user */
include(__DIR__.'/delete.php');

?>

<div class="row">


<div class="card col-md-6">
<div class="card-body">
<?php include(__DIR__.'/insert_form.php'); ?>
</div>
</div>

<?php 

include(__DIR__.'/list.php'); 
include(__DIR__.'/modal.php');
include(__DIR__.'/update_user.php');

?>

</div>

<!-- Prevent form submit on reload -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?  include(__DIR__.'/../includes/footer.php'); ?>
