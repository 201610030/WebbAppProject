<?php

session_start();

if (isset($_SESSION['specialid']) == 999) {
    header("Location: AdminPage.php");
} if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}

if ($_POST['date'] == NULL) {
    echo "<script>alert('You must enter a date!'); location.href='Transactions.php'</script>";
} else if ($_POST['amount'] < 1) {
    echo "<script>alert('You must enter a valid amount'); location.href='Transactions.php'</script>";
} else {
    require 'dbconnection.php';

    $dateArr = explode("-", $_POST['date']);

    $year = $dateArr[0];
    $month = $dateArr[1];
    $day = $dateArr[2];
    $amount = strip_tags($_POST['amount']);
    $contents = strip_tags($_POST['contents']);
    $accounts_id = $_SESSION['userid'];

    if ($_FILES['image']['name'] != '') {
        $temp_name = strip_tags($_FILES['image']['tmp_name']);
        $file_name = strip_tags(time() . "_" . $_FILES['image']['name']);
        $directory = "img/";

        move_uploaded_file($temp_name, $directory . $file_name);
    }


    if (isset($_POST['transferSubmitBtn'])) {
        $account_from = strip_tags($_POST['account_from']);
        $category_to = strip_tags($_POST['account_to']);
    } else {
        $account = strip_tags($_POST['account']);
        $category = strip_tags($_POST['category']);
    }

    if (isset($_POST['incomeSubmitBtn'])) {
        $db->query("INSERT into transactions (accounts_id,month,day,year,account,category,contents,transaction_type,amount,image) VALUES ('$accounts_id','$month','$day','$year','$account','$category','$contents','Income','$amount','$file_name')") or die($db->error);
        echo "<script>alert('Transaction Success'); location.href='Transactions.php'</script>";
    } else if (isset($_POST['expenseSubmitBtn'])) {
        $db->query("INSERT into transactions (accounts_id,month,day,year,account,category,contents,transaction_type,amount,image) VALUES ('$accounts_id','$month','$day','$year','$account','$category','$contents','Expense','$amount','$file_name')") or die($db->error);
        echo "<script>alert('Transaction Success'); location.href='Transactions.php'</script>";
    } else {
        $db->query("INSERT into transfer (accounts_id,month,day,year,account_from,account_to,contents,amount) VALUES ('$accounts_id','$month','$day','$year','$account_from','$category_to','$contents','$amount')") or die($db->error);
        echo "<script>alert('Transaction Success'); location.href='Transactions.php'</script>";
    }
}


//while($row = $query->fetch_assoc()):
//    
//    echo $row['username'];
//    
//endwhile;


