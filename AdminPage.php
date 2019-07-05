<?php

session_start();

if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}else if(isset($_SESSION['id']) == 999){
    header("Location: Transactions.php");
}

$title = "Admin Page";
require "header.php";
require 'dbconnection.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">
                Admin Page
            </h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <td width='11.11%'>Account ID</td>
                <td width='11.11%'>Username</td>
                <td width='11.11%'>Password</td>
                <td width='11.11%'>First name</td>
                <td width='11.11%'>Last name</td>
                <td width='11.11%'>E-mail</td>
                <td width='11.11%'>Verified</td>
                <td width='11.11%'>Status</td>
                <td width='11.11%'>Edit Status</td>
                </thead>
                <tbody>
                    <?php
                    $query = $db->query("SELECT * FROM accounts");

                    //MYSQLI RESULT
                    while($row = $query->fetch_assoc()):?>
                            <tr>
                                <td>
                                    <?=$row['id']?>
                                </td>
                                <td>
                                    <?=$row['uname']?>
                                </td>
                                <td>
                                    <?=$row['pword']?>
                                </td>
                                <td>
                                    <?=$row['fname']?>
                                </td>
                                <td>
                                    <?=$row['lname']?>
                                </td>
                                <td>
                                    <?=$row['email']?>
                                </td>
                                <td>
                                    <?php
                                    if($row['is_verify']==1){
                                    ?>
                                        YES
                                    <?php
                                    }
                                    else{
                                    ?>
                                        NO
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['status']==1){
                                    ?>
                                        ENABLED
                                    <?php
                                    }
                                    else{
                                    ?>
                                        DISABLED
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['status']==1){
                                    ?>
                                        <a href="DisableStatus.php?acntid=<?=$row['id']?>" class="btn btn-danger">DISABLE</a>
                                    <?php
                                    }
                                    else{
                                    ?>
                                        <a href="EnableStatus.php?acntid=<?=$row['id']?>" class="btn btn-success">ENABLE</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php endwhile;?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
require "footer.php";
?>