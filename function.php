<?php
include_once("./PHPMailer/PHPMailerAutoload.php");

function mailer($fname, $fmail, $to, $subject, $content)
{
    $mail = new PHPMailer();

    $mail->isSMTP();

    $mail->SMTPSecure = "ssl";
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.naver.com";
    $mail->Port = 465;
    $mail->Username = "rlgus03453@naver.com";
    $mail->Password = "Rose03453!";

    $mail->CharSet = "UTF-8";
    $mail->From = $fmail;
    $mail->FromName = $fname;
    $mail->Subject = $subject;
    $mail->msgHTML($content);
    $mail->addAddress($to);

    return $mail->send();
}
