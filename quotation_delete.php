<?php
session_start();
include 'db_conn.php';
if (isset($_POST['quotation_delete'])) {
    $quotation_id = $_POST['quotation_id'];
    // $quotation_id = "7";

    $quot_no = mysqli_query($conn, "SELECT quot_no from quotation WHERE quot_id = '$quotation_id'");
    while ($qn = mysqli_fetch_assoc($quot_no)) {
        $quot_number = $qn['quot_no'];
    }

    $secure_id = mysqli_query($conn, "SELECT s_id FROM securement WHERE s_quot_no = '$quot_number'");
    while ($si = mysqli_fetch_assoc($secure_id)) {
        $s_id = $si['s_id'];
    }
    $sql_2 = "DELETE FROM securement WHERE s_id='$s_id'";
    $res_2 = mysqli_query($conn, $sql_2);

    $sql_3 = "DELETE FROM action WHERE action_proj_no='$quot_number'";
    $res_3 = mysqli_query($conn, $sql_3);

    $sql = "DELETE FROM quotation WHERE quot_id='$quotation_id'";
    $res = mysqli_query($conn, $sql);
}
