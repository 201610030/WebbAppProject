<?php

session_start();

if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}

require 'dbconnection.php';

$acnt_id = strip_tags($_GET['acntid']);

$db->query("UPDATE accounts SET status = 0 where id = '$acnt_id'") or die($db->error);
echo "<script>alert('User is disababled!'); location.href='AdminPage.php'</script>";