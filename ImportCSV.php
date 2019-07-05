<?php

session_start();

if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}

$title = "Saving Goals";
require "header.php";
require 'dbconnection.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Import .CSV</h1>
        <a data-toggle="modal" data-target="#Create"
           href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create new piggy bank</a>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload .CSV file</h6>
        </div>
        <div class="card-body">
            <p>.CSV file should be in the following format:</p>
            <img src="import_csv.jpg">
        </div>
    </div>

</div>
<!-- /.container-fluid -->



<?php
require "footer.php";
?>