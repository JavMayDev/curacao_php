<?php

include(__DIR__.'/../vendor/phpmailer/phpmailer/src/Exception.php');
include(__DIR__.'/../vendor/phpmailer/phpmailer/src/PHPMailer.php');
include(__DIR__.'/../vendor/phpmailer/phpmailer/src/SMTP.php');

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$attempts = 0;
do {

    try {

	//Server settings
	$mail->SMTPDebug = 2;
	$mail->isSMTP();                                    
	$mail->Host       = SMPT_HOST;
	$mail->SMTPAuth   = true;                          
	$mail->Username   = EMAIL;
	$mail->Password   = EMAIL_PASS;
	/* $mail->SMTPSecure = 'tls'; */
	$mail->Port       = 587;

	/* add default emails */
	$res = mysqli_query($dbconn, "SELECT email FROM emails");
	foreach(mysqli_fetch_all($res) as $email)
	    $mail->addAddress($email[0]);

	/* add email of country supervisor */
	if(isset($_POST['country'])) {
	    $res = mysqli_query($dbconn, "SELECT email FROM users WHERE access_level = 2 AND country = '${_POST['country']}';");
	    if($res)
		$mail->addAddress(mysqli_fetch_row($res)[0]);
	}

	$mail->setFrom('new_service@curacaoexportservices.com', 'curacaoexportservices.com');

	// Content
	$mail->isHTML(true);
	$mail->Subject = "Nuevo servicio: ${_POST['order_num']}";
	$mail->Body = '<p>Se ha dado de alta un servicio</p>';

	/* attach service data in pdf */
	include(__DIR__.'/../exportar/pdf_table/make_pdf.php');
	make_pdf($insert_id, true);
	$pdf_file = __DIR__.'/../exportar/pdf_table/servicio_'.$_POST['order_num'].'.pdf';
	$mail->addAttachment($pdf_file);

	$mail->send();

	unlink($pdf_file);

    } catch (Exception $e) {

	if($attempts == 3) {
	    $attempts++;
	    /* error log file */
	    $file = fopen("email_logs/${_POST['order_num']}_error_log.txt", "w");
	    fwrite($file, $e);
	    fclose($file);

	    $_SESSION['invasive_alert'] = 'El servicio se registró correctamente pero no se pudo enviar el correo <br>'.$e;
	    $_SESSION['alert_type'] = 'warning';

	    break;
	} else {
	    sleep(1);
	    continue;
	}
    }
    break;
} while (true);

?>
