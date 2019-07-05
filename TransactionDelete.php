<?php

require 'dbconnection.php';

$trans_id = $_GET['trans_id'];

$q=$db->query("SELECT image from transactions where transaction_id = '$trans_id' ");
$item = $q->fetch_assoc();
$item_image = $item['image'];
if($item_image != NULL){
    unlink("img/".$item_image);
}

$db->query("DELETE from transactions where transaction_id = '$trans_id' ");

echo "<script>alert('Transaction Deletion Success'); location.href='Transactions.php'</script>";