<?php
$title = "Saving Goals";
require "header.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Saving Goals</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
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
                                <th></th>
                                <th>Target Amount</th>
                                <th>Target Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning">
                                        <i class="fas fa-edit fa-sm text-white-50"></i>
                                    </a>
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger">
                                        <i class="fas fa-trash fa-sm text-white-50"></i>
                                    </a>
                                </td>
                                <td>New Phone</td>
                                <td>₱ 5,000</td>
                                <td></td>
                                <td>₱25,000</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning">
                                        <i class="fas fa-edit fa-sm text-white-50"></i>
                                    </a>
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger">
                                        <i class="fas fa-trash fa-sm text-white-50"></i>
                                    </a>
                                </td>
                                <td>CebuPac Tickets</td>
                                <td>₱ 2,000</td>
                                <td></td>
                                <td>₱12,000</td>
                                <td>09/10/2019</td>
                            </tr>
                        </tbody>
                    </table>
                 

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
require "footer.php";
?>