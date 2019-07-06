<?php

session_start();

if (isset($_SESSION['specialid']) == 999) {
    header("Location: AdminPage.php");
} else if (isset($_SESSION['login-confirm']) == FALSE) {
    header("Location: login.php");
} else if (isset($_SESSION['login']) == TRUE) {
    header("Location: Dashboard.php");
}

require 'dbconnection.php';

$verification = $_GET['vcode'];

$_SESSION['code-confirm'] = $verification;
if ($_SESSION['login-confirm'] == $_GET['vcode']) {
    $db->query("UPDATE accounts SET is_verify = 1 where vcode = '$verification'");
    echo "<script>alert('Verification Successful!'); location.href='login.php'</script>";
} else {
    header("Location: login.php");
}

