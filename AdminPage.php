<?php

session_start();

if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}else if(isset($_SESSION['specialid']) != 999){
    header("Location: Dashboard.php");
}

$title = "Admin Page";
require 'dbconnection.php';

?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $title ?></title>

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Expense Tracker</div>
                </a>

<!--                 Divider 
                <hr class="sidebar-divider d-none d-md-block">

                <div class="sidebar-heading">
                    addons
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="ImportCSV.php">
                        <i class="fas fa-fw fa-upload"></i>
                        <span>Import .CSV</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="SavingGoals.php">
                        <i class="fas fa-fw fa-download"></i>
                        <span>Export .CSV</span></a>
                </li>-->

                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                   
                                    echo $_SESSION['fname']." ".$_SESSION['lname'];
                                    ?>
                                    </span>

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <!--                                    <a class="dropdown-item" href="#">
                                                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                                            Profile
                                                                        </a>
                                                                        <a class="dropdown-item" href="#">
                                                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                                            Settings
                                                                        </a>
                                                                        <a class="dropdown-item" href="#">
                                                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                                            Activity Log
                                                                        </a>
                                                                        <div class="dropdown-divider"></div>-->
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Topbar -->


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