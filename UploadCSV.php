<?php

require 'dbconnection.php';

if (isset($_POST['UploadBtn']) && $_POST['UploadBtn'] == 'Upload') {
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $allowedfileExtensions = array('csv');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = './';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $message = 'File is successfully uploaded.';

                $row = 1;
                if (($handle = fopen($dest_path, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        echo "<p> $num fields in line $row: <br /></p>\n";
                        $row++;
                        $dateArr = explode("-", $data[$c]);
                        $year = $dateArr[0];
                        $month = $dateArr[1];
                        $day = $dateArr[2];
                        $account = $data[1];
                        $category = $data[2];
                        $contents = $data[3];
                        $trans_type = $data[4];
                        $amount = $data[5];


                        $insert = "INSERT INTO transactions (accounts_id,month,day,"
                                . "year,account, category,contents,transaction_type,"
                                . "amount) VALUES ($accounts_id, $month, $day,"
                                . "$year, $account, $category, $contents, $trans_type,"
                                . "$amount);";
                    }
                }
            }
        }
        fclose($handle);
    }

    echo "<script>alert('$message'); location.href='ImportCSV.php'</script>";
} else {
    $message = 'There was some error moving the file to upload directory.';
    echo "<script>alert('$message'); location.href='ImportCSV.php'</script>";
}
?>  