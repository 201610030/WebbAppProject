<?php

require 'dbconnection.php';

$id = $_GET['id'];

$db->query("DELETE from savings where transaction_id = '$id' ");
echo "<script>alert('Transaction Deletion Success'); location.href='SavingGoals.php'</script>";