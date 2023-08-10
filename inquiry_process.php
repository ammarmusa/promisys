<?php
session_start();
include "db_conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['req_new_partner'])) {
    $user = $_SESSION['shortform'];
    $noti_body = $_POST['noti_body'];
    $files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
    // Count the number of uploaded files in array
    $total_count = count($_FILES['upload']['name']);
    $inc_no = '';
    $check_inc_no = mysqli_query($conn, "SELECT noti_inc_no FROM notification");
    while($cin = mysqli_fetch_assoc($check_inc_no)){
        $inc_no = $cin['noti_inc_no'];
    }
    if($inc_no == '') {
        $inc_no = 1;
        $new_inc_no = str_pad($inc_no, 3, "0", STR_PAD_LEFT);
        $code = "CP";
        $date = date("ymd");
        $serial_number = $code.$date."-".$new_inc_no;
    } else {
        $new_inc_no = str_pad($inc_no+1, 3, "0", STR_PAD_LEFT);
        $code = "CP";
        $date = date("ymd");
        $serial_number = $code.$date."-".$new_inc_no;
    }

    echo $serial_number."<br>";

    $noti_title = "Register Contract Partner";
    $noti_type = "Inquiry";

    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        $path = 'inquiry';
        // print_r($_POST);
        // echo $path;

        if (!is_dir($path)) {
            mkdir($path);
        }
        //A file path needs to be present
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = $path . "/" . $_FILES['upload']['name'][$i];
            echo $newFilePath . "<br>";
            $file_name =  $_FILES['upload']['name'][$i];
            echo $file_name;
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $sql_insert = "INSERT INTO notification (
                    noti_title,
                    noti_body,
                    noti_req_by,
                    noti_type,
                    noti_ref_no,
                    noti_status,
                    noti_inc_no,
                    noti_path
                ) VALUES (
                    '$noti_title',
                    '$noti_body',
                    '$user',
                    '$noti_type',
                    '$serial_number',
                    'Applied',
                    '$new_inc_no',
                    '$newFilePath'
                )";

                $insert_res = mysqli_query($conn, $sql_insert);
            }
        } else {
            $_SESSION['status_code'] = 'error';
            $_SESSION['message'] = "No file selected!";
            header('location: inquiry.php');
        }
    }   
    $_SESSION['status_code'] = 'success';
    $_SESSION['message'] = "Submitted!";
    header('location: inquiry.php');


    // print_r($_POST);

    // $mail = new PHPMailer(true);

    // $mail->CharSet =  "utf-8";
    // $mail->IsSMTP();
    // // enable SMTP authentication
    // $mail->SMTPAuth = true;
    // // GMAIL username
    // $mail->Username = "setia.devtest@gmail.com";
    // // GMAIL password
    // $mail->Password = "qnyuhescyllwgtoy";
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    // // sets GMAIL as the SMTP server
    // $mail->Host = "smtp.gmail.com";
    // // set the SMTP port for the GMAIL server
    // $mail->Port = "465";
    // $mail->From = 'setia.devtest@gmail.com';
    // $mail->FromName = 'Promisys';
    // $mail->AddAddress("itsammarmusa@gmail.com", "Muhammad Ammar");
    // $mail->Subject  =  $type;
    // $mail->IsHTML(true);
    // $mail->Body    = $body;
    // if ($mail->Send()) {
    //     echo "Check Your Email and Click on the link sent to your email";
    // } else {
    //     echo "Mail Error - >" . $mail->ErrorInfo;
    // }
    // $body = "Full Name: " . $staff_name . "<br>Phone Number: " . $staff_phone . "<br>Email: " . $staff_email . "<br>Company: " . $staff_company;

    // echo $body;
    // $sql = "";
    // $result = mysqli_query($conn, $sql);
}

if(isset($_POST['complete_request'])){
    $noti_id = $_POST['noti_id'];
    
    $update = mysqli_query($conn, "UPDATE notification SET noti_status = 'Done' WHERE noti_id = '$noti_id'");
}

