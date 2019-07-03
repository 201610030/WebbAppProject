<?php
$title = "Transactions";
require "header.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create new transaction</a>
    </div>

    <!-- Page Heading -->

    <div class="row">

       <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱140,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expense</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱100,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Current Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
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
                <table class = "table" width=100% cellspacing="0">
                    <thead>
                        <tr>
                            <th>1</th>
                            <th>Monday</th>
                            <th class="text-primary">₱0.00</th>
                            <th class="text-danger">₱10.00</th>
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
                            <td width="14%" class="text-danger">
                                ₱10.00
                            </td>
                        </tr>
                    </tbody>
                </table>

                <hr>

                <table class = "table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="14%">2</th>
                            <th width="14%">Tuesday</th>
                            <th width="14%" class="text-primary">₱0.00</th>
                            <th width="14%" class="text-danger">₱120.52</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Apparel
                            </td>
                            <td>
                                Accessories
                            </td>
                            <td>
                            </td>
                            <td class="text-danger">
                                ₱32.00
                            </td>
                        </tr
                        
                        <tr>
                            <td>
                                Apparel
                            </td>
                            <td>
                                Skirt
                            </td>
                            <td>
                            </td>
                            <td class="text-danger">
                                ₱28.63
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                Apparel
                            </td>
                            <td>
                                Bag
                            </td>
                            <td>
                            </td>
                            <td class="text-danger">
                                ₱59.89
                            </td>
                        </tr>

                    </tbody>
                </table>

                <hr>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
require "footer.php";
?>