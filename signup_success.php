<?php

session_start();

require 'dbconnection.php';
require 'sendemail.php';

$fname = strip_tags($_POST['fname']);
$lname = strip_tags($_POST['lname']);
$uname = strip_tags($_POST['uname']);
$email = strip_tags($_POST['email']);
$pword = strip_tags($_POST['pword']);
$cpword = strip_tags($_POST['cpword']);
$vcode = uniqid(rand());

if (isset($_SESSION['specialid']) == 999) {
    header("Location: AdminPage.php");
} else if (isset($_SESSION['login']) == TRUE) {
    header("Location: Dashboard.php");
} else if (!empty($email)) {
    $usernameQuery = $db->query("SELECT * from accounts where uname = '$uname' ");

    if ($usernameQuery->num_rows > 0) {
        echo "<script>alert('Username is already Taken!'); location.href='signup.php'</script>";
    } else if ($pword != $cpword) {
        echo "<script>alert('Password Does Not Match'); location.href='signup.php'</script>";
    } else {
        $mail->Subject = "Registration";
        $mail->Body = "<h2>Hello $fname, <br><br>Please verify and log in your account by clicking the link below: </h2>"
                . "<a href='localhost/WebbAppProject/verifyuser.php?vcode=$vcode'>CLICK HERE</a>"; //Content of Message : to set the content of email message

        $mail->AddAddress($email);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $db->query("INSERT into accounts (fname,lname,uname,email,pword,vcode) VALUES ('$fname','$lname','$uname','$email','$pword','$vcode')");
            echo "<script>alert('Registration Successful! Please Check your Email!'); location.href='login.php'</script>";
        }
    }
} else {
    header("Location: login.php");
}
?>
