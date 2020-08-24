<?php
require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// Form Data
$fullname = $_REQUEST['fullname'] ;
$email = $_REQUEST['email'] ;

$message = $_REQUEST['message'] ;

$mailbody = 'myPhoto email:' . PHP_EOL . PHP_EOL .
            'Name: ' . $fullname . '' . PHP_EOL .
            'Message: ' . $message . '' . PHP_EOL;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'bencsik.adam13@gmail.com'; // SMTP username
$mail->Password = 'realrap13'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

$mail->setFrom('admin@domain.com', 'WebMaster'); // Admin ID
$mail->addAddress('bencsik.adam13@gmail.com', 'Admin'); // Business Owner ID
$mail->addReplyTo($email, $fullname); // Form Submitter's ID

$mail->isHTML(false); // Set email format to HTML

$mail->Subject = 'myPhotomail';
$mail->Body    = $mailbody;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}