<?php

require 'dbconnection.php';

$trans_id = $_GET['trans_id'];

$db->query("DELETE from transactions where transaction_id = '$trans_id' ");
echo "<script>alert('Transaction Deletion Success'); location.href='Transactions.php'</script>";