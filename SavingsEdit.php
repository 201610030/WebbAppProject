<?php

require 'dbconnection.php';

$id = $_GET['id'];

$name = strip_tags($_POST['savings_desc']);
$current_amt = strip_tags($_POST['current_amt']);
$target_amt = strip_tags($_POST['target_amt']);
$target_date = strip_tags($_POST['target_date']);



$db->query("UPDATE savings SET savings_desc = '$name', current_amt = '$current_amt', "
        . " target_amt='$target_amt', target_date='$target_date' where savings_id = '$id'") or die($db->error);

echo "<script>alert('Edit Success'); location.href='SavingGoals.php'</script>";
