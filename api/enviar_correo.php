<?php
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviar_mensaje($correo_receptor='')
{
	//Create instance of PHPMailer
		$mail = new PHPMailer();
	//Set mailer to use smtp
		$mail->isSMTP();
	//Define smtp host
		$mail->Host = "smtp.gmail.com";
	//Enable smtp authentication
		$mail->SMTPAuth = true;
	//Set smtp encryption type (ssl/tls)
		$mail->SMTPSecure = "tls";
	//Port to connect smtp
		$mail->Port = "587";
	//Set gmail username
		$mail->Username = "TU_CORREO@gmail.com";
	//Set gmail password
		$mail->Password = "TU_CONTRASENA";
	//Email subject
		$mail->Subject = "MI EMPRESA - LIBRO DE RECLAMACION";
	//Set sender email
		$mail->setFrom('TU_CORREO@gmail.com', 'TU_USUARIO');
	//Enable HTML
		$mail->isHTML(true);
	//Attachment
		// $mail->addAttachment('img/attachment.png');
	//Email body
		$mail->Body = "<h1>DOCUMENTO RECIBIDO CON EXITO</h1></br>
						<p>Gracias.</p>
						";
	//Add recipient
		$mail->addAddress($correo_receptor);
	//Finally send email
		if ( $mail->send() ) {
			// echo "Email Sent..!";
			return true;
		}else{
			// echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
			// echo "Message could not be sent. Mailer Error";
			return false;
		}
	//Closing smtp connection
		$mail->smtpClose();
}