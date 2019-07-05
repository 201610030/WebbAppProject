<?php
$title = "Transactions";
require "header.php";
require 'dbconnection.php';

if (isset($_GET['month'])) {
    $month = $_GET['month'];
    $action = $_GET['action'];

    if ($action == 'next') {
        switch ($month) {
            case 'January': $month = 'February';
                break;
            case 'February': $month = 'March';
                break;
            case 'March': $month = 'April';
                break;
            case 'April': $month = 'May';
                break;
            case 'May': $month = 'June';
                break;
            case 'June': $month = 'July';
                break;
            case 'July': $month = 'August';
                break;
            case 'August': $month = 'September';
                break;
            case 'September': $month = 'October';
                break;
            case 'October': $month = 'November';
                break;
            case 'November': $month = 'December';
                break;
            case 'December': $month = 'January';
                break;
        }

        if ($month == 'January') {
            $year = $_GET['year'] + 1;
        } else {
            $year = $_GET['year'];
        }
    } else {
        switch ($month) {
            case 'January': $month = 'December';
                break;
            case 'December': $month = 'November';
                break;
            case 'November': $month = 'October';
                break;
            case 'October': $month = 'September';
                break;
            case 'September': $month = 'August';
                break;
            case 'August': $month = 'July';
                break;
            case 'July': $month = 'June';
                break;
            case 'June': $month = 'May';
                break;
            case 'May': $month = 'April';
                break;
            case 'April': $month = 'March';
                break;
            case 'March': $month = 'February';
                break;
            case 'February': $month = 'January';
                break;
        }

        if ($month == 'December') {
            $year = $_GET['year'] - 1;
        } else {
            $year = $_GET['year'];
        }
    }
} else {
    $year = date("Y");
    $month = date("F");
}

$query = $db->query("SELECT SUM(amount) as total FROM transactions WHERE accounts_id = " . $accounts_id . " AND month = " . date("n", strtotime($month)) . " AND year = " . $year . " AND transaction_type = 'Income';") or die($db->error);
$row = $query->fetch_assoc();
$totalIncome = $row['total'];

$query = $db->query("SELECT SUM(amount) as total FROM transactions WHERE accounts_id = " . $accounts_id . " AND month = " . date("n", strtotime($month)) . " AND year = " . $year . " AND transaction_type = 'Expense';") or die($db->error);
$row = $query->fetch_assoc();
$totalExpense = $row['total'];

$cash_bal = $db->query("SELECT account_bal FROM account_types WHERE user_id = '$accounts_id' AND account_type='0'");
$savings_bal = $db->query("SELECT account_bal FROM account_types WHERE user_id = '$accounts_id' AND account_type='1'");
$card_bal = $db->query("SELECT account_bal FROM account_types WHERE user_id = '$accounts_id' AND account_type='2'");

if (!isset($totalIncome)) {
    $totalIncome = 0;
}

if (!isset($totalExpense)) {
    $totalExpense = 0;
}

