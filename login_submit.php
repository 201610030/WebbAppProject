<?php

session_start();
if (isset($_SESSION['specialid']) == 999) {
    header("Location: AdminPage.php");
} else if (empty($_POST['uname'])) {
    header("Location: login.php");
} else if (isset($_SESSION['login']) == TRUE) {
    header("Location: Dashboard.php");
}

require 'dbconnection.php';
$username = strip_tags($_POST['uname']);
$password = strip_tags($_POST['pword']);

$query = $db->query("SELECT * from accounts where uname = '$username' AND pword = '$password' ") or die($db->error);

if ($_POST['uname'] == "admin" && $_POST['pword'] == "admin") {
    $_SESSION['login'] = TRUE;
    $_SESSION['fname'] = "Administrator";
    $_SESSION['lname'] = "";
    $_SESSION['specialid'] = 999;
    header("Location: AdminPage.php");
} else if ($query->num_rows > 0) {

    $userinfo = $query->fetch_assoc();

    if ($userinfo['status'] == 1) {

        if ($userinfo['is_verify'] == 1) {
            $_SESSION['userid'] = $userinfo['id'];
            $_SESSION['fname'] = $userinfo['fname'];
            $_SESSION['lname'] = $userinfo['lname'];
            $_SESSION['login'] = TRUE;
            header("Location: Dashboard.php");
        } else {
            echo "<script>alert('You are not yet verified! Please check your email to confirm your account'); location.href='login.php'</script>";
        }
    } else {
        echo "<script>alert('You are blocked from the system!'); location.href='login.php'</script>";
    }
} else {
    echo "<script>alert('Invalid username/password!'); location.href='login.php'</script>";
}
