<?php

session_start();

if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
} else {
    session_destroy();
    echo "<script>alert('Log Out Successfully!'); location.href='login.php'</script>";
}
?>