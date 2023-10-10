<?php
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


//Declare the object of PHPMailer

$email = new PHPMailer\PHPMailer\PHPMailer();

//Set up necessary configuration to send email

$email->IsSMTP();

$email->SMTPAuth = true;

$email->SMTPSecure = 'ssl';

$email->Host = "smtp.gmail.com";

$email->Port = 465;

//Set the gmail address that will be used for sending email

$email->Username = "gyronotechgoa@gmail.com";

//Set the valid password for the gmail address

$email->Password = "gyronotechgoa@123321";

//Set the sender email address

$email->SetFrom("gyronotechgoa@gmail.com");

//Set the receiver email address

$email->AddAddress("datteshnagekar7667@gmail.com");

//Set the subject

$email->Subject = "Testing Email";

//Set email content

$email->Body = "Hello! use PHPMailer to send email using PHP";


if(!$email->Send()) {

  echo "Error: " . $email->ErrorInfo;

} else {

  echo "Email has been sent.";

}

?>

