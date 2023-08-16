<?php
session_start();
include "db_conn.php";
// if (isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_POST['submit'])) {

if (isset($_POST['add_quotation'])) {

    $apply_date = $_POST['apply_date'];
    $quot_site_location = $_POST['quot_site_location'];
    $quot_branch = $_POST['quot_branch'];
    // $quot_no = $_POST['quot_no'];
    // $quot_no_inc = $_POST['quot_no_inc'];
    // $quot_app_date = $_POST['quot_app_date'];
    // echo $quot_app_date;
    $quot_proj_state = $_POST['project_location'];
    $quot_title = $_POST['quot_title'];
    $quot_pic = $_POST['quot_pic'];
    $quot_client_type = $_POST['quot_client_type'];
    $quot_client_status = $_POST['quot_client_status'];
    $quot_work_scope = $_POST['quot_work_scope'];
    // $quot_client = $_POST['quot_client'];

    $quot_sub_deadline = $_POST['quot_sub_deadline'];
    $quot_market_segmentation = $_POST['quot_market_segmentation'];
    $days = $_POST['days'];
    if ($days == "Day") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Day";
    } else if ($days == "Month") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Month";
    } else if ($days == "Week") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Week";
    } else {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Year";
    }

    $quot_site_location = $_POST['quot_site_location'];
    $quot_amount = $_POST['quot_amount'];

    $year = date("Y", strtotime($apply_date));
    $year2 = date("y", strtotime($apply_date));

    // $sql_by_year = "select * from quotation where year(quot_app_date) = 2020";

    $query = "select * from quotation where year(quot_app_date) = '$year' AND quot_branch = '$quot_branch' order by quot_no_inc desc";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        echo '';
    } else {
        $row = mysqli_fetch_array($result);
        $lastid = $row['quot_no'];
        // $lastid = 'SGS(P).23Q007';
        // echo $lastid;
    }
    if ($quot_branch == "HQ") {
        $code = "";
        // echo strlen($lastid);
        if (empty($lastid)) {
            $number = "SGS" . $code . "." . $year2 . "Q001";
            $id = '001';
        } else {
            if (strlen($lastid) == 10) {
                $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 7);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . "Q" . $id;
            } else {
                $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 10);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . "Q" . $id;
            }
        }
    } else if ($quot_branch == "Pahang") {
        $code = "(C)";
        if (empty($lastid)) {
            $number = "SGS" . $code . "." . $year2 . "Q001";
            $id = '001';
        } else {
            if (strlen($lastid) == 10) {
                $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 7);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . "Q" . $id;
            } else {
                $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 10);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . "Q" . $id;
            }
        }
    } else {
        $code = "(J)";
        if (empty($lastid)) {
            $number = "SGS" . $code . "." . $year2 . "Q001";
            $id = '001';
        } else {
            if (strlen($lastid) == 10) {
                $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 7);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . "Q" . $id;
            } else {
                $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 10);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . "Q" . $id;
            }
        }
    }



    // echo $quot_proj_duration;

    if (isset($_POST['tax'])) {
        $taxed = $quot_amount / 1.06;
        // $after_tax = $quot_amount - $taxed;
        $quot_amount_tax = round($taxed, 2);
    } else {
        $quot_amount_tax = $quot_amount;
    }
    $quot_type = $_POST['quot_type'];

    // Add New Client
    if (isset($_POST['new_client'])) {
        $quot_client = $_POST['client_comp_name'];
        $quot_client_pic = $_POST['client_pic'];
        $quot_client_phone = $_POST['client_phone'];
        $quot_client_email = $_POST['client_email'];
        $quot_client_fax = $_POST['client_fax'];
        $quot_client_address = $_POST['client_address'];

        $sql_insert_client = "INSERT INTO clients (
            client_comp_name,
            client_address,
            client_pic,
            client_phone,
            client_fax,
            client_email
        ) VALUES (
            '$quot_client',
            '$quot_client_address',
            '$quot_client_pic',
            '$quot_client_phone',
            '$quot_client_fax',
            '$quot_client_email'
        )";
        $res_ic = mysqli_query($conn, $sql_insert_client);
        $quot_client = mysqli_insert_id($conn);
    } else {
        $client_id = $_POST['quot_client'];
        $retrieve_client = "SELECT * FROM clients WHERE client_id = '$client_id'";
        $result_client = mysqli_query($conn, $retrieve_client);
        while ($client = mysqli_fetch_assoc($result_client)) {
            $quot_client = $client['client_comp_name'];
            $quot_client_pic = $client['client_pic'];
            $quot_client_phone = $client['client_phone'];
            $quot_client_email = $client['client_email'];
        }
    }

    echo mysqli_insert_id($conn);

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    die;

    $sql = "INSERT INTO quotation (
    quot_no,
    quot_no_inc,
    quot_app_date,
    quot_proj_state,
    quot_branch,
    quot_title,
    quot_pic,
    quot_client_type,
    quot_client_status,
    quot_work_scope,
    quot_client,
    quot_client_pic,
    quot_client_phone,
    quot_client_email,
    quot_sub_deadline,
    quot_market_segmentation,
    quot_proj_duration,
    quot_site_location,
    quot_amount,
    quot_amount_tax,
    quot_status,
    quot_type
    )
    VALUES (
    '$number',
    '$id',
    '$apply_date',
    '$quot_proj_state',
    '$quot_branch',
    '$quot_title',
    '$quot_pic',
    '$quot_client_type',
    '$quot_client_status',
    '$quot_work_scope',
    '$quot_client',
    '$quot_client_pic',
    '$quot_client_phone',
    '$quot_client_email',
    '$quot_sub_deadline',
    '$quot_market_segmentation',
    '$quot_proj_duration',
    '$quot_site_location',
    '$quot_amount',
    '$quot_amount_tax',
    'applied',
    '$quot_type'
    )";
    $res = mysqli_query($conn, $sql);

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
                    '$number',
                    '$file_name',
                    'Supporting files.',
                    '$newFilePath',
                    '$apply_date',
                    '$quot_pic'
                )";

                $insert_res = mysqli_query($conn, $sql_insert);
            }
        }
    }

    if ($res) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Quotation Added!";

        $user = $_SESSION['staff_no'];
        $log_title = "Added a new quotation " . $number;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header("Location: quotation.php");
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Quotation add failed!";

        $user = $_SESSION['staff_no'];
        $log_title = "Added a new quotation";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header("Location: quotation.php");
    }
}

