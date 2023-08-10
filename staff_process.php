<?php
session_start();
include 'db_conn.php';
if (isset($_POST['add_promisys'])) {
    if (isset($_POST['special_role'])) {
        $special = "true";
    } else {
        $special = "false";
    }
    $id = $_POST['id'];
    $staff_no = $_POST['staff_no'];
    $role = $_POST['role'];
    $staff_initial = $_POST['staff_initial'];
    if ($_POST['staff_ic'] == '') {
        $staff_ic = 'password_1';
    } else {
        $staff_ic = $_POST['staff_ic'];
    }
    $name = $_POST['staff_name'];

    $password = md5($staff_ic);

    $sql = "INSERT INTO users (
        staff_no,
        role,
        username,
        password,
        name,
        shortform,
        special
    ) VALUES (
        '$staff_no',
        '$role',
        '$staff_no',
        '$password',
        '$name',
        '$staff_initial',
        '$special'
    )";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Staff Registered!";

        // $user = $_SESSION['staff_no'];
        // $date = date("Y-m-d H:i:s");
        // $log_title = "Added a new quotation " . $quot_no;
        // $log_status = "Success";
        // $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        // $log_result = mysqli_query($conn, $log_sql);
        // header("Location: quotation.php");
        header("Location: admin_view_staff.php?id=" . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed to Register!";
        header("Location: admin_view_staff.php?id=" . $id);
    }
}

if (isset($_POST['update_password'])) {
    $password = $_POST['password'];
    $hashed_password = md5($password);
    $staff = $_SESSION['staff_no'];

    echo $password . " " . $staff . " " . $hashed_password;

    $sql = "UPDATE users SET password = '$hashed_password' WHERE staff_no = '$staff'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        session_unset();
        session_destroy();

        header("Location: login.php?error=Password reseted. Please relogin");
    } else {

        header("Location: user_profile.php");
    }
}

if (isset($_POST['save_staff'])) {

    $staff_number = mysqli_real_escape_string($conn, strtoupper($_POST['staff_number']));
    $staff_name = mysqli_real_escape_string($conn, $_POST['staff_name']);
    $staff_initial = mysqli_real_escape_string($conn, strtoupper($_POST['staff_initial']));
    $staff_title = mysqli_real_escape_string($conn, $_POST['staff_title']);
    $staff_department = mysqli_real_escape_string($conn, $_POST['staff_department']);
    $staff_ic = mysqli_real_escape_string($conn, $_POST['staff_ic']);
    $staff_email = mysqli_real_escape_string($conn, $_POST['staff_email']);
    $staff_address = mysqli_real_escape_string($conn, $_POST['staff_address']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $staff_type = mysqli_real_escape_string($conn, $_POST['staff_type']);
    // $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
    // $bank_acc_no = mysqli_real_escape_string($conn, $_POST['bank_acc_no']);
    // $employee_epf_no = mysqli_real_escape_string($conn, $_POST['employee_epf_no']);
    // $employee_income_tax_no = mysqli_real_escape_string($conn, $_POST['employee_income_tax_no']);
    // $status = mysqli_real_escape_string($conn, $_POST['staff_status']);

    $query_check = "SELECT * from staff where staff_number = '$staff_number'";
    $query_check_run = mysqli_query($conn, $query_check);
    if (mysqli_fetch_array($query_check_run) > 0) {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Staff already exists! " . $staff_number;
        header("Location: admin_staff.php");
        exit(0);
    } else {
        $query = "INSERT INTO staff (branch,
                                    staff_type,
                                    staff_number,
                                    staff_name,
                                    staff_title,
                                    staff_department,
                                    staff_initial,
                                    staff_ic,
                                    -- employee_epf_no,
                                    -- employee_income_tax_no,
                                    staff_address,
                                    staff_email
                                    -- bank_name,
                                    -- bank_acc_no
                                        ) 

                            VALUES (    '$branch',
                                '$staff_type',
                                '$staff_number',
                                '$staff_name',
                                '$staff_title',
                                '$staff_department',
                                '$staff_initial',
                                '$staff_ic',
                                -- '$employee_epf_no',
                                -- '$employee_income_tax_no',
                                '$staff_address',
                                '$staff_email'
                                -- '$bank_name',
                                -- '$bank_acc_no'
                                )";

        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['status_code'] = 'success';
            $_SESSION['message'] = "Staff added successfully!";
            header("Location: admin_staff.php");
            exit(0);
        } else {
            $_SESSION['status_code'] = 'error';
            $_SESSION['message'] = "Process unsucessful!";
            header("Location: staff_add.php");
            exit(0);
        }
    }
}

if (isset($_POST['update_staff'])) {

    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $staff_number = mysqli_real_escape_string($conn, strtoupper($_POST['staff_number']));
    $staff_name = mysqli_real_escape_string($conn, $_POST['staff_name']);
    $staff_initial = mysqli_real_escape_string($conn, strtoupper($_POST['staff_initial']));
    $staff_title = mysqli_real_escape_string($conn, $_POST['staff_title']);
    $staff_department = mysqli_real_escape_string($conn, $_POST['staff_department']);
    $staff_ic = mysqli_real_escape_string($conn, $_POST['staff_ic']);
    $staff_email = mysqli_real_escape_string($conn, $_POST['staff_email']);
    $staff_address = mysqli_real_escape_string($conn, $_POST['staff_address']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    // $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
    // $bank_acc_no = mysqli_real_escape_string($conn, $_POST['bank_acc_no']);
    // $employee_epf_no = mysqli_real_escape_string($conn, $_POST['employee_epf_no']);
    // $employee_income_tax_no = mysqli_real_escape_string($conn, $_POST['employee_income_tax_no']);

    $query = "UPDATE staff SET 
                        branch = '$branch',
                        staff_number = '$staff_number',
                        staff_name = '$staff_name',
                        staff_title = '$staff_title',
                        staff_department = '$staff_department',
                        staff_initial = '$staff_initial',
                        staff_ic = '$staff_ic',
                        -- employee_epf_no = '$employee_epf_no',
                        -- employee_income_tax_no = '$employee_income_tax_no',
                        staff_address = '$staff_address',
                        staff_email = '$staff_email'
                        -- bank_name = '$bank_name',
                        -- bank_acc_no = '$bank_acc_no'
                WHERE id='$staff_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Staff updated successfully!";
        header("Location: admin_view_staff.php?id=" . $staff_id);
        exit(0);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Process unsucessful!";
        header("Location: admin_view_staff.php?id=" . $staff_id);
        exit(0);
    }
}

if (isset($_POST['staff_delete'])) {
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $query = "DELETE FROM staff WHERE id='$staff_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['delete_promisys'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $query = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($conn, $query);

    $_SESSION['status_code'] = 'success';
    $_SESSION['message'] = "Staff has been removed from the system";
    header("Location: admin_staff.php");
}
