<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'vendor/phpmailer/phpmailer/src/SMTP.php';

include "db_conn.php";

if (isset($_POST['password-reset-token']) && $_POST['staff_no']) {

    $staff_no = $_POST['staff_no'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE staff_no='" . $staff_no . "'");

    $row = mysqli_fetch_array($result);

    if ($row) {

        $token = md5($staff_no) . rand(10, 9999);

        $email = $row['email'];

        $name = $row['name'];

        // echo $email;

        $expFormat = mktime(
            date("H"),
            date("i"),
            date("s"),
            date("m"),
            date("d") + 1,
            date("Y")
        );

        $password = 'temp pass 123';

        $expDate = date("Y-m-d H:i:s", $expFormat);

        $update = mysqli_query($conn, "UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE staff_no='" . $staff_no . "'");

        $link = "<a href='localhost/new/reset_password.php?key=" . $staff_no . "&token=" . $token . "'>Click To Reset password</a>";

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
        $mail->AddAddress($email, $name);
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body    = 'Click On This Link to Reset Password ' . $link . '';
        if ($mail->Send()) {
            echo "Check Your Email and Click on the link sent to your email";
        } else {
            echo "Mail Error - >" . $mail->ErrorInfo;
        }
    } else {
        echo "Invalid Email Address. Go back";
    }
}

if (isset($_POST['set_new_password'])) {
    $email = $_POST['email'];
    $token = $_POST['reset_link_token'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $new_password = md5($password);
        $sql = "UPDATE users SET password = '$new_password', reset_link_token = '' WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        header("Location: login.php?error=Success! Please re-login with new password!");
    } else {
        // echo "Password does not match";
        header("Location: login.php?error=Fail to update password.");
    }
}
