<?php
session_start();
include 'db_conn.php';
if (isset($_POST['submit'])) {
    // print_r($_POST);
    $id = $_POST['id'];
    $tot = $_POST['tot'];
    $total = $_POST['total'];
    $pd_amount = $_POST['pd_amount'];
    $check = $tot + $pd_amount;
    // echo $check . " " . $total;
    if ($check <= $total) {
        $res = mysqli_query($conn, "SELECT payment_proj_no FROM payments WHERE payment_id = '$id'");
        while ($rows = mysqli_fetch_assoc($res)) {
            $project_no = $rows['payment_proj_no'];
        }
        // echo $project_no;

        $pd_title = $_POST['pd_title'];
        $pd_amount = $_POST['pd_amount'];
        // $pd_remark = $_POST['pd_remark'];
        $date = date('Ymd');

        $sql = "INSERT INTO project_deliver (pd_proj_no, pd_amount, status, pd_date)
        VALUES
        ('$project_no', '$pd_amount', 'unpaid', '$date')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $user = $_SESSION['staff_no'];
            $date_log = date("Y-m-d H:i:s");
            $log_title = "Request invoice for " . $project_no;
            $log_status = "Success";
            $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date_log','$log_status')";
            $log_result = mysqli_query($conn, $log_sql);

            $_SESSION['status_code'] = 'success';
            $_SESSION['message'] = "Success!";
            header('location: invoice_view.php?id=' . $id);
        } else {
            $user = $_SESSION['staff_no'];
            $date_log = date("Y-m-d H:i:s");
            $log_title = "Request invoice for " . $project_no;
            $log_status = "Failed";
            $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date_log','$log_status')";
            $log_result = mysqli_query($conn, $log_sql);

            $_SESSION['status_code'] = 'error';
            $_SESSION['message'] = "Error!";
            header('location: invoice_view.php?id=' . $id);
        }
    } else {
        $diff = $check - $total;
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Your total fee is exceed by RM " . number_format($diff, 2);
        header('location: invoice_view.php?id=' . $id);
    }
}
