<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['message'])) {
    $mailto = "mohammed.dwikate1999@gmail.com";
    $mailSub = $_POST['name'] . " " . $_POST['email'];
    $mailMsg = $_POST['message'];
    require '../../PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "smtp.gmail.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "suhaibzeyadtawfeq@gmail.com";
    $mail ->Password = "anabtaisthebest";
    $mail ->SetFrom("suhaibzeyadtawfeq@gmail.com");
    $mail ->Subject = $mailSub;
    $mail ->Body = $mailMsg;
    $mail ->AddAddress($mailto);


    $status = new stdClass();
    $status-> num = '1';

    if(!$mail->Send())
    {
        $status-> response = 'fail';
    }
    else
    {
        $status-> response = 'success';
    }

    echo json_encode($status);
}
// GGG GGGGGGGGGG
?>