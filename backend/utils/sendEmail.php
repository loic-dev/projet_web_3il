<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Create an instance; passing `true` enables exceptions


function sendEmail($email,$name, $link) {
    // $mail = new PHPMailer(true);                    
    // $mail->isSMTP();                                          
    // $mail->Host       = 'in-v3.mailjet.com';                     
    // $mail->SMTPAuth   = true;
    // $mail->SMTPSecure = true;
    // $mail->Port       = 587;
    // $mail->Username   = 'f16cb10dfe12798f7bb1d31641507a32';                                                         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    // $mail->Password   = 'd82dd14cb24d7096c93a723da30a1ab0';                    
    $mail = new PHPMailer(true);                    
    // $mail->SMTPDebug = true;
    $mail->isSMTP();          
                                
    $mail->Host       = 'smtp.sendgrid.net';                     
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = true;
    $mail->Port       = 587;
    $mail->Username   = 'apikey';                    
    $mail->Password   = '13trm.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';                                                         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    $mail->setFrom('pliage_borde.0q@icloud.com', 'Test');
    $mail->addAddress($email, $name);
    
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vérification email';
    $mail->Body    = "Cliquer sur lien suivant pour vérifier votre email: <a href='$link' target='_blank'>Vérification</a>";
    // $mail->Body    = "Cliquer sur lien suivant pour vérifier votre email: '$link' target='_blank'>Vérification</a";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
}