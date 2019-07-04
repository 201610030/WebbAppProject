<?php

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

$db->query("UPDATE transactions SET month = '$month', day = '$day',year = '$year',account = '$account',contents = '$contents',amount = '$amount',category = '$category' where transaction_id = '$trans_id'") or die($db->error);

echo "<script>alert('Transaction Edit Success'); location.href='Transactions.php'</script>";
