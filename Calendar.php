<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['specialid']) == 999) {
    header("Location: AdminPage.php");
} else if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}
require "header.php";
$title = "Calendar";

$_SESSION['month'] = $_GET['month'];
$_SESSION['action'] = $_GET['action'];

echo $_SESSION['month'];
echo $_SESSION['action'];
echo "<script> location.href='Transactions.php'</script>";

require "footer.php";
?>
