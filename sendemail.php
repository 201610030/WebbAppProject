<?php

session_start();
if (isset($_SESSION['specialid']) == 999) {
    header("Location: AdminPage.php");
}
else if (isset($_SESSION['login']) == TRUE) {
    header("Location: Dashboard.php");
}
include "phpmailer/PHPMailerAutoload.php";
$gmailUsername = "final.webapp.project@gmail.com"; //Gmail username to be use as sender(make sure that the gmail settings was ON or enable)
$gmailPassword = "gustonaminpumasa"; //Gmail Password used for the gmail 
//////////////////////////////////////
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl'; // 
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = $gmailUsername;
$mail->Password = $gmailPassword;
/////////////////////////////////////
?>