// UPDATE
if (isset($_POST['quotation_update'])) {
    $client_id = $_POST['quot_client'];
    $client = "SELECT * FROM clients WHERE client_id = '$client_id'";
    $client_res = mysqli_query($conn, $client);
    while ($rowc = mysqli_fetch_assoc($client_res)) {
        $quot_client = $rowc['client_comp_name'];
    }
    $quot_app_date = $_POST['apply_date'];
    $quot_proj_state = $_POST['project_location'];
    $quot_branch = $_POST['quot_branch'];
    $quot_id = $_POST['quot_id'];
    $quot_title = $_POST['quot_title'];
    $quot_pic = $_POST['quot_pic'];
    $quot_client_type = $_POST['quot_client_type'];
    $quot_client_status = $_POST['quot_client_status'];
    $quot_work_scope = $_POST['quot_work_scope'];
    // $quot_client = $_POST['quot_client'];
    $quot_client_pic = $_POST['quot_client_pic'];
    $quot_client_phone = $_POST['quot_client_phone'];
    $quot_client_email = $_POST['quot_client_email'];
    $quot_sub_deadline = $_POST['quot_sub_deadline'];
    $quot_market_segmentation = $_POST['quot_market_segmentation'];
    $days = $_POST['days'];
    if ($days == "Day") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Day";
    } else if ($days == "Month") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Month";
    } else if ($days == "Week") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Week";
    } else {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Year";
    }
    $quot_site_location = $_POST['quot_site_location'];
    $quot_amount = $_POST['quot_amount'];
    if (isset($_POST['tax'])) {
        $taxed = $quot_amount / 1.06;
        // $after_tax = $quot_amount - $taxed;
        $quot_amount_tax = round($taxed, 2);
    } else {
        $quot_amount_tax = $quot_amount;
    }
    $quot_type = $_POST['quot_type'];

    $sql = "UPDATE quotation SET 
        quot_app_date = '$quot_app_date',
        quot_proj_state = '$quot_proj_state',
        quot_title = '$quot_title',
        quot_pic = '$quot_pic',
        quot_client_type = '$quot_client_type',
        quot_client_status = '$quot_client_status',
        quot_work_scope = '$quot_work_scope',
        quot_client = '$quot_client',
        quot_client_pic = '$quot_client_pic',
        quot_client_phone = '$quot_client_phone',
        quot_client_email = '$quot_client_email',
        quot_sub_deadline = '$quot_sub_deadline',
        quot_market_segmentation = '$quot_market_segmentation',
        quot_proj_duration = '$quot_proj_duration',
        quot_site_location = '$quot_site_location',
        quot_amount = '$quot_amount',
        quot_amount_tax = '$quot_amount_tax',
        quot_type = '$quot_type'
    WHERE quot_id='$quot_id'";

    $update_result = mysqli_query($conn, $sql);
    if ($update_result) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Quotation successfully updated!";
        header('location: quotation_view.php?id=' . $quot_id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Error";
        header('location: quotation_view.php?id=' . $quot_id);
    }
}

