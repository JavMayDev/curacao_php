<?php
include_once('db.php');
include('session.php');
include('includes/header.php'); 

if(isset($_SESSION['logged']) && $_SESSION['logged']):
    header('Location: buscar');
else:

?>

 <div class="container">
     <div class="row">
	 <div class="col-md-6 mx-auto">

	    <div class="card p-4">
		<?php 
		    if(isset($_SESSION['message'])):
		?>
	    <div class="alert alert-danger alert-dismissible fade show" role="alert">
		    <?php 

			echo $_SESSION['message'];
		    ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
	    </div>
	    <?php endif ?>
	    <form action="login.php" method="POST">
		<div class="form-group">
		    <label for="">Email</label>
		    <input class="form-control" type="email" name="email" placeholder="email">
		</div>
		<div class="form-group">
		    <label for="">Contraseña</label>
		    <input class="form-control" type="password" name="password" placeholder="password">
		</div>
		<div class="form-group">
		    <input class="form-control btn btn-primary" type="submit" value="Login">
		</div>
	    </form>
	    </div>

	 </div>
     </div>
 </div>

 <?php
endif;

include('includes/footer.php'); 
?>
