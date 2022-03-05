<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once (ROOT_PATH . '/app/config/public-constants.php');
require (ROOT_PATH . '/PHPMailer/src/Exception.php');
require (ROOT_PATH . '/PHPMailer/src/PHPMailer.php');
require (ROOT_PATH . '/PHPMailer/src/SMTP.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = fromEmail;
$mail->Password   = mailPassword;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

$mail->setFrom(fromEmail, 'Ttoomas ToDo App');

// Send reset password Email
function sendPasswordResetLink($userEmail, $userToken)
{
    global $mail;

    $pagePath = BASE_URL;

    $emailBody = '
        <h3>
            Hello, thanks for using ToDo App,

            Please click on the link bellow to reset your password.
        </h3>
        <a href="' . $pagePath .'/verify-token.php?password-token=' . $userToken .'">
            Reset your password here!
        </a>';
    $altBody = '
        Hello, thanks for using ToDo App,

        Please click on the link bellow to reset your password.
        
        ' . $pagePath .'/verify-token.php?password-token=' . $userToken .'';


    $mail->addAddress($userEmail);

    $mail->isHTML(true);
    $mail->Subject = 'Reset your ToDo App Password';
    $mail->Body    = $emailBody;
    $mail->AltBody = $altBody;

    $mail->send();
}