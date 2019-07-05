<?php

require 'dbconnection.php';

$id = $_GET['id'];

$db->query("DELETE from savings where savings_id = '$id' ");
echo "<script>alert('Deletion Success'); location.href='SavingGoals.php'</script>";