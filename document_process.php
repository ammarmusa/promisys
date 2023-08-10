<?php
session_start();
include 'db_conn.php';
if (isset($_POST['upload_doc'])) {
    $id = $_POST['id'];
    $project_no = $_POST['project_no'];
    $date = date('Ymd');
    $user = $_SESSION['shortform'];
    $doc_remark = $_POST['doc_remark'];
    $doc_type = $_POST['doc_type'];

    if ($doc_type == "Data") {
        $folder = 'Data';
    } else if ($doc_type == 'Final Submission') {
        $folder = 'Final_Submission';
    } else if ($doc_type == 'ISO Document') {
        $folder = 'ISO_Document';
    } else if ($doc_type == 'Letter') {
        $folder = 'Letter';
    } else if ($doc_type == 'Quotation') {
        $folder = 'Quotation';
    } else {
        $folder = 'Supporting_Document';
    }

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array(
    'pdf',
    'jpeg',
    'png',
    'jpg',
    'csv',
    'xlsx',
    'doc',
    'docx',
    'kml',
    'shp',
    'xls',
    'kmz',
    'txt',
    'bak',
    'dwg',
    'tif',
    'rar',
'zip');

    // $proj_file_name = substr($proj_no, 7);
    // echo $proj_file_name;


    $file_path = 'project/' . $project_no . '/' . $folder;

    if (!file_exists($file_path)) {

        // Create a new file or direcotry
        mkdir($file_path, 0777, true);
    }

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $fileDestination = $file_path . "/" . $fileName;
                // echo $fileDestination;
                move_uploaded_file($fileTmpName, $fileDestination);
                $save = mysqli_query($conn, "INSERT INTO documents (
                    doc_proj_no,
                    doc_name,
                    doc_remark,
                    doc_path,
                    doc_type,
                    doc_date,
                    doc_upload_by,
                    doc_folder
                ) VALUES (
                    '$project_no',
                    '$fileName',
                    '$doc_remark',
                    '$fileDestination',
                    '$fileActualExt',
                    '$date',
                    '$user',
                    '$doc_type'
                )");
                $_SESSION['status_code'] = 'success';
                $_SESSION['message'] = "Document uploaded!";

                $user = $_SESSION['staff_no'];
                $date = date("Y-m-d H:i:s");
                $log_title = "Add document to " . $project_no;
                $log_status = "Success";
                $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
                $log_result = mysqli_query($conn, $log_sql);
                header('location: project_management.php?id=' . $id);
            } else {
                $_SESSION['status_code'] = 'error';
                $_SESSION['message'] = "Document file is too big!";

                $user = $_SESSION['staff_no'];
                $date = date("Y-m-d H:i:s");
                $log_title = "Add document to " . $project_no;
                $log_status = "Failed";
                $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
                $log_result = mysqli_query($conn, $log_sql);
                header('location: project_management.php?id=' . $id);
            }
        } else {
            $_SESSION['status_code'] = 'error';
            $_SESSION['message'] = "Error occurs!";

            $user = $_SESSION['staff_no'];
            $date = date("Y-m-d H:i:s");
            $log_title = "Add document to " . $project_no;
            $log_status = "Failed";
            $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
            $log_result = mysqli_query($conn, $log_sql);
            header('location: project_management.php?id=' . $id);
        }
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Wrong document format!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add document to " . $project_no;
        $log_status = "Failed";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    }
}

if (isset($_POST['delete_doc'])) {
    $doc_id = $_POST['doc_id'];

    $sql = "DELETE FROM documents WHERE doc_id='$doc_id'";
    $res = mysqli_query($conn, $sql);
}

if (isset($_POST['add_supp_doc'])) {

    $id = $_POST['id'];
    $quot_no = $_POST['proj_no'];
    $remark = $_POST['remark'];

    $user = $_SESSION['shortform'];

    $date = date('Y-m-d');

    $files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
    // Count the number of uploaded files in array
    $total_count = count($_FILES['upload']['name']);


    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        $path = 'quotation/' . $number;
        // print_r($_POST);
        // echo $path;

        if (!is_dir($path)) {
            mkdir($path);
        }

        //A file path needs to be present
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = $path . "/" . $_FILES['upload']['name'][$i];
            echo $newFilePath . "<br>";
            $file_name =  $_FILES['upload']['name'][$i];
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $sql_insert = "INSERT INTO documents (
                    doc_proj_no,
                    doc_name,
                    doc_remark,
                    doc_path,
                    doc_date,
                    doc_upload_by
                ) VALUES (
                    '$quot_no',
                    '$file_name',
                    '$remark',
                    '$newFilePath',
                    '$date',
                    '$user'
                )";

                $insert_res = mysqli_query($conn, $sql_insert);
            }
        }
    }

    $_SESSION['status_code'] = 'success';
    $_SESSION['message'] = "Document uploaded!";

    header('location: quotation_view.php?id=' . $id);
}

if (isset($_POST['upload_form'])) {

    $doc_version = $_POST['doc_version'];

    $user = $_SESSION['shortform'];

    $date = date('Y-m-d');

    $files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
    // Count the number of uploaded files in array
    $total_count = count($_FILES['upload']['name']);


    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        $path = 'form';
        // print_r($_POST);
        // echo $path;

        if (!is_dir($path)) {
            mkdir($path);
        }

        //A file path needs to be present
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = $path . "/" . $_FILES['upload']['name'][$i];
            echo $newFilePath . "<br>";
            $file_name =  $_FILES['upload']['name'][$i];
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $sql_insert = "INSERT INTO documents (
                    doc_name,
                    doc_version,
                    doc_remark,
                    doc_path,
                    doc_date,
                    doc_upload_by
                ) VALUES (
                    '$file_name',
                    '$doc_version',
                    'Form list',
                    '$newFilePath',
                    '$date',
                    '$user'
                )";

                $insert_res = mysqli_query($conn, $sql_insert);
            }
        }
    }

    $_SESSION['status_code'] = 'success';
    $_SESSION['message'] = "Document uploaded!";

    header('location: form_list.php');
}

if(isset($_POST['delete_form'])) {
    $form_id = $_POST['form_id'];

    // $get_name = mysqli_query($conn, "SELECT doc_name FROM documents WHERE doc_id = '$form_id'");
    // while ($gn = mysqli_fetch_assoc($get_name)) {
    //     $file_name = $gn['doc_name'];
    // }

    // echo $file_name;

    // $files = scandir('form');
    // $path = 'trash';
    // echo $files[2];

    // if (!is_dir($path)) {
    //     mkdir($path);
    // }
    // print_r($files);

    $sql = "DELETE FROM documents WHERE doc_id='$form_id'";
    $res = mysqli_query($conn, $sql);
}