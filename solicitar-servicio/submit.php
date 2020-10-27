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

    /* error_reporting(-1); */
    /* ini_set('display_errors', 'On'); */
    /* set_error_handler("var_dump"); */

    if($res){
	$_SESSION['msg'] = 'Servicio registrado con Ã©xito';
	$_SESSION['msg_type'] = 'success';

/* 	include(__DIR__.'/../vendor/phpmailer/phpmailer/src/Exception.php'); */
/* 	include(__DIR__.'/../vendor/phpmailer/phpmailer/src/PHPMailer.php'); */
/* 	include(__DIR__.'/../vendor/phpmailer/phpmailer/src/SMTP.php'); */

/* 	try { */
/* 	    $email_from = 'javidev.8@gmail.com'; */
/* 	    $pass = 'rumpeldeveloper'; */

/* 	    $mail = new PHPMailer\PHPMailer\PHPMailer(); */
/* 	    $mail->IsSMTP(); */
/* 	    $mail->SMTPDebug = 2; */
/* 	    $mail->Host       = 'smtp.gmail.com'; */
/* 	    $mail->Port       = 587; */
/* 	    //Definmos la seguridad como TLS */
/* 	    $mail->SMTPSecure = 'tls'; */
/* 	    $mail->SMTPAuth   = true; */
/* 	    $mail->Username   = $email_from; */
/* 	    $mail->Password   = $pass; */
/* 	    $mail->SetFrom($email_from, 'Mi nombre'); */
/* 	    $mail->AddAddress('javimayorque@gmail.com', 'El Destinatario'); */
/* 	    //Definimos el tema del email */
/* 	    $mail->Subject = 'Esto es un correo de prueba'; */
/* 	    //Para enviar un correo formateado en HTML lo cargamos con la siguiente funci—n. Si no, puedes meterle directamente una cadena de texto. */
/* 	    $mail->AltBody = 'This is a plain-text message body'; */
/* 	    echo "just before send"; */
/* 	    $mail->send(); */

/* 	} catch(Exception $e){ */
/* 	    echo $e.getMessage(); */
/* 	} */

    } else {
	$_SESSION['msg'] = 'El servicio no se pudo registrar';
	$_SESSION['msg_type'] = 'danger';
    }

    header("Location: ../buscar");
}

/* to avoid header redirect fails */
ob_end_flush();
?>
