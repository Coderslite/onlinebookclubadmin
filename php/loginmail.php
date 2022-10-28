<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'cortextechnology20@gmail.com'; // your mail address
$mail->Password = 'CortexTech'; // your mail password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Sender info 
$mail->setFrom('cortextechnology20@gmail.com', 'Cortex_Technology'); 

// Add a recipient 
$mail->addAddress('abrahamgreatebele@gmail.com'); 

// Set email format to HTML 
$mail->isHTML(true); 

// Mail subject 
$mail->Subject = 'Login Detection';

// Mail body content 
$bodyContent = 
                    '<html>
                    <head>
                    </head>
                    <body>
                    <h2>Login Successful</h2>
                    <h5>Some amount of USD has been made to your account</h5>
                    <h4>We have detected some login activity to your dashboard..</h4>
                    <p>If not you, login to change you password</p>
                    <a href="http://aftbroker.unaux.com/login.html">click here</a> 
                   <body>
                    </html>';
// $bodyContent .= $template; 
$mail->Body = $bodyContent;

// Send email 
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    // $data = 'notSent';
} else {
    echo'success';
}


?>