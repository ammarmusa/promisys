<?php
session_start();
include "db_conn.php";

if (isset($_POST['quotation_update'])) {
    $client_id = $_POST['quot_client'];
    $client = "SELECT * FROM clients WHERE client_id = '$client_id'";
    $client_res = mysqli_query($conn, $client);
    while ($rowc = mysqli_fetch_assoc($client_res)) {
        $quot_client = $rowc['client_comp_name'];
    }

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
    $quot_proj_duration = $_POST['quot_proj_duration'];
    $quot_site_location = $_POST['quot_site_location'];
    $quot_amount = $_POST['quot_amount'];
    if (isset($_POST['tax'])) {
        $taxed = $quot_amount * 6 / 100;
        $after_tax = $quot_amount - $taxed;
        $quot_amount_tax = round($after_tax, 2);
    } else {
        $quot_amount_tax = $quot_amount;
    }
    $quot_type = $_POST['quot_type'];

    $sql = "UPDATE quotation SET 
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
