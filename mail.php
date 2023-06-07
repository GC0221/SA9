<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/SMTP.php";

$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;  //SSL
$mail->CharSet="UTF-8";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Username = "gabriel.cy221@gmail.com";
$mail->Password = "qdpfslwcvrgdckjs";
$mail->From="gabriel.cy221@gmail.com";
$mail->FromName="網站管理者";
$mail->Subject="註冊成功通知";
$mail->Body="恭喜你註冊成功，<br/>歡迎享受本網站的訂餐服務!";
$mail->IsHTML(true);
$mail->AddAddress("cutienanase@gmail.com","Nanase");

if (!$mail->send()) 
{

    echo "Mailer Error: " . $mail->ErrorInfo;

}else 
{
    echo "Message sent!";
}

?>