$total = $totalIncome - $totalExpense;
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#myModal">
         <i class="fas fa-plus fa-sm text-white-50"></i> Create new transaction</button>

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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?= $totalIncome ?></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?= $totalExpense ?></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?= $total ?></div>
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
        <div class="card-header py-3 ">

            <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
                <a href="Transactions.php?month=<?= $month ?>&year=<?= $year ?>&action=prev" class="btn btn-sm btn-info">
                    <i class="fas fa-sm fa-chevron-left text-white-50"></i> Previous</a>

                <?= $month . ' ' . $year ?>

                <a href="Transactions.php?month=<?= $month ?>&year=<?= $year ?>&action=next" class="btn btn-sm btn-info">
                    Next <i class="fas fa-chevron-right fa-sm text-white-50"></i></a>
            </h6>
        </div>
        <div class="card-body">
            <?php
            $query = $db->query("SELECT * FROM transactions WHERE accounts_id = " . $accounts_id . " "
                    . "AND month = " . date("n", strtotime($month)) . " AND year = " . $year . " ORDER BY day ASC;") or die($db->error);

            $ctr = 0;

            while ($row = $query->fetch_assoc()):

                $y = $row['year'];
                $m = $row['month'];
                $d = $row['day'];

                $time = strtotime($y . "-" . $m . '-' . $d);
                $newformat = date("Y-m-d", $time);

                $modalName = 'MyModal' . $ctr;

                if ($query->num_rows == 0) {
                    break;
                }

                if ($ctr > 0) {
                    $day = $row['day'];
                    $ctr++;
                }

                if (!isset($day)) {
                    $ctr = 1;

                    $prevday = $row['day'];
                    $day = $row['day'];
                    ?>

                    <div class="card table-responsive my-3">
                        <table class = "table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width='16.67%'><h4 class="text-info"><?= $month . ' ' . $day ?></h2></th>
                                    <th width='16.67%'></th>
                                    <th width='16.67%'></th>
                                    <th width='16.67%'></th>
                                    <th width='16.67%'></th>
                                    <th width='16.67%'></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <?= $row['category'] ?>
                                    </td>
                                    <td>
                                        <?= $row['contents'] ?>
                                    </td>
                                    <td>
                                        <?= $row['account'] ?>
                                    </td>

                                    <?php
                                    if ($row['transaction_type'] == 'Income') {
                                        $edit_type = 'editIncomeBtn';
                                        ?>
                                        <td width="14%" class="text-primary">
                                            ₱<?= $row['amount'] ?>
                                        </td>
                                        <td>
                                        </td>
                                        <?php
                                    } else {
                                        $edit_type = 'editExpenseBtn';
                                        ?>
                                        <td>
                                        </td>
                                        <td width="14%" class="text-danger">
                                            ₱<?= $row['amount'] ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?= $modalName ?>">
                                            <i class="fas fa-edit fa-sm text-white-50"></i></button>
                                        <div class="modal fade" id="<?= $modalName ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Edit Transaction</h2>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="TransactionEdit.php?trans_id=<?= $row['transaction_id'] ?>" method="POST">
                                                            </br>
                                                            <h6>Date</h6>
                                                            <input type="date" name="date"  value="<?= $newformat ?>">
                                                            </br>
                                                            </br>
                                                            <h6>Account</h6>
                                                            <select name="account">
                                                                <option <?php if($row['account']=="Cash"){ echo 'selected="selected"'; }?>>Cash</option>
                                                                <option <?php if($row['account']=="Savings"){ echo 'selected="selected"'; }?>>Savings</option>
                                                                <option <?php if($row['account']=="Card"){ echo 'selected="selected"'; }?>>Card</option>
                                                            </select>
                                                            </br>
                                                            </br>
                                                            <h6>Category</h6>
                                                            <select name="category">
                                                                <?php
                                                                if ($row['transaction_type'] == 'Income') {
                                                                    ?>
                                                                    <option <?php if($row['category']=="Allowance"){ echo 'selected="selected"'; }?>>Allowance</option>
                                                                    <option <?php if($row['category']=="Salary"){ echo 'selected="selected"'; }?>>Salary</option>
                                                                    <option <?php if($row['category']=="Petty cash"){ echo 'selected="selected"'; }?>>Petty cash</option>
                                                                    <option <?php if($row['category']=="Bonus"){ echo 'selected="selected"'; }?>>Bonus</option>
                                                                    <option <?php if($row['category']=="Other"){ echo 'selected="selected"'; }?>>Other</option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option <?php if($row['category']=="Food"){ echo 'selected="selected"'; }?>>Food</option>
                                                                    <option <?php if($row['category']=="Social Life"){ echo 'selected="selected"'; }?>>Social Life</option>
                                                                    <option <?php if($row['category']=="Self-Development"){ echo 'selected="selected"'; }?>>Self-Development</option>
                                                                    <option <?php if($row['category']=="Transportation"){ echo 'selected="selected"'; }?>>Transportation</option>
                                                                    <option <?php if($row['category']=="Culture"){ echo 'selected="selected"'; }?>>Culture</option>
                                                                    <option <?php if($row['category']=="Household"){ echo 'selected="selected"'; }?>>Household</option>
                                                                    <option <?php if($row['category']=="Apparel"){ echo 'selected="selected"'; }?>>Apparel</option>
                                                                    <option <?php if($row['category']=="Beauty"){ echo 'selected="selected"'; }?>>Beauty</option>
                                                                    <option <?php if($row['category']=="Health"){ echo 'selected="selected"'; }?>>Health</option>
                                                                    <option <?php if($row['category']=="Education"){ echo 'selected="selected"'; }?>>Education</option>
                                                                    <option <?php if($row['category']=="Gift"){ echo 'selected="selected"'; }?>>Gift</option>
                                                                    <option <?php if($row['category']=="Other"){ echo 'selected="selected"'; }?>>Other</option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            </br>
                                                            </br>

                                                            <h6>Amount</h6>
                                                            <input type="number" step="any" name="amount" placeholder="Enter Amount"  value="<?= $row['amount'] ?>"/>
                                                            </br>
                                                            </br>

                                                            <h6>Contents</h6>
                                                            <input type="text" name="contents" placeholder="Content Details" value="<?= $row['contents'] ?>"/>
                                                            </br>
                                                            </br>

                                                            <input class="btn btn-primary" type="submit" name="<?= $edit_type ?>" value="Save"/>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <a onclick='javascript:return confirm("Are you sure you want to delete?");'
                                            href="TransactionDelete.php?trans_id=<?= $row['transaction_id'] ?>" class="btn btn-danger">
                                        <i class="fas fa-trash fa-sm text-white-50"></i></a>
                                    </td>
                                </tr>

                                <?php
                            } else if ($prevday == $day) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['category'] ?>
                                    </td>
                                    <td>
                                        <?= $row['contents'] ?>
                                    </td>
                                    <td>
                                        <?= $row['account'] ?>
                                    </td>

                                    <?php
                                    if ($row['transaction_type'] == 'Income') {
                                        $edit_type = 'editIncomeBtn';
                                        ?>
                                        <td width="14%" class="text-primary">
                                            ₱<?= $row['amount'] ?>
                                        </td>
                                        <td>
                                        </td>
                                        <?php
                                    } else {
                                        $edit_type = 'editExpenseBtn';
                                        ?>
                                        <td>
                                        </td>
                                        <td width="14%" class="text-danger">
                                            ₱<?= $row['amount'] ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?= $modalName ?>">
                                        <i class="fas fa-edit fa-sm text-white-50"></i></button>
                                        <div class="modal fade" id="<?= $modalName ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Edit Transaction</h2>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="TransactionEdit.php?trans_id=<?= $row['transaction_id'] ?>" method="POST">
                                                            </br>
                                                            <h6>Date</h6>
                                                            <input type="date" name="date"  value="<?= $newformat ?>">
                                                            </br>
                                                            </br>
                                                            <h6>Account</h6>
                                                            <select name="account">
                                                                <option <?php if($row['account']=="Cash"){ echo 'selected="selected"'; }?>>Cash</option>
                                                                <option <?php if($row['account']=="Savings"){ echo 'selected="selected"'; }?>>Savings</option>
                                                                <option <?php if($row['account']=="Card"){ echo 'selected="selected"'; }?>>Card</option>
                                                            </select>
                                                            </br>
                                                            </br>
                                                            <h6>Category</h6>
                                                            <select name="category">
                                                                <?php
                                                                if ($row['transaction_type'] == 'Income') {
                                                                    ?>
                                                                    <option <?php if($row['category']=="Allowance"){ echo 'selected="selected"'; }?>>Allowance</option>
                                                                    <option <?php if($row['category']=="Salary"){ echo 'selected="selected"'; }?>>Salary</option>
                                                                    <option <?php if($row['category']=="Petty cash"){ echo 'selected="selected"'; }?>>Petty cash</option>
                                                                    <option <?php if($row['category']=="Bonus"){ echo 'selected="selected"'; }?>>Bonus</option>
                                                                    <option <?php if($row['category']=="Other"){ echo 'selected="selected"'; }?>>Other</option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option <?php if($row['category']=="Food"){ echo 'selected="selected"'; }?>>Food</option>
                                                                    <option <?php if($row['category']=="Social Life"){ echo 'selected="selected"'; }?>>Social Life</option>
                                                                    <option <?php if($row['category']=="Self-Development"){ echo 'selected="selected"'; }?>>Self-Development</option>
                                                                    <option <?php if($row['category']=="Transportation"){ echo 'selected="selected"'; }?>>Transportation</option>
                                                                    <option <?php if($row['category']=="Culture"){ echo 'selected="selected"'; }?>>Culture</option>
                                                                    <option <?php if($row['category']=="Household"){ echo 'selected="selected"'; }?>>Household</option>
                                                                    <option <?php if($row['category']=="Apparel"){ echo 'selected="selected"'; }?>>Apparel</option>
                                                                    <option <?php if($row['category']=="Beauty"){ echo 'selected="selected"'; }?>>Beauty</option>
                                                                    <option <?php if($row['category']=="Health"){ echo 'selected="selected"'; }?>>Health</option>
                                                                    <option <?php if($row['category']=="Education"){ echo 'selected="selected"'; }?>>Education</option>
                                                                    <option <?php if($row['category']=="Gift"){ echo 'selected="selected"'; }?>>Gift</option>
                                                                    <option <?php if($row['category']=="Other"){ echo 'selected="selected"'; }?>>Other</option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            </br>
                                                            </br>

                                                            <h6>Amount</h6>
                                                            <input type="number" step="any" name="amount" placeholder="Enter Amount"  value="<?= $row['amount'] ?>"/>
                                                            </br>
                                                            </br>

                                                            <h6>Contents</h6>
                                                            <input type="text" name="contents" placeholder="Content Details" value="<?= $row['contents'] ?>"/>
                                                            </br>
                                                            </br>

                                                            <input class="btn btn-primary" type="submit" name="<?= $edit_type ?>" value="Save"/>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <a onclick='javascript:return confirm("Are you sure you want to delete?");'
                                            href="TransactionDelete.php?trans_id=<?= $row['transaction_id'] ?>" class="btn btn-danger">
                                        <i class="fas fa-trash fa-sm text-white-50"></i></a>
                                    </td>
                                </tr>

                            <?php } else {
                                ?>                 
                            </tbody>
                        </table>
                    </div>

                    <div class="card table-responsive my-3">
                        <table class = "table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width='16.67%'><h4 class="text-info"><?= $month . ' ' . $day ?></h4></th>
                                    <th width='16.67%'></th>
                                    <th width='16.67%'></th>
                                    <th width='16.67%'></th>
                                    <th width='16.67%'></th>
                                    <th width='16.67%'></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <?= $row['category'] ?>
                                    </td>
                                    <td>
                                        <?= $row['contents'] ?>
                                    </td>
                                    <td>
                                        <?= $row['account'] ?>
                                    </td>

                                    <?php
                                    if ($row['transaction_type'] == 'Income') {
                                        $edit_type = 'editIncomeBtn';
                                        ?>
                                        <td width="14%" class="text-primary">
                                            ₱<?= $row['amount'] ?>
                                        </td>
                                        <td>
                                        </td>
                                        <?php
                                    } else {
                                        $edit_type = 'editExpenseBtn';
                                        ?>
                                        <td>
                                        </td>
                                        <td width="14%" class="text-danger">
                                            ₱<?= $row['amount'] ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?= $modalName ?>">
                                        <i class="fas fa-edit fa-sm text-white-50"></i></button>
                                        <div class="modal fade" id="<?= $modalName ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Edit Transaction</h2>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="TransactionEdit.php?trans_id=<?= $row['transaction_id'] ?>" method="POST">
                                                            </br>
                                                            <h6>Date</h6>
                                                            <input type="date" name="date"  value="<?= $newformat ?>">
                                                            </br>
                                                            </br>
                                                            <h6>Account</h6>
                                                            <select name="account">
                                                                <option <?php if($row['account']=="Cash"){ echo 'selected="selected"'; }?>>Cash</option>
                                                                <option <?php if($row['account']=="Savings"){ echo 'selected="selected"'; }?>>Savings</option>
                                                                <option <?php if($row['account']=="Card"){ echo 'selected="selected"'; }?>>Card</option>
                                                            </select>
                                                            </br>
                                                            </br>
                                                            <h6>Category</h6>
                                                            <select name="category">
                                                                <?php
                                                                if ($row['transaction_type'] == 'Income') {
                                                                    ?>
                                                                    <option <?php if($row['category']=="Allowance"){ echo 'selected="selected"'; }?>>Allowance</option>
                                                                    <option <?php if($row['category']=="Salary"){ echo 'selected="selected"'; }?>>Salary</option>
                                                                    <option <?php if($row['category']=="Petty cash"){ echo 'selected="selected"'; }?>>Petty cash</option>
                                                                    <option <?php if($row['category']=="Bonus"){ echo 'selected="selected"'; }?>>Bonus</option>
                                                                    <option <?php if($row['category']=="Other"){ echo 'selected="selected"'; }?>>Other</option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option <?php if($row['category']=="Food"){ echo 'selected="selected"'; }?>>Food</option>
                                                                    <option <?php if($row['category']=="Social Life"){ echo 'selected="selected"'; }?>>Social Life</option>
                                                                    <option <?php if($row['category']=="Self-Development"){ echo 'selected="selected"'; }?>>Self-Development</option>
                                                                    <option <?php if($row['category']=="Transportation"){ echo 'selected="selected"'; }?>>Transportation</option>
                                                                    <option <?php if($row['category']=="Culture"){ echo 'selected="selected"'; }?>>Culture</option>
                                                                    <option <?php if($row['category']=="Household"){ echo 'selected="selected"'; }?>>Household</option>
                                                                    <option <?php if($row['category']=="Apparel"){ echo 'selected="selected"'; }?>>Apparel</option>
                                                                    <option <?php if($row['category']=="Beauty"){ echo 'selected="selected"'; }?>>Beauty</option>
                                                                    <option <?php if($row['category']=="Health"){ echo 'selected="selected"'; }?>>Health</option>
                                                                    <option <?php if($row['category']=="Education"){ echo 'selected="selected"'; }?>>Education</option>
                                                                    <option <?php if($row['category']=="Gift"){ echo 'selected="selected"'; }?>>Gift</option>
                                                                    <option <?php if($row['category']=="Other"){ echo 'selected="selected"'; }?>>Other</option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            </br>
                                                            </br>

                                                            <h6>Amount</h6>
                                                            <input type="number" step="any" name="amount" placeholder="Enter Amount"  value="<?= $row['amount'] ?>"/>
                                                            </br>
                                                            </br>

                                                            <h6>Contents</h6>
                                                            <input type="text" name="contents" placeholder="Content Details" value="<?= $row['contents'] ?>"/>
                                                            </br>
                                                            </br>

                                                            <input class="btn btn-primary" type="submit" name="<?= $edit_type ?>" value="Save"/>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <a onclick='javascript:return confirm("Are you sure you want to delete?");'
                                            href="TransactionDelete.php?trans_id=<?= $row['transaction_id'] ?>" class="btn btn-danger">
                                        <i class="fas fa-trash fa-sm text-white-50"></i></a>
                                    </td>
                                </tr>

                                <?php
                            } $prevday = $day;

                            if ($ctr == $query->num_rows) {
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
            endwhile;
            ?>

        </div>
    </div>


    <!-- Start of data input -->

    <button type="button" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm" data-toggle="modal" data-target="#myModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> Create new transaction</button>
    
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Transaction</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="container">

                        <script>
                            $(document).ready(function () {
                                activaTab('Income');
                            });

                            function activaTab(tab) {
                                $('.nav-tabs a[href="#' + tab + '"]').tab('show');
                            }
                            ;
                        </script>

                        <ul class="nav nav-tabs">
                            <li><a class="btn btn-primary" data-toggle="tab" href="#Income">Income</a></li>
                            <li style="margin: auto"><a class="btn btn-danger" data-toggle="tab" href="#Expense">Expense</a></li>
                            <li><a class="btn btn-info" data-toggle="tab" href="#Transfer">Transfer</a></li>
                        </ul>

                        <div class="tab-content" id="tabs">
                            <!-- INCOME TAB -->
                            <div id="Income" class="tab-pane fade">
                                <form action="TransactionInsert.php" method="POST">
                                    </br>
                                    <h2>Income</h2>
                                    <h6>Date</h6>
                                    <input type="date" name="date">
                                    </br>
                                    </br>

                                    <h6>Account</h6>
                                    <select name="account">
                                        <option>Cash</option>
                                        <option>Savings</option>
                                        <option>Card</option>
                                    </select>
                                    </br>
                                    </br>

                                    <h6>Category</h6>
                                    <select name="category">
                                        <option>Allowance</option>
                                        <option>Salary</option>
                                        <option>Petty cash</option>
                                        <option>Bonus</option>
                                        <option>Other</option>
                                    </select>
                                    </br>
                                    </br>

                                    <h6>Amount</h6>
                                    <input type="number" step="any" name="amount" placeholder="Enter Amount"/>
                                    </br>
                                    </br>

                                    <h6>Contents</h6>
                                    <input type="text" name="contents" placeholder="Content Details"/>
                                    </br>
                                    </br>

                                    <input class="btn btn-primary" type="submit" name="incomeSubmitBtn" value="Save"/>
                                </form>
                            </div>

                            <!-- EXPENSE TAB -->
                            <div id="Expense" class="tab-pane fade">
                                <form action="TransactionInsert.php" method="POST">
                                    </br>
                                    <h2>Expense</h2>
                                    <h6>Date</h6>
                                    <input type="date" name="date">
                                    </br>
                                    </br>

                                    <h6>Account</h6>
                                    <select name="account">
                                        <option>Cash</option>
                                        <option>Savings</option>
                                        <option>Card</option>
                                    </select>
                                    </br>
                                    </br>

                                    <h6>Category</h6>
                                    <select name="category">
                                        <option>Food</option>
                                        <option>Social Life</option>
                                        <option>Self-Development</option>
                                        <option>Transportation</option>
                                        <option>Culture</option>
                                        <option>Household</option>
                                        <option>Apparel</option>
                                        <option>Beauty</option>
                                        <option>Health</option>
                                        <option>Education</option>
                                        <option>Gift</option>
                                        <option>Other</option>
                                    </select>
                                    </br>
                                    </br>

                                    <h6>Amount</h6>
                                    <input type="number" step="any" name="amount" placeholder="Enter Amount"/>
                                    </br>
                                    </br>

                                    <h6>Contents</h6>
                                    <input type="text" name="contents" placeholder="Content Details"/>
                                    </br>
                                    </br>

                                    <input class="btn btn-primary" type="submit" name="expenseSubmitBtn" value="Save"/>
                                </form>
                            </div>

                            <!-- TRANSFER TAB -->
                            <div id="Transfer" class="tab-pane fade">
                                <form action="TransactionInsert.php" method="POST">
                                    </br>
                                    <h2>Transfer</h2>
                                    <h6>Date</h6>
                                    <input type="date" name="date">
                                    </br>
                                    </br>

                                    <h6>From</h6>
                                    <select name="account_from">
                                        <option>Cash</option>
                                        <option>Savings</option>
                                        <option>Card</option>
                                    </select>
                                    </br>
                                    </br>

                                    <h6>To</h6>
                                    <select name="account_to">
                                        <option>Cash</option>
                                        <option>Savings</option>
                                        <option>Card</option>
                                    </select>
                                    </br>
                                    </br>

                                    <h6>Amount</h6>
                                    <input type="number" step="any" name="amount" placeholder="Enter Amount"/>
                                    </br>
                                    </br>

                                    <h6>Contents</h6>
                                    <input type="text" name="contents" placeholder="Content Details"/>
                                    </br>
                                    </br>

                                    <input class="btn btn-primary" type="submit" name="transferSubmitBtn" value="Save"/>
                                </form>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?php
require "footer.php";
?>