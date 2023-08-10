<?php
session_start();
include 'db_conn.php';

if (isset($_POST['approve']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $retrieve_data = mysqli_query($conn, "SELECT * FROM quotation WHERE quot_id = '$id'");
    while ($rows = mysqli_fetch_assoc($retrieve_data)) {
        $quot_title = $rows['quot_title'];
        $quot_no = $rows['quot_no'];
        $quot_remark = $rows['quot_remark'];
        $quot_pic = $rows['quot_pic'];
        $quot_sub_deadline = $rows['quot_sub_deadline'];
        $quot_client_type = $rows['quot_client_type'];
        $quot_client_status = $rows['quot_client_status'];
        $quot_work_scope = $rows['quot_work_scope'];
        $quot_client = $rows['quot_client'];
        $quot_client_pic = $rows['quot_client_pic'];
        $quot_client_phone = $rows['quot_client_phone'];
        $quot_client_email = $rows['quot_client_email'];
        $quot_market_segmentation = $rows['quot_market_segmentation'];
        $quot_proj_duration = $rows['quot_proj_duration'];
        $quot_site_location = $rows['quot_site_location'];
        $quot_amount = $rows['quot_amount'];
        $quot_amount_tax = $rows['quot_amount_tax'];
        $quot_type = $rows['quot_type'];
    }

    $project_no = $quot_no;
    // echo $quot_no;
    // echo $project_no;
    $date = date("Y-m-d");
    $quot_remark = $_POST['quot_remark'];

    $result = mysqli_query($conn, "UPDATE quotation SET quot_status='approved', quot_remark='$quot_remark' WHERE quot_no='$project_no'");
    if ($result) {

        $check_data = mysqli_query($conn, "SELECT project_no, project_no_inc FROM project ORDER BY project_no_inc desc");
        if (mysqli_num_rows($check_data) == 0) {
            echo '';
        } else {
            $row = mysqli_fetch_assoc($check_data);
            $lastid = $row['project_no_inc'];
        }

        if (empty($lastid)) {
            $number = substr($project_no, 0, 9);
            $new_proj_no = $number . "J001";
            $id = "001";
        } else {

            $number = explode("Q", $project_no);
            $id = str_pad($lastid + 1, 3, 0, STR_PAD_LEFT);

            $new_proj_no = $number[0] . "J" . $id;
        }


        $sql = "INSERT INTO project (
        project_quot_no,
        project_no,
        project_no_inc,
        project_app_date,
        project_title,
        project_pic,
        project_client_type,
        project_client_status,
        project_work_scope,
        project_client,
        project_client_pic,
        project_client_phone,
        project_client_email,
        project_quot_deadline,
        project_market_segmentation,
        project_duration,
        project_site_location,
        project_amount,
        project_amount_tax,
        project_remark,
        project_status,
        project_type,
        project_update_status,
        project_checklist
        )
        VALUES (
        '$quot_no',
        '$new_proj_no',
        '$id',
        '$date',
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
        '$quot_remark',
        'approved',
        '$quot_type',
        '0',
        '1'
        )";
        $res = mysqli_query($conn, $sql);

        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";
        header('location: securement.php');
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Something went wrong!";
        header('location: quotation.php?');
    }
}

if (isset($_POST['reject'])) {
    $id = $_POST['id'];
    $project_no = $_POST['proj_no'];
    $remark = $_POST['quot_remark'];
    $sql = "UPDATE quotation SET quot_status='rejected', quot_remark='$remark' WHERE quot_id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";
        header("Location: quotation.php");
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Something went wrong!";
        header("Location: quotation.php");
    }
    echo 'Reject' . $project_no;
}
