<?php


//Load Composer's autoloader
require_once 'vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Create an instance; passing `true` enables exceptions


function sendEmail($email,$name, $link){
    $mail = new PHPMailer(true);                    
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp.mailtrap.io';                     
    $mail->SMTPAuth   = true;
    $mail->Port       = 2525;                                  
    $mail->Username   = '6932bf1dcdd265';                    
    $mail->Password   = '989edc55f5d1d8';                                                         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($email, $name);

    
    
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vérification email';
    $mail->Body    = "Cliquer sur lien suivant pour vérifier votre email: <a href='$link' target='_blank'>Vérification</a";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
}