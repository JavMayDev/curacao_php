<?php
/* to avoid header redirect fails */
ob_start();

/* redirect if no permission */
include('../includes/session_check.php');
if(!user_logged(1)) {
    header('Location: ../index.php');
    exit();
}

include('../db.php');

if(isset($_POST['submit'])){

    unset($_POST['submit']);
    if($_POST['service_date'] == '') unset($_POST['service_date']);


    $post_keys = array_keys($_POST);

    /* clean empty fields */
    foreach($post_keys as $field){
	if($_POST[$field] == '') 
	    unset ($_POST[$field]);
    }

    $query = "INSERT INTO services (";

    $i = 0;
    $post_keys = array_keys($_POST);
    foreach($post_keys as $field){
	$query .= "$field";

	/* put ',' in each field except the last one */
	if($i < count($post_keys) - 1)
	    $query.=', ';
	$i++;
    }

    $query .= ") VALUES(";

    $i = 0;
    foreach($_POST as $value){
	$query .= "'$value'";
	if($i < count($_POST) -1)
	    $query .= ', ';
	$i++;
    }

    $query .= ");";


    /* perform the query */
    $res = mysqli_query($dbconn,$query);

    if($res){
	$_SESSION['msg'] = 'Servicio registrado con éxito';
	$_SESSION['msg_type'] = 'success';

	include(__DIR__.'/../vendor/phpmailer/phpmailer/src/Exception.php');
	include(__DIR__.'/../vendor/phpmailer/phpmailer/src/PHPMailer.php');
	include(__DIR__.'/../vendor/phpmailer/phpmailer/src/SMTP.php');

	$mail = new PHPMailer\PHPMailer\PHPMailer(true);
	try {

	    //Server settings
	    $mail->SMTPDebug = 0;
	    $mail->isSMTP();                                    
	    $mail->Host       = SMPT_HOST;
	    $mail->SMTPAuth   = true;                          
	    $mail->Username   = EMAIL;
	    $mail->Password   = EMAIL_PASS;
	    /* $mail->SMTPSecure = 'tls'; */
	    $mail->Port       = 587;

	    /* add emails */
	    $res = mysqli_query($dbconn, "SELECT email FROM emails");
	    foreach(mysqli_fetch_array($res) as $email)
		$mail->addAddress($email);

	    $mail->setFrom('new_service@curacaoexportservices.com', 'Mailer');

	    // Content
	    $mail->isHTML(true);
	    $mail->Subject = 'Nuevo sevicio';
	    $mail->Body = '<p>Se ha dado de alta un servicio</p>';

	    $mail->send();
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	    $_SESSION['msg'] = 'El servicio se registró correctamente pero no se pudo enviar el correo';
	    $_SESSION['msg_type'] = 'warning';
	}


    } else {
	$_SESSION['msg'] = 'El servicio no se pudo registrar';
	$_SESSION['msg_type'] = 'danger';
    }

    header("Location: ../buscar");
}

/* to avoid header redirect fails */
ob_end_flush();
?>