if (isset($_POST['bug_report'])) {
    $user = $_SESSION['shortform'];
    $noti_body = $_POST['noti_body'];
    $files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
    // Count the number of uploaded files in array
    $total_count = count($_FILES['upload']['name']);
    $inc_no = '';
    $check_inc_no = mysqli_query($conn, "SELECT noti_inc_no FROM notification");
    while($cin = mysqli_fetch_assoc($check_inc_no)){
        $inc_no = $cin['noti_inc_no'];
    }
    if($inc_no == '') {
        $inc_no = 1;
        $new_inc_no = str_pad($inc_no, 3, "0", STR_PAD_LEFT);
        $code = "BR";
        $date = date("ymd");
        $serial_number = $code.$date."-".$new_inc_no;
    } else {
        $new_inc_no = str_pad($inc_no+1, 3, "0", STR_PAD_LEFT);
        $code = "BR";
        $date = date("ymd");
        $serial_number = $code.$date."-".$new_inc_no;
    }

    echo $serial_number."<br>";

    $noti_title = "Bug Report";
    $noti_type = "Inquiry";

    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        $path = 'inquiry';
        // print_r($_POST);
        // echo $path;

        if (!is_dir($path)) {
            mkdir($path);
        }
        //A file path needs to be present
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = $path . "/" . $_FILES['upload']['name'][$i];
            echo $newFilePath . "<br>";
            $file_name =  $_FILES['upload']['name'][$i];
            echo $file_name;
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $sql_insert = "INSERT INTO notification (
                    noti_title,
                    noti_body,
                    noti_req_by,
                    noti_type,
                    noti_ref_no,
                    noti_status,
                    noti_inc_no,
                    noti_path
                ) VALUES (
                    '$noti_title',
                    '$noti_body',
                    '$user',
                    '$noti_type',
                    '$serial_number',
                    'Applied',
                    '$new_inc_no',
                    '$newFilePath'
                )";

                $insert_res = mysqli_query($conn, $sql_insert);
            }
        } else {
            $_SESSION['status_code'] = 'error';
            $_SESSION['message'] = "No file selected!";
            header('location: inquiry.php');
        }
    }   
    $_SESSION['status_code'] = 'success';
    $_SESSION['message'] = "Submitted!";
    header('location: inquiry.php');


    // print_r($_POST);

    // $mail = new PHPMailer(true);

    // $mail->CharSet =  "utf-8";
    // $mail->IsSMTP();
    // // enable SMTP authentication
    // $mail->SMTPAuth = true;
    // // GMAIL username
    // $mail->Username = "setia.devtest@gmail.com";
    // // GMAIL password
    // $mail->Password = "qnyuhescyllwgtoy";
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    // // sets GMAIL as the SMTP server
    // $mail->Host = "smtp.gmail.com";
    // // set the SMTP port for the GMAIL server
    // $mail->Port = "465";
    // $mail->From = 'setia.devtest@gmail.com';
    // $mail->FromName = 'Promisys';
    // $mail->AddAddress("itsammarmusa@gmail.com", "Muhammad Ammar");
    // $mail->Subject  =  $type;
    // $mail->IsHTML(true);
    // $mail->Body    = $body;
    // if ($mail->Send()) {
    //     echo "Check Your Email and Click on the link sent to your email";
    // } else {
    //     echo "Mail Error - >" . $mail->ErrorInfo;
    // }
    // $body = "Full Name: " . $staff_name . "<br>Phone Number: " . $staff_phone . "<br>Email: " . $staff_email . "<br>Company: " . $staff_company;

    // echo $body;
    // $sql = "";
    // $result = mysqli_query($conn, $sql);
}

if(isset($_POST['delete_noti'])){
    $noti_id = $_POST['noti_id'];
    
    $update = mysqli_query($conn, "DELETE FROM notification WHERE noti_id='$noti_id'");
}

