<?php
$title = "Saving Goals";
require "header.php";
require 'dbconnection.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Saving Goals</h1>
        <a data-toggle="modal" data-target="#Create"
           href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create new piggy bank</a>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Piggy Banks</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class = "table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Piggy Bank</th>
                            <th>Saved So Far</th>
                            <th>Target Amount</th>
                            <th>Target Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $db->query("SELECT * FROM savings WHERE accounts_id = " . $accounts_id . " "
                                . "ORDER BY target_date ASC") or die($db->error);

                        $ctr = 0;

                        while ($row = $query->fetch_assoc()):
                            $target_date = NULL;

                            if ($row['target_date'] != NULL) {
                                $timestamp = strtotime($row['target_date']);
                                $date = date("Y-m-d", $timestamp);
                                $target_date = date("M j Y", $timestamp);
                            }
                            $id = $row['savings_id'];
                            $name = $row['savings_desc'];
                            $current_amt = $row['current_amt'];
                            $target_amt = $row['target_amt'];
                            ?>

                            <tr>
                                <td><button type="button" data-toggle="modal" data-target="#Edit-<?= $id ?>"
                                            id="EditBtn" data-id="<?= $id ?>"
                                            class="d-none d-sm-inline-block btn btn-sm btn-warning">
                                        <i class="fas fa-edit fa-sm text-white-50"></i>
                                    </button>
                                    <a onclick='javascript:return confirm("Are you sure you want to delete?");'
                                       href="SavingsDelete.php?id=<?= $id ?>" 
                                       class="d-none d-sm-inline-block btn btn-sm btn-danger">
                                        <i class="fas fa-trash fa-sm text-white-50"></i>
                                    </a>
                                </td>
                                <td><?= $name ?></td>
                                <td>₱ <?= number_format($current_amt) ?></td>
                                <td>₱ <?= number_format($target_amt) ?></td>
                                <td><?php
                                    if ($date != "1970-01-01") {
                                        print($target_date);
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">
                                    <?php
                                    $percent = ($current_amt / $target_amt) * 100;
                                    ?>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?=$percent?>%" aria-valuenow="<?= $percent?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>


                            <!--
                                EDIT SAVING GOAL
                            -->

                        <div class="modal fade" id="Edit-<?= $id ?>" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Piggy Bank</h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="SavingsEdit.php?id=<?= $id ?>" method="POST">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label" for="savings_desc">Piggy Bank Name</label> 
                                                <div class="col-8">
                                                    <input id="savings_desc" name="savings_desc" type="text" 
                                                           required="required" class="form-control" value="<?= $name ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="current_amt" class="col-4 col-form-label">Current Amount</label> 
                                                <div class="col-8">
                                                    <input id="current_amt" name="current_amt" type="number" 
                                                           class="form-control" required="required" value="<?= $current_amt ?>">
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label for="target_amt" class="col-4 col-form-label">Target Amount</label> 
                                                <div class="col-8">
                                                    <input id="target_amt" name="target_amt" type="number" 
                                                           required="required" class="form-control" value="<?= $target_amt ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="target_date" class="col-4 col-form-label">Target Date</label> 
                                                <div class="col-8">
                                                    <?php
                                                    if ($date == "1970-01-01"):
                                                        ?>
                                                        <input id="target_date" name="target_date" type="date" 
                                                               class="form-control">
                                                               <?php
                                                           else:
                                                               ?>
                                                        <input id="target_date" name="target_date" type="date" 
                                                               class="form-control" required="required" value="<?= $date ?>">
                                                           <?php
                                                           endif;
                                                           ?>

                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <div class="offset-4 col-8">
                                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!--
    CREATE SAVING GOAL
-->
<div class="modal fade" id="Create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create New Piggy Bank</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="SavingsInsert.php" method="POST">
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="savings_desc">Piggy Bank Name *</label> 
                        <div class="col-8">
                            <input id="savings_desc" name="savings_desc" type="text" 
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="current_amt" class="col-4 col-form-label">Current Amount</label> 
                        <div class="col-8">
                            <input id="current_amt" name="current_amt" type="number" 
                                   class="form-control">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="target_amt" class="col-4 col-form-label">Target Amount *</label> 
                        <div class="col-8">
                            <input id="target_amt" name="target_amt" type="number" 
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="target_date" class="col-4 col-form-label">Target Date</label> 
                        <div class="col-8">
                            <input id="target_date" name="target_date" type="date" 
                                   class="form-control">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <hr>
                    <span>* required</span>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
require "footer.php";
?>