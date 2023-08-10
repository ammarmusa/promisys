<?php
session_start();
include 'db_conn.php';
if (isset($_POST['securement_delete'])) {
    $securement_no = $_POST['securement_no'];
    $quot_res = mysqli_query($conn, "SELECT s_quot_no, s_proj_no FROM securement WHERE s_id = '$securement_no'");
    while ($rows = mysqli_fetch_assoc($quot_res)) {
        $quot_no = $rows['s_quot_no'];
        $project_no = $rows['s_proj_no'];
    }
    $sql = "DELETE FROM securement WHERE s_id='$securement_no'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        // mysqli_query($conn, "DELETE FROM manage WHERE manage_proj_no='$project_nom'");
        mysqli_query($conn, "UPDATE quotation SET quot_status = 'applied' WHERE quot_no = '$quot_no'");
        mysqli_query($conn, "DELETE FROM payments WHERE payment_proj_no = '$project_no'");
        $user = $_SESSION['staff_no'];
        $log_title = "Delete securement : ".$project_no;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    }
}
