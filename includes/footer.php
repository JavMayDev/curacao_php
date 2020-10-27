
<!-- JQUERY -->
<!-- <script src="static/jquery.js"></script> -->
<!-- BOOTSTRAP SCRIPTS -->
<!-- <script src="static/bootstrap/js/bootstrap.bundle.min.js"></script> -->


<?php
if(isset($_SESSION['msg'])):
?>
<style>
.notification{
    position: absolute;
    top: 2em;
    right: 2em;
}
</style>
    <div class="notification alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['msg']?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
endif;
unset($_SESSION['msg']);
unset($_SESSION['msg_type']);
?>

<!-- just cdn's why not (at least for development) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</div>
</body>
</html>
