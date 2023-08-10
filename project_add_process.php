<?php
session_start();
include "db_conn.php";

if (isset($_POST['save_securement'])) {
    // securement id
    $id = $_POST['id'];
    $client_id = $_POST['project_client'];
    $client = "SELECT * FROM clients WHERE client_id = '$client_id'";
    $client_res = mysqli_query($conn, $client);
    while ($rowc = mysqli_fetch_assoc($client_res)) {
        $quot_client = $rowc['client_comp_name'];
    }
    $quot_proj_no = $_POST['quot_proj_no'];
    $quot_proj_title = $_POST['quot_proj_title'];
    $quot_market_segmentation = $_POST['quot_market_segmentation'];
    $quot_site_location = $_POST['quot_site_location'];
    $quot_work_scope = $_POST['quot_work_scope'];
    $days = $_POST['days'];
    if ($days == "Day") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Day";
    } else if ($days == "Month") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Month";
    } else {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Year";
    }
    $quot_amount = $_POST['quot_amount'];
    if (isset($_POST['tax'])) {
        $taxed = $quot_amount * 6 / 100;
        $after_tax = $quot_amount - $taxed;
        $quot_amount_tax = round($after_tax, 2);
    } else {
        $quot_amount_tax = $quot_amount;
    }
    $quot_client_type = $_POST['quot_client_type'];
    $quot_client_status = $_POST['quot_client_status'];
    $quot_client_pic = $_POST['quot_client_pic'];
    $quot_client_phone = $_POST['quot_client_phone'];
    $quot_client_email = $_POST['quot_client_email'];


    $s_proj_code = $_POST['s_proj_code'];
    $s_proj_pic = $_POST['s_proj_pic'];
    $quot_no = $_POST['quot_no'];

    print_r($_POST);

    $s_sql = "UPDATE securement SET
        s_proj_code = '$s_proj_code', 
        s_proj_pic = '$s_proj_pic'
        WHERE s_id = '$id'
    ";
    $s_result = mysqli_query($conn, $s_sql);


    // if (mysqli_num_rows($get_quot_id) > 0) {
    //     echo $quot_no . " Has data";
    // } else {
    //     echo $quot_no . " No data";
    // }

    // echo $quot_id;

    if ($s_result) {
        $get_quot_id = mysqli_query($conn, "SELECT quot_id FROM quotation WHERE quot_no = '$quot_no'");
        while ($gqi = mysqli_fetch_assoc($get_quot_id)) {
            $quot_id = $gqi['quot_id'];
        }
        $sql = "UPDATE quotation SET 
                quot_title = '$quot_proj_title',
                quot_client_type = '$quot_client_type',
                quot_client_status = '$quot_client_status',
                quot_work_scope = '$quot_work_scope',
                quot_client = '$quot_client',
                quot_client_pic = '$quot_client_pic',
                quot_client_phone = '$quot_client_phone',
                quot_client_email = '$quot_client_email',
                quot_market_segmentation = '$quot_market_segmentation',
                quot_proj_duration = '$quot_proj_duration',
                quot_site_location = '$quot_site_location',
                quot_amount = '$quot_amount',
                quot_amount_tax = '$quot_amount_tax'
                WHERE quot_id='$quot_id'";
        $result = mysqli_query($conn, $sql);

        $date = date('Y-m-d');
        $payment_sql = mysqli_query($conn, "INSERT INTO payments (
            payment_proj_no,
            payment_tot_amt,
            payment_client,
            payment_date
        ) VALUES (
            '$quot_proj_no',
            '$quot_amount',
            '$quot_client',
            '$date'
        )");

        $sql2 = "INSERT INTO manage (
            manage_proj_no,
            manage_date,
            manage_by,
            manage_status
        ) VALUES (
            '$quot_proj_no',
            '$date',
            '$s_proj_pic',
            '1'
        )";

        // Create folder if not exist
        if (!file_exists('project/' . $quot_proj_no)) {
            mkdir('project/' . $quot_proj_no, 0777, true);
        }

        $res2 = mysqli_query($conn, $sql2);
        if (!$res2) {
            header('location: securement.php?=Manage+Failed');
        }
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Sucessfully saved!";
        header('location: securement.php');
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Error";
        header('location: securement.php');
    }
}

if (isset($_POST['update_securement'])) {
    // securement id
    $id = $_POST['id'];
    $client_id = $_POST['project_client'];
    $client = "SELECT * FROM clients WHERE client_id = '$client_id'";
    $client_res = mysqli_query($conn, $client);
    while ($rowc = mysqli_fetch_assoc($client_res)) {
        $quot_client = $rowc['client_comp_name'];
    }
    $quot_proj_no = $_POST['quot_proj_no'];
    $quot_proj_title = $_POST['quot_proj_title'];
    $quot_market_segmentation = $_POST['quot_market_segmentation'];
    $quot_site_location = $_POST['quot_site_location'];
    $quot_work_scope = $_POST['quot_work_scope'];
    $days = $_POST['days'];
    if ($days == "Day") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Day";
    } else if ($days == "Month") {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Month";
    } else {
        $quot_proj_duration = $_POST['quot_proj_duration'] . " Year";
    }
    $quot_amount = $_POST['quot_amount'];
    if (isset($_POST['tax'])) {
        $taxed = $quot_amount * 6 / 100;
        $after_tax = $quot_amount - $taxed;
        $quot_amount_tax = round($after_tax, 2);
    } else {
        $quot_amount_tax = $quot_amount;
    }
    $quot_client_type = $_POST['quot_client_type'];
    $quot_client_status = $_POST['quot_client_status'];
    $quot_client_pic = $_POST['quot_client_pic'];
    $quot_client_phone = $_POST['quot_client_phone'];
    $quot_client_email = $_POST['quot_client_email'];


    $s_proj_code = $_POST['s_proj_code'];
    $s_proj_pic = $_POST['s_proj_pic'];
    $quot_no = $_POST['quot_no'];

    print_r($_POST);

    $s_sql = "UPDATE securement SET
        s_proj_code = '$s_proj_code', 
        s_proj_pic = '$s_proj_pic'
        WHERE s_id = '$id'
    ";
    $s_result = mysqli_query($conn, $s_sql);


    // if (mysqli_num_rows($get_quot_id) > 0) {
    //     echo $quot_no . " Has data";
    // } else {
    //     echo $quot_no . " No data";
    // }

    // echo $quot_id;

    if ($s_result) {
        $get_quot_id = mysqli_query($conn, "SELECT quot_id FROM quotation WHERE quot_no = '$quot_no'");
        while ($gqi = mysqli_fetch_assoc($get_quot_id)) {
            $quot_id = $gqi['quot_id'];
        }
        $sql = "UPDATE quotation SET 
                quot_title = '$quot_proj_title',
                quot_client_type = '$quot_client_type',
                quot_client_status = '$quot_client_status',
                quot_work_scope = '$quot_work_scope',
                quot_client = '$quot_client',
                quot_client_pic = '$quot_client_pic',
                quot_client_phone = '$quot_client_phone',
                quot_client_email = '$quot_client_email',
                quot_market_segmentation = '$quot_market_segmentation',
                quot_proj_duration = '$quot_proj_duration',
                quot_site_location = '$quot_site_location',
                quot_amount = '$quot_amount',
                quot_amount_tax = '$quot_amount_tax'
                WHERE quot_id='$quot_id'";
        $result = mysqli_query($conn, $sql);
    } else {
        echo "error";
    }

    $update_result = mysqli_query($conn, $sql);
    if ($update_result) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Sucessfully updated!";
        header('location: securement.php');
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Error";
        header('location: securement.php');
    }
}
