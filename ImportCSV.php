<?php
$title = "Import .CSV";
require "header.php";
require 'dbconnection.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Import .CSV</h1>
        
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload .CSV file</h6>
        </div>
        <div class="card-body">
            <p>You can import existing list of transactions through a .CSV (comma delimited) file. The .CSV file should be in the following format:</p>
            <img src="import_csv.jpg" class="img-fluid img-thumbnail rounded mx-auto d-block" style="width:50%;">
            <form method="POST" action="UploadCSV.php" enctype="multipart/form-data">
                <hr>
                <div class="form-row">
                    <div class="custom-file col-sm-4 mx-1">
                        <input type="file" class="custom-file-input" name="uploadedFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <!--<div class="invalid-feedback">Example invalid custom file feedback</div>-->
                    </div>
                    <button type="submit" name="UploadBtn" class="btn btn-primary col-auto mx-1 px-3">
                        <i class="fas fa-download fa-sm text-white-50"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<link href="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js">


<?php
    

require "footer.php";
?>