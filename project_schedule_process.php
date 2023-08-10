<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include 'db_conn.php';


if (isset($_POST['add_data']) && isset($_POST['proj_no'])) {
    $id = $_POST['id'];
    $ps_proj_no = $_POST['proj_no'];
    $ps_type = $_POST['ps_type'];
    $ps_title = $_POST['ps_title'];
    $ps_pic = $_POST['ps_pic'];
    $ps_start = $_POST['ps_start'];
    $ps_end = $_POST['ps_end'];
    // $date = date("Y-m-d");

    // echo  $ps_proj_no;

    $sql = "INSERT INTO project_schedule (
        ps_type,
        ps_proj_no,
        ps_title,
        ps_pic,
        ps_start,
        ps_end
        ) values (
            '$ps_type',
            '$ps_proj_no',
            '$ps_title',
            '$ps_pic',
            '$ps_start',
            '$ps_end'
            )";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $check_email = mysqli_query($conn, "SELECT staff_email FROM staff WHERE staff_initial = '$ps_pic'");
        if(mysqli_num_rows($check_email) != 0) {
            while($ce = mysqli_fetch_assoc($check_email)) {
                $user_email = $ce['staff_email'];
            }
            $mail = new PHPMailer(true);

            $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;
            // GMAIL username
            $mail->Username = "setia.devtest@gmail.com";
            // GMAIL password
            $mail->Password = "qnyuhescyllwgtoy";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = "465";
            $mail->From = 'setia.devtest@gmail.com';
            $mail->FromName = 'Promisys';
            $mail->AddAddress($user_email, $ps_pic);
            $mail->Subject  =  'New work assigned.';
            $mail->IsHTML(true);
            $mail->Body    = 'You have been assigned a task. Details are as follow;-<br>Work type: '.$ps_type.'.<br>Project ref.: '.$ps_proj_no.'.<br>Title: '.$ps_title.'.<br>Start work: '.$ps_start.'.<br>Finish work: '.$ps_end.'.';
            if ($mail->Send()) {
                $isSend = "Sent";
            } else {
                $isSend = "Not sent. Error = ". $mail->ErrorInfo;
                // echo "Mail Error - >" . $mail->ErrorInfo;
            }
        } else {
            $isSend = "Email does not exist!.";
        }

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add schedule data " . $ps_proj_no." Email status: ".$isSend;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add schedule data " . $ps_proj_no;
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    }
}

if (isset($_POST['onsite_actual'])) {
    $id = $_POST['id'];
    $project = $_POST['project'];
    $onsite_id = $_POST['onsite_id'];
    $ps_remark = $_POST['ps_remark'];
    $ps_start_act = $_POST['ps_start_act'];
    $ps_end_act = $_POST['ps_end_act'];
    // $date = date("Y-m-d");

    $sql = "UPDATE project_schedule SET 
    ps_remark = '$ps_remark',
    ps_start_act = '$ps_start_act',
    ps_end_act = '$ps_end_act'
    WHERE ps_id = '$onsite_id'
    ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add actual schedule data " . $project . " On-Site";
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add actual schedule data " . $project . " On-Site";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    }
}

if (isset($_POST['update_data'])) {
    $id = $_POST['id'];
    $res = mysqli_query($conn, "SELECT project_no FROM project WHERE project_id = '$id'");
    while ($rows = mysqli_fetch_assoc($res)) {
        $project = $rows['project_no'];
    }
    $ids = $_POST['ids'];

    $ps_title = $_POST['ps_title'];
    $ps_start = $_POST['ps_start'];
    $ps_end = $_POST['ps_end'];
    $ps_pic = $_POST['ps_pic'];
    // $ps_start_act = $_POST['ps_start_act'];
    // $ps_end_act = $_POST['ps_end_act'];
    // $date = date("Y-m-d");

    $sql = "UPDATE project_schedule SET 
    ps_title = '$ps_title',
    ps_start = '$ps_start',
    ps_end = '$ps_end',
    ps_pic = '$ps_pic'
    WHERE ps_id = '$ids'
    ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Update schedule data " . $project;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Update schedule data " . $project;
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    }
}

if (isset($_POST['update_data_act'])) {
    $id = $_POST['id'];
    $res = mysqli_query($conn, "SELECT project_no FROM project WHERE project_id = '$id'");
    while ($rows = mysqli_fetch_assoc($res)) {
        $project = $rows['project_no'];
    }
    $ids = $_POST['ids'];
    $ps_title = $_POST['ps_title'];
    $ps_start = $_POST['ps_start'];
    $ps_end = $_POST['ps_end'];
    $ps_pic = $_POST['ps_pic'];
    $ps_start_act = $_POST['ps_start_act'];
    $ps_end_act = $_POST['ps_end_act'];
    $ps_remark = $_POST['ps_remark'];
    // $date = date("Y-m-d");

    $sql = "UPDATE project_schedule SET 
    ps_title = '$ps_title',
    ps_start = '$ps_start',
    ps_end = '$ps_end',
    ps_pic = '$ps_pic',
    ps_remark = '$ps_remark',
    ps_start_act = '$ps_start_act',
    ps_end_act = '$ps_end_act'
    WHERE ps_id = '$ids'
    ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Update schedule data " . $project;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Update schedule data " . $project;
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    }
}

if (isset($_POST['schedule_delete'])) {
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM project_schedule WHERE ps_id='$id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Delete project schedule";
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    } else {
        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Delete project schedule";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_date, log_status) VALUES ('$log_title','$user','$date','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    }
}
