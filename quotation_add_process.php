<?php
session_start();
include "db_conn.php";
// if (isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_POST['submit'])) {

$client_id = $_POST['quot_client'];
$retrieve_client = "SELECT * FROM clients WHERE client_id = '$client_id'";
$result_client = mysqli_query($conn, $retrieve_client);
while ($client = mysqli_fetch_assoc($result_client)) {
    $quot_client = $client['client_comp_name'];
    $quot_client_pic = $client['client_pic'];
    $quot_client_phone = $client['client_phone'];
    $quot_client_email = $client['client_email'];
}

$quot_no = $_POST['quot_no'];
$quot_no_inc = $_POST['quot_no_inc'];
$quot_app_date = $_POST['quot_app_date'];
// echo $quot_app_date;
$quot_title = $_POST['quot_title'];
$quot_pic = $_POST['quot_pic'];
$quot_client_type = $_POST['quot_client_type'];
$quot_client_status = $_POST['quot_client_status'];
$quot_work_scope = $_POST['quot_work_scope'];
// $quot_client = $_POST['quot_client'];

$quot_sub_deadline = $_POST['quot_sub_deadline'];
$quot_market_segmentation = $_POST['quot_market_segmentation'];
$quot_proj_duration = $_POST['quot_proj_duration'];
$quot_site_location = $_POST['quot_site_location'];
$quot_amount = $_POST['quot_amount'];

if (isset($_POST['tax'])) {
    $taxed = $quot_amount / 6 / 100;
    $after_tax = $quot_amount - $taxed;
    $quot_amount_tax = round($after_tax, 2);
} else {
    $quot_amount_tax = $quot_amount;
}
$quot_type = $_POST['quot_type'];

$sql = "INSERT INTO quotation (
quot_no,
quot_no_inc,
quot_app_date,
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
'$quot_no',
'$quot_no_inc',
'$quot_app_date',
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

if ($res) {
    $_SESSION['status_code'] = 'success';
    $_SESSION['message'] = "Quotation Added!";

    $user = $_SESSION['staff_no'];
    $log_title = "Added a new quotation " . $quot_no;
    $log_status = "Success";
    $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
    $log_result = mysqli_query($conn, $log_sql);
    header("Location: quotation.php");
} else {
    $_SESSION['status_code'] = 'error';
    $_SESSION['message'] = "Quotation add failed!";

    $user = $_SESSION['staff_no'];
    $log_title = "Added a new quotation ";
    $log_status = "Fail";
    $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
    $log_result = mysqli_query($conn, $log_sql);
    header("Location: quotation.php");
}




// } else {
//     header("Location: quotation.php?=session_error");
// }