if (isset($_POST['test'])) {
    print_r($_POST);
    $files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
    // Count the number of uploaded files in array
    $total_count = count($_FILES['upload']['name']);

    $quot_no = "SGS(J).23M001";

    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        $path = 'quotation/' . $quot_no;
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
            //File is uploaded to temp dir
            // if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            //     // Other code goes here
            //     echo "Success";
            // }
        }
    }
}

if (isset($_POST['add_direct_award'])) {
    $branch = $_POST['quot_branch'];
    $project_location = $_POST['project_location'];
    // echo $project_location;
    if ($project_location == 'Johor') {
        $word = 'J';
    } elseif ($project_location == 'Perak') {
        $word = 'A';
    } elseif ($project_location == 'Selangor') {
        $word = 'B';
    } elseif ($project_location == 'Pahang') {
        $word = 'C';
    } elseif ($project_location == 'Kelantan') {
        $word = 'D';
    } elseif ($project_location == 'Kedah') {
        $word = 'K';
    } elseif ($project_location == 'Melaka') {
        $word = 'M';
    } elseif ($project_location == 'Negeri Sembilan') {
        $word = 'N';
    } elseif ($project_location == 'Pulau Pinang') {
        $word = 'P';
    } elseif ($project_location == 'Perlis') {
        $word = 'R';
    } elseif ($project_location == 'Terengganu') {
        $word = 'T';
    } elseif ($project_location == 'Kuala Lumpur') {
        $word = 'V';
    } elseif ($project_location == 'Sarawak') {
        $word = 'Q';
    } elseif ($project_location == 'Sabah') {
        $word = 'S';
    } else {
        // header('location: quotation.php?=State+Not+Exist');
    }

    $award_date = $_POST['s_award_date'];
    $year = date("Y", strtotime($award_date));
    $year2 = date("y", strtotime($award_date));

    // Check for securement running number

    $check_data = mysqli_query($conn, "SELECT s_proj_no, s_no_inc FROM securement WHERE year(s_award_date) = '$year' AND s_branch = '$branch' ORDER BY s_no_inc desc");
    if (mysqli_num_rows($check_data) == 0) {
        echo '';
    } else {
        $row = mysqli_fetch_assoc($check_data);
        $lastid = $row['s_proj_no'];
    }

    if ($branch == "HQ") {
        $code = "";
        // echo strlen($lastid);
        if (empty($lastid)) {
            $number = "SGS" . $code . "." . $year2 . $word . "001";
            $id = '001';
        } else {
            if (strlen($lastid) == 10) {
                $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 7);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . $word . $id;
                // echo $number;
            } else {
                // echo $lastid . "<br>";
                // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                // echo $idd . "<br>";
                $idd = substr($lastid, 10);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . $word . $id;
            }
        }
        echo $number;
    } else if ($branch == "Pahang") {
        $code = "(C)";
        if (empty($lastid)) {
            $number = "SGS" . $code . "." . $year2 . $word . "001";
            $id = '001';
            echo $number . "asdasd";
        } else {
            if (strlen($lastid) == 10) {
                // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 7);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);

                $number = "SGS" . $code . "." . $year2 . $word . $id;
            } else {
                // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 10);
                echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                echo $id;
                $number = "SGS" . $code . "." . $year2 . $word . $id;
            }
        }
    } else {
        $code = "(J)";
        if (empty($lastid)) {
            $number = "SGS" . $code . "." . $year2 . $word . "001";
            $id = '001';
        } else {
            if (strlen($lastid) == 10) {
                // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 7);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . $word . $id;
            } else {
                // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 10);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . $word . $id;
            }
        }
    }

    // echo $number;
    // echo "<br>" . $id;
    // die;

    $client_id = $_POST['quot_client'];
    $retrieve_client = "SELECT * FROM clients WHERE client_id = '$client_id'";
    $result_client = mysqli_query($conn, $retrieve_client);
    while ($client = mysqli_fetch_assoc($result_client)) {
        $quot_client = $client['client_comp_name'];
        $quot_client_pic = $client['client_pic'];
        $quot_client_phone = $client['client_phone'];
        $quot_client_email = $client['client_email'];
    }

    $quot_client_type = $_POST['quot_client_type'];
    $quot_client_status = $_POST['quot_client_status'];
    $quot_title = $_POST['quot_title'];
    $quot_no = uniqid();
    $proj_code = $_POST['s_proj_code'];
    $proj_pic = $_POST['s_proj_pic'];
    $proj_deadline = $_POST['s_proj_deadline'];
    $quot_market_segmentation = $_POST['quot_market_segmentation'];
    $quot_site_location = $_POST['quot_site_location'];
    $quot_work_scope = $_POST['quot_work_scope'];

    $days = $_POST['days'];
    if ($days == "Day") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Day";
    } else if ($days == "Month") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Month";
    } else if ($days == "Week") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Week";
    } else {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Year";
    }

    $quot_amount = $_POST['quot_amount'];

    if (isset($_POST['tax'])) {
        $taxed = $quot_amount / 1.06;
        // $after_tax = $quot_amount - $taxed;
        $quot_amount_tax = round($taxed, 2);
    } else {
        $quot_amount_tax = $quot_amount;
    }

    $quot_type = $_POST['quot_type'];

    $sql = "INSERT INTO securement (
        s_award_date,
        s_quot_no,
        s_proj_no,
        s_branch,
        s_proj_code,
        s_proj_pic,
        s_proj_deadline,
        s_status,
        s_no_inc
    ) VALUES (
        '$award_date',
        '$quot_no',
        '$number',
        '$branch',
        '$proj_code',
        '$proj_pic',
        '$proj_deadline',
        'pending',
        '$id'
    )";

    $result = mysqli_query($conn, $sql);

    $sql2 = "INSERT INTO quotation (
        quot_no,
        quot_type,
        quot_branch,
        quot_title,
        quot_market_segmentation,
        quot_site_location,
        quot_work_scope,
        quot_proj_duration,
        quot_amount,
        quot_amount_tax,
        quot_client,
        quot_client_pic,
        quot_client_phone,
        quot_client_email,
        quot_client_type,
        quot_client_status
    ) VALUES (
        '$quot_no',
        '$quot_type',
        '$branch',
        '$quot_title',
        '$quot_market_segmentation',
        '$quot_site_location',
        '$quot_work_scope',
        '$quot_proj_duration',
        '$quot_amount',
        '$quot_amount_tax',
        '$quot_client',
        '$quot_client_pic',
        '$quot_client_phone',
        '$quot_client_email',
        '$quot_client_type',
        '$quot_client_status'
    )";

    $result2 = mysqli_query($conn, $sql2);

    $_SESSION['status_code'] = 'success';
    $_SESSION['message'] = "Success!";

    $user = $_SESSION['staff_no'];
    $log_title = "Direct award added : " . $number;
    $log_status = "Success";
    $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
    $log_result = mysqli_query($conn, $log_sql);
    header('location: securement.php');
}
