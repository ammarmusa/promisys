<?php
session_start();
include 'db_conn.php';
if (isset($_POST['securement_delete'])) {
    $securement_id = $_POST['securement_id'];
    $quot_res = mysqli_query($conn, "SELECT s_quot_no FROM securement WHERE s_id = '$securement_id'");
    while ($rows = mysqli_fetch_assoc($quot_res)) {
        $quot_no = $rows['s_quot_no'];
    }
    $sql = "DELETE FROM securement WHERE s_id='$securement_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        mysqli_query($conn, "UPDATE quotation SET quot_status = 'applied', quot_remark = '' WHERE quot_no = '$quot_no'");
    }
}
