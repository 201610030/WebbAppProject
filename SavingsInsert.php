<?php

session_start();

if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}

print_r($_POST);

if ($_POST['target_amt'] < 1 or $_POST['current_amt'] < 0) {
    echo "<script>alert('You must enter a valid amount'); location.href='SavingGoals.php'</script>";
} else {
    require 'dbconnection.php';


    $name = strip_tags($_POST['savings_desc']);
    $current_amt = strip_tags($_POST['current_amt']);
    $target_amt = strip_tags($_POST['target_amt']);
    $target_date = strip_tags($_POST['target_date']);

    $db->query("INSERT into savings (accounts_id,savings_desc,current_amt,target_amt,target_date) "
                    . "VALUES ('$accounts_id','$name', '$current_amt', '$target_amt', '$target_date')") or die($db->error);
    echo "<script>alert('You successfully created a piggy bank!'); location.href='SavingGoals.php'</script>";
}

//while($row = $query->fetch_assoc()):
//    
//    echo $row['username'];
//    
//endwhile;



    