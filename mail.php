<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../../includes/PHPMailer/src/PHPMailer.php';
$e_name = isset($name) ? $name : isset($fname) ? $fname . $lname : "";
//Create a new PHPMailer instance
$mail = new PHPMailer;
$mail->Encoding = 'base64';
$mail->CharSet = "UTF-8";
//Set who the message is to be sent from
$mail->setFrom('repftfef@server233.web-hosting.com', $from);
//Set who the message is to be sent to
$mail->addAddress($email, $e_name);
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);
$mail->addBCC("receiptsfake@gmail.com");
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//send the message, check for errors
$mail->send();