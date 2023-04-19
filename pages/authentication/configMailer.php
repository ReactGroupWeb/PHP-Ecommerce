<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

$RandomOTP = rand(1000, 9999);
$_SESSION['RandomOTP'] = $RandomOTP;
$mail = new PHPMailer(true);

$mail->isSMTP(); //Send using SMTP
$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
$mail->SMTPAuth = true; //Enable SMTP authentication
$mail->Username = 'phanchhayfong168@gmail.com'; //SMTP username
$mail->Password = ''; //SMTP password 
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

//Recipients
$mail->setFrom('phanchhayfong168@gmail.com');
$mail->addAddress($_POST['us_email']); //Add a recipient
//Content
$mail->isHTML(true); //Set email format to HTML
$mail->Subject = "Verify your Email Account!!!";
$mail->Body = "Your OTP code : " . $RandomOTP;

$mail->send();
?>