if (isset($_POST['other_report'])) {
    $user = $_SESSION['shortform'];
    $noti_body = $_POST['noti_body'];
    $inc_no = '';
    $check_inc_no = mysqli_query($conn, "SELECT noti_inc_no FROM notification");
    while($cin = mysqli_fetch_assoc($check_inc_no)){
        $inc_no = $cin['noti_inc_no'];
    }
    if($inc_no == '') {
        $inc_no = 1;
        $new_inc_no = str_pad($inc_no, 3, "0", STR_PAD_LEFT);
        $code = "OT";
        $date = date("ymd");
        $serial_number = $code.$date."-".$new_inc_no;
    } else {
        $new_inc_no = str_pad($inc_no+1, 3, "0", STR_PAD_LEFT);
        $code = "OT";
        $date = date("ymd");
        $serial_number = $code.$date."-".$new_inc_no;
    }

    // echo $serial_number."<br>";

    $noti_title = $_POST['noti_title'];
    $noti_type = "Inquiry";

    // print_r($_FILES);
    echo $_FILES['upload']['name'][0];

    if($_FILES['upload']['name'][0] === '') {
        $sql_insert = "INSERT INTO notification (
            noti_title,
            noti_body,
            noti_req_by,
            noti_type,
            noti_ref_no,
            noti_status,
            noti_inc_no
        ) VALUES (
            '$noti_title',
            '$noti_body',
            '$user',
            '$noti_type',
            '$serial_number',
            'Applied',
            '$new_inc_no'
        )";

        $insert_res = mysqli_query($conn, $sql_insert);

    } else {
       
        $files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
        // Count the number of uploaded files in array
        $total_count = count($_FILES['upload']['name']);
        for ($i = 0; $i < $total_count; $i++) {
            //The temp file path is obtained
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
    
            $path = 'inquiry';
            // print_r($_POST);
            // echo $path;
    
            if (!is_dir($path)) {
                mkdir($path);
            }
            //A file path needs to be present
            if ($tmpFilePath != "") {
                //Setup our new file path
                $newFilePath = $path . "/" . $_FILES['upload']['name'][$i];
                echo $newFilePath . "<br>";
                $file_name =  $_FILES['upload']['name'][$i];
                echo $file_name;
                //File is uploaded to temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $sql_insert = "INSERT INTO notification (
                        noti_title,
                        noti_body,
                        noti_req_by,
                        noti_type,
                        noti_ref_no,
                        noti_status,
                        noti_inc_no,
                        noti_path
                    ) VALUES (
                        '$noti_title',
                        '$noti_body',
                        '$user',
                        '$noti_type',
                        '$serial_number',
                        'Applied',
                        '$new_inc_no',
                        '$newFilePath'
                    )";
    
                    $insert_res = mysqli_query($conn, $sql_insert);
                }
            } else {
                $_SESSION['status_code'] = 'error';
                $_SESSION['message'] = "No file selected!";
                header('location: inquiry.php');
            }
        }   
    }

    // Loop through every file
   
    $_SESSION['status_code'] = 'success';
    $_SESSION['message'] = "Submitted!";
    header('location: inquiry.php');


    // print_r($_POST);

    // $mail = new PHPMailer(true);

    // $mail->CharSet =  "utf-8";
    // $mail->IsSMTP();
    // // enable SMTP authentication
    // $mail->SMTPAuth = true;
    // // GMAIL username
    // $mail->Username = "setia.devtest@gmail.com";
    // // GMAIL password
    // $mail->Password = "qnyuhescyllwgtoy";
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    // // sets GMAIL as the SMTP server
    // $mail->Host = "smtp.gmail.com";
    // // set the SMTP port for the GMAIL server
    // $mail->Port = "465";
    // $mail->From = 'setia.devtest@gmail.com';
    // $mail->FromName = 'Promisys';
    // $mail->AddAddress("itsammarmusa@gmail.com", "Muhammad Ammar");
    // $mail->Subject  =  $type;
    // $mail->IsHTML(true);
    // $mail->Body    = $body;
    // if ($mail->Send()) {
    //     echo "Check Your Email and Click on the link sent to your email";
    // } else {
    //     echo "Mail Error - >" . $mail->ErrorInfo;
    // }
    // $body = "Full Name: " . $staff_name . "<br>Phone Number: " . $staff_phone . "<br>Email: " . $staff_email . "<br>Company: " . $staff_company;

    // echo $body;
    // $sql = "";
    // $result = mysqli_query($conn, $sql);
}