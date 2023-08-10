<?php
session_start();
include "db_conn.php";

if (isset($_POST['delete_invoice_set'])) {
    $invoice_id = $_POST['invoice_id'];

    $sql = "DELETE FROM project_deliver WHERE pd_id='$invoice_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $user = $_SESSION['staff_no'];
        $log_title = "Delete invoice";
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    } else {
        $user = $_SESSION['staff_no'];
        $log_title = "Delete invoice";
        $log_status = "Failed";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    }
}

if (isset($_POST['update_invoice_set'])) {
    $ids = $_POST['ids'];
    $id = $_POST['id'];
    $paid_amount = $_POST['paid_amount'];
    $date = date("Y-m-d", strtotime($_POST['pd_receive_date']));
    print_r($paid_amount);

    $sql = "UPDATE project_deliver SET status='paid', pd_amount_received='$paid_amount', pd_receive_date='$date' WHERE pd_id='$ids'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Payment updated!";
        header('location: invoice_view.php?id=' . $id . '&ids=' . $ids);

        $user = $_SESSION['staff_no'];
        $log_title = "Payment receive for " . $proj_no;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Payment update failed!";

        $user = $_SESSION['staff_no'];
        $log_title = "Payment receive for " . $proj_no;
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: invoice_view.php?id=' . $id . '&ids=' . $ids);
    }
}

if (isset($_POST['upload_invoice'])) {
    $id = $_POST['id'];
    $ids = $_POST['ids'];
    $project = $_POST['pd_proj_no'];
    $pdf = $_FILES['pdf']['name'];
    // echo $pdf;
    $pdf_type = $_FILES['pdf']['type'];
    $pdf_size = $_FILES['pdf']['size'];
    $pdf_tem_loc = $_FILES['pdf']['tmp_name'];

    $path = 'project/' . $project . '/invoice/';
    // print_r($_POST);
    // echo $path;

    if (!is_dir($path)) {
        mkdir($path);
    }

    $pdf_store = $path . $pdf;
    // echo $ids;

    move_uploaded_file($pdf_tem_loc, $pdf_store);

    $project = $_POST['pd_proj_no'];

    $paid_amount = $_POST['paid_amount'];

    print_r($paid_amount);

    $date = date("Y-m-d");
    $pd_invoice_no = $_POST['pd_invoice_no'];

    $check_if_exist = mysqli_query($conn, "SELECT pd_invoice_no FROM project_deliver WHERE pd_invoice_no='$pd_invoice_no'");
    if(mysqli_num_rows($check_if_exist) != 0) {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Invoice already exist!";
        header('location: invoice_view.php?id=' . $id);
    } else {
        $sql = "UPDATE project_deliver SET pd_invoice='$pdf', pd_invoice_no='$pd_invoice_no', pd_receive_date = '$date' WHERE pd_id='$ids'";
        $query = mysqli_query($conn, $sql);
    
        if ($query) {
            $_SESSION['status_code'] = 'success';
            $_SESSION['message'] = "Invoice Added!";
            header('location: invoice_view.php?id=' . $id);
    
            $user = $_SESSION['staff_no'];
            $log_title = "Upload invoice for " . $project;
            $log_status = "Success";
            $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
            $log_result = mysqli_query($conn, $log_sql);
        } else {
            $_SESSION['status_code'] = 'error';
            $_SESSION['message'] = "Invoice add failed!";
    
            $user = $_SESSION['staff_no'];
            $log_title = "Upload invoice for" . $project;
            $log_status = "Fail";
            $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
            $log_result = mysqli_query($conn, $log_sql);
            header('location: invoice_view.php?id=' . $id);
        }
    }
}
