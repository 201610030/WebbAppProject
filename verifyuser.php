<?php
    
require 'files/dbconnection.php';

$verification = $_GET['vcode'];

$db->query("UPDATE accounts SET is_verify = 1 where vcode = '$verification'");
 echo "<script>alert('Verification Successful!'); location.href='login.php'</script>";