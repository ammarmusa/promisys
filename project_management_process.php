<?php
session_start();
include "db_conn.php";

if (isset($_POST['change_status'])) {
    $project_id = $_POST['project_id'];
    $proj = mysqli_query($conn, "SELECT project_no FROM project WHERE project_id ='$project_id'");
    while ($pr = mysqli_fetch_assoc($proj)) {
        $proj_no = $pr['project_no'];
    }

    $sql = "UPDATE project SET project_status='completed' WHERE project_id='$project_id'";
    $res = mysqli_query($conn, $sql);

    $sql2 = "UPDATE manage SET manage_status='2' WHERE manage_proj_no='$proj_no'";
    $res2 = mysqli_query($conn, $sql2);

    if ($res) {
        $user = $_SESSION['staff_no'];
        $date_log = date("Y-m-d H:i:s");
        $log_title = "Change status for project " . $proj_no;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date_log','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    } else {
        $user = $_SESSION['staff_no'];
        $date_log = date("Y-m-d H:i:s");
        $log_title = "Change status for project " . $proj_no;
        $log_status = "Failed";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date_log','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    }
}
