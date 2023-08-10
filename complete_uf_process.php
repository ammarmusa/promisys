<?php
session_start();
include 'db_conn.php';
if (isset($_POST['complete_register'])) {
    $staff_no = $_POST['staff_no'];
    $full_name = strtoupper($_POST['full_name']);
    $ic_num = $_POST['ic_num'];
    $email = $_POST['email'];
    $initial = strtoupper($_POST['initial']);
    $department = strtoupper($_POST['department']);
    $title = strtoupper($_POST['title']);
    $password = md5($_POST['password']);

    $check_staff_no = mysqli_query($conn, "SELECT shortform FROM users WHERE staff_no = '$staff_no'");
    while ($rows = mysqli_fetch_assoc($check_staff_no)) {
        $shortform = $rows['shortform'];
    }
    if ($shortform != '') {
        session_unset();
        session_destroy();
        header("Location:login.php?error=Staff already registered!");
    } else {
        $sql = "UPDATE staff SET staff_name = '$full_name',
            staff_initial = '$initial',
            staff_title = '$title',
            staff_department = '$department',
            staff_ic = '$ic_num' WHERE staff_number = '$staff_no'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql_2 = "UPDATE users SET password = '$password', email = '$email', shortform = '$initial' WHERE staff_no = '$staff_no'";
            $result_2 = mysqli_query($conn, $sql_2);
            session_unset();
            session_destroy();
            header("Location: login.php?error=Please relogin");
        } else {
            session_unset();
            session_destroy();
            header("Location: login.php?error=Error occured during registration");
        }
    }
}
