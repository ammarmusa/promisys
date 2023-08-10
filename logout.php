<?php
session_start();
include 'db_conn.php';
// $user = $_SESSION['staff_no'];
// $log_title = "Logged out";
// $log_status = "Success";
// $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
// $log_result = mysqli_query($conn, $log_sql);
session_unset();
session_destroy();

header("Location: login.php");
