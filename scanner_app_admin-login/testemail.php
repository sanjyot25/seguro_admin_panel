

<?php

    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
   


$mail = new PHPMailer(true);

try {
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com;';
$mail->SMTPAuth = true;
$mail->Username = 'sanjyotvelip25@gmail.com';
$mail->Password = 'qeefwzuhfxkrmumf';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('gyronotechgoa@gmail.com', 'Name');
$mail->addAddress('sanjyotvelip25@gmail.com');
// $mail->addAddress('receiver2@gfg.com', 'Name');
$mail->isHTML(true);
$mail->Subject = 'Subject';
$mail->Body = 'HTML message body in <b>bold</b> ';
$mail->AltBody = 'Body in plain text for non-HTML mail clients';
$mail->send();
echo "Mail has been sent successfully!";
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?> 
