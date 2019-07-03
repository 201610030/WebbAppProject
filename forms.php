<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Tables</title>

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Budget Tracker</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="tables.html">
                        <span>Transactions</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="tables.html">
                        <span>Monthly Budget</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="tables.html">
                        <span>Savings Goals</span></a>
                </li>

                <!-- Divider -->
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
                            <li class="nav-item" style="padding-left: 10px">
                                <a href="#" class="btn btn-info">
                                    <span>Transactions</span>
                                </a>
                            </li>

                            <li class="nav-item" style="padding-left: 10px">
                                <a href="#" class="btn btn-info">
                                    <span>Montly Budget</span>
                                </a>
                            </li>

                            <li class="nav-item" style="padding-left: 10px">
                                <a href="#" class="btn btn-info">
                                    <span>Savings goals</span>
                                </a>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->

                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Income</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">₱140,000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Expense</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">₱100,000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">₱40,000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">July 2019</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <a href="google.com" class="btn card">
                                        <table class = "table" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>1</th>
                                                    <th>Monday</th>
                                                    <th style="color:blue">₱0.00</th>
                                                    <th style="color:red">₱10.00</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="14%">
                                                        Other
                                                    </td>
                                                    <td width="14%">
                                                        Contents
                                                    </td>
                                                    <td width="14%">
                                                    </td>
                                                    <td width="14%" style="color:red">
                                                        ₱10.00
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </a>

                                    <a href="google.com" class="btn card">
                                        <table class = "table" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>2</th>
                                                    <th>Tuesday</th>
                                                    <th style="color:blue">₱0.00</th>
                                                    <th style="color:red">₱120.52</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="14%">
                                                        Apparel
                                                    </td>
                                                    <td width="14%">
                                                        Accessories
                                                    </td>
                                                    <td width="14%">
                                                    </td>
                                                    <td width="14%" style="color:red">
                                                        ₱32.00
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="14%">
                                                        Apparel
                                                    </td>
                                                    <td width="14%">
                                                        Skirt
                                                    </td>
                                                    <td width="14%">
                                                    </td>
                                                    <td width="14%" style="color:red">
                                                        ₱28.63
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="14%">
                                                        Apparel
                                                    </td>
                                                    <td width="14%">
                                                        Bag
                                                    </td>
                                                    <td width="14%">
                                                    </td>
                                                    <td width="14%" style="color:red">
                                                        ₱59.89
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </a>

                                </div>
                            </div>
                        </div>


                        <?php
                        if (isset($_POST['submitBtn'])) {
                            echo "USERNAME: " . $username = strip_tags($_POST['txtField']) . "<br>";
                            echo "PASSWORD: " . $password = strip_tags($_POST['passwordField']) . "<br>";
                            echo "SELECTED: " . $select = strip_tags($_POST['select']) . "<br>";
                            echo "CHECKBOX1: " . $check = strip_tags($_POST['check1']) . "<br>";
                            echo "CHECKBOX2: " . $check2 = strip_tags($_POST['check2']) . "<br>";
                        }
                        ?>
                        <h1>WELCOME TO MY FORM</h1>
                        <form action="" method="POST">
                            <input type="text" name="txtField" placeholder="Enter Username"/> <br/>
                            <input type="password" name="passwordField" placeholder="Enter Password"/> <br/>
                            <select name="select">
                                <option>OPTION 1</option>
                                <option>OPTION 2</option>
                                <option>OPTION 3</option>
                            </select><br/>
                            <label>
                                <input type="checkbox" name="check1" value="OPTION 1">OPTION 1
                            </label>
                            <label>
                                <input type="checkbox" name="check2" value="OPTION 2">OPTION 2
                            </label>
                            <input type="submit" name="submitBtn" value="Submit Me"/>
                        </form>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2019</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

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
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </body>

</html>

