<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


if(isset($_POST['emailTo']) && isset($_POST['msg'])) {
    $mailto = $_POST['emailTo'];
    $mailSub = 'Confirm the registration process';
    $mailMsg = $_POST['msg'];
    require '../../PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "smtp.gmail.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "ieee.comouter.society.annu@gmail.com";
    $mail ->Password = "123456789*/-";
    $mail ->SetFrom("IEEE ANNU Computer Soceity");
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

?>