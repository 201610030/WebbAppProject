<?php
session_start();
// SUPER GLOBAL ARRAYS
/*
 * $_GET - GET REQUESTS
 * $_POST- POST REQUESTS
 * $_REQUEST - ALL REQUEST
 * $_SERVER - ALL SERVER INFORMATION   
 * $_SESSION
 *  */

require 'files/dbconnection.php';
$username = $_POST['uname'];
$password = $_POST['pword'];

$query = $db->query("SELECT * from accounts where uname = '$username' AND pword = '$password' ") or die($db->error);

if($query->num_rows > 0){
    
    $userinfo = $query->fetch_assoc();
    
    if($userinfo['status'] == 1){
        
        if($userinfo['is_verify'] == 1){
            $_SESSION['userid'] = $userinfo['id'];
            $_SESSION['login'] = TRUE;
            header("Location: transactions.php");
        }else{
            echo "<script>alert('You are not yet verified! Please check your email to confirm your account'); location.href='login.php'</script>";
        }
        
        
    }else{
        echo "<script>alert('You are blocked from the system!'); location.href='login.php'</script>";

    }
}else{
    echo "<script>alert('Invalid username/password!'); location.href='login.php'</script>";
}