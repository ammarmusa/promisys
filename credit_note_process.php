<?php
session_start();
include "db_conn.php";

if (isset($_POST['submit'])) {
    // print_r($_POST);
    $tot = $_POST['tot'];
    $total = $_POST['total'];
    $id = $_POST['id'];
    $proj_no = $_POST['proj_no'];
    $cn_number = $_POST['cn_number'];
    $cn_amount = $_POST['cn_amount'];
    $cn_remark = $_POST['cn_remark'];

    $sql = "INSERT INTO credit_note (
        cn_proj_no,
        cn_remark,
        cn_amount,
        cn_number
    ) VALUES (
        '$proj_no',
        '$cn_remark',
        '$cn_amount',
        '$cn_number'
    )";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Credit Note is added!";

        $user = $_SESSION['staff_no'];
        $log_title = "Added a new credit note for project " . $proj_no;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header("Location: invoice_view.php?id=" . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed to add Credit Note";

        $user = $_SESSION['staff_no'];
        $log_title = "Added a new quotation ";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header("Location: invoice_view.php?id=" . $id);
    }
}

if (isset($_POST['delete_cn'])) {
    // print_r($_POST);
    $cn_id = $_POST['cn_id'];

    $sql = "DELETE FROM credit_note WHERE cn_id='$cn_id'";
    $res = mysqli_query($conn, $sql);
}
