<?php
/**
 * Created by PhpStorm.
 * User: Laura 5
 * Date: 6/1/2016
 * Time: 8:35 PM
 */

date_default_timezone_set('Etc/UTC');
require '../phpmailer/PHPMailerAutoload.php';

function mailer($to,$subject,$body)
{
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "cotsenopen@gmail.com";
    $mail->Password = "ericcotsen";
    $mail->setFrom('cotsenopen@gmail.com', 'Cotsen Open');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->msgHTML($body);

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Thanks for your feedback!";
    }
}