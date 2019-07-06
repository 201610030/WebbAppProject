<?php

session_start();
if (isset($_SESSION['specialid']) == 999) {
    header("Location: AdminPage.php");
} else if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}

require 'dbconnection.php';

$trans_id = $_GET['trans_id'];

$dateArr = explode("-", $_POST['date']);

$year = $dateArr[0];
$month = $dateArr[1];
$day = $dateArr[2];
$amount = strip_tags($_POST['amount']);
$contents = strip_tags($_POST['contents']);
$account = strip_tags($_POST['account']);
$category = strip_tags($_POST['category']);

print_r($_FILES);

if (isset($_POST['remove'])) {
    $q = $db->query("SELECT image from transactions where transaction_id = '$trans_id' ");
    $item = $q->fetch_assoc();
    $item_image = $item['image'];
    if ($item_image != NULL) {
        unlink("img/" . $item_image);
    }

    $db->query("UPDATE transactions SET month = '$month', day = '$day',year = '$year',account = '$account',contents = '$contents',amount = '$amount',category = '$category',image = NULL  where transaction_id = '$trans_id'") or die($db->error);

    echo "<script>alert('Transaction Edit Success'); location.href='Transactions.php'</script>";
} else if ($_FILES['image']['name'] != '') {
    $q = $db->query("SELECT image from transactions where transaction_id = '$trans_id' ");
    $item = $q->fetch_assoc();
    $item_image = $item['image'];
    if ($item_image != NULL) {
        unlink("img/" . $item_image);
    }

    $temp_name = strip_tags($_FILES['image']['tmp_name']);
    $file_name = strip_tags(time() . "_" . $_FILES['image']['name']);
    $directory = "img/";

    move_uploaded_file($temp_name, $directory . $file_name);


    $db->query("UPDATE transactions SET month = '$month', day = '$day',year = '$year',account = '$account',contents = '$contents',amount = '$amount',category = '$category',image = '$file_name' where transaction_id = '$trans_id'") or die($db->error);

    echo "<script>alert('Transaction Edit Success'); location.href='Transactions.php'</script>";
} else {
    $db->query("UPDATE transactions SET month = '$month', day = '$day',year = '$year',account = '$account',contents = '$contents',amount = '$amount',category = '$category' where transaction_id = '$trans_id'") or die($db->error);

    echo "<script>alert('Transaction Edit Success'); location.href='Transactions.php'</script>";
}


