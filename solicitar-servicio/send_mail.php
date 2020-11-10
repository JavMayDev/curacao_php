<?php

include(__DIR__.'/../vendor/phpmailer/phpmailer/src/Exception.php');
include(__DIR__.'/../vendor/phpmailer/phpmailer/src/PHPMailer.php');
include(__DIR__.'/../vendor/phpmailer/phpmailer/src/SMTP.php');

$mail = new PHPMailer\PHPMailer\PHPMailer(true);
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

    /* add emails */
    $res = mysqli_query($dbconn, "SELECT email FROM emails");
    foreach(mysqli_fetch_all($res) as $email)
	$mail->addAddress($email[0]);

    $mail->setFrom('new_service@curacaoexportservices.com', 'Mailer');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Curacao - Nuevo sevicio';
    $mail->Body = '<p>Se ha dado de alta un servicio</p>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $_SESSION['invasive_alert'] = 'El servicio se registró correctamente pero no se pudo enviar el correo';
    $_SESSION['alert_type'] = 'warning';
}
?>
