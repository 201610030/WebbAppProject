<?php
session_start();
session_destroy();
echo "<script>alert('Log Out Successfully!'); location.href='login.php'</script>";
?>