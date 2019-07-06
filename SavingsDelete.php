<?php

session_start();
if (isset($_SESSION['specialid']) == 999) {
    header("Location: AdminPage.php");
} else if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}

require 'dbconnection.php';

$id = $_GET['id'];

$db->query("DELETE from savings where savings_id = '$id' ");
echo "<script>alert('Deletion Success'); location.href='SavingGoals.php'</script>";
