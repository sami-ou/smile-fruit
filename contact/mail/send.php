<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './Phpmailer/Exception.php';
require './Phpmailer/PHPMailer.php';
require './Phpmailer/SMTP.php';

$name=$_POST['name'];
$email=$_POST['e-direction'];
$phone=$_POST['phone'];
$message=$_POST['message'];

$dest="rochawordlsarl@gmail.com";
$subject="contacto desde rochaworld.com";

$carta="De: $name \n";
$carta .="Correo: $email \n";
$carta .="Numero de telefono: $phone \n";
$carta .="Mensaje: $message \n";


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rochawordlsarl@gmail.com';                     //SMTP username
    $mail->Password   = 'nilofer999';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS 465`

    //Recipients
    $mail->setFrom('rochawordlsarl@gmail.com', 'sami');
    $mail->addAddress('rochawordlsarl@gmail.com');     //Add a recipient
    
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $carta;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('Location:../sent-message.html');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
