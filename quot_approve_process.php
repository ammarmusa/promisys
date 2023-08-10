<?php
session_start();
include 'db_conn.php';

if (isset($_POST['approve']) && isset($_POST['id'])) {
    $branch = $_POST['branch'];
    $id = $_POST['id'];
    $project_location = $_POST['proj_location'];
    // echo $project_location;
    if ($project_location == 'Johor') {
        $word = 'J';
    } elseif ($project_location == 'Perak') {
        $word = 'A';
    } elseif ($project_location == 'Selangor') {
        $word = 'B';
    } elseif ($project_location == 'Pahang') {
        $word = 'C';
    } elseif ($project_location == 'Kelantan') {
        $word = 'D';
    } elseif ($project_location == 'Kedah') {
        $word = 'K';
    } elseif ($project_location == 'Melaka') {
        $word = 'M';
    } elseif ($project_location == 'Negeri Sembilan') {
        $word = 'N';
    } elseif ($project_location == 'Pulau Pinang') {
        $word = 'P';
    } elseif ($project_location == 'Perlis') {
        $word = 'R';
    } elseif ($project_location == 'Terengganu') {
        $word = 'T';
    } elseif ($project_location == 'Kuala Lumpur') {
        $word = 'V';
    } elseif ($project_location == 'Sarawak') {
        $word = 'Q';
    } elseif ($project_location == 'Sabah') {
        $word = 'S';
    } else {
        // header('location: quotation.php?=State+Not+Exist');
    }
    $retrieve_data = mysqli_query($conn, "SELECT * FROM quotation WHERE quot_id = '$id'");
    while ($rows = mysqli_fetch_assoc($retrieve_data)) {
        $quot_no = $rows['quot_no'];
    }

    $project_no = $quot_no;
    // echo $quot_no;
    // echo $project_no;
    $date = date("Y-m-d");
    $quot_remark = $_POST['quot_remark'];
    $award_date = $_POST['award_date'];
    $year = date("Y", strtotime($award_date));
    $year2 = date("y", strtotime($award_date));

    $result = mysqli_query($conn, "UPDATE quotation SET quot_status='approved', quot_remark='$quot_remark' WHERE quot_no='$project_no'");
    if ($result) {

        $check_data = mysqli_query($conn, "SELECT s_proj_no, s_no_inc FROM securement WHERE year(s_award_date) = '$year' AND s_branch = '$branch' ORDER BY s_no_inc desc");
        if (mysqli_num_rows($check_data) == 0) {
            echo '';
        } else {
            $row = mysqli_fetch_assoc($check_data);
            $lastid = $row['s_proj_no'];
        }

        // if (empty($lastid)) {
        //     if (strlen($quot_no) == '10') {
        //         $number = substr($quot_no, 0, 6);
        //         $new_proj_no = $number . $word . "001";
        //         $id = "001";
        //     } else {
        //         $number = substr($quot_no, 0, 9);
        //         $new_proj_no = $number . $word . "001";
        //         $id = "001";
        //     }
        // } else {
        //     $id = str_pad($lastid + 1, 3, 0, STR_PAD_LEFT);

        //     $new_proj_no = "SGS(J)." . $year2 . $word . $id;
        // }
        // echo $new_proj_no . " " . $word;

        if ($branch == "HQ") {
            $code = "";
            // echo strlen($lastid);
            if (empty($lastid)) {
                $number = "SGS" . $code . "." . $year2 . $word . "001";
                $id = '001';
            } else {
                if (strlen($lastid) == 10) {
                    $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                    $idd = substr($lastid, 7);
                    // echo $idd;
                    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                    $number = "SGS" . $code . "." . $year2 . $word . $id;
                    // echo $number;
                } else {
                    // echo $lastid . "<br>";
                    // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                    // echo $idd . "<br>";
                    $idd = substr($lastid, 10);
                    // echo $idd;
                    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                    $number = "SGS" . $code . "." . $year2 . $word . $id;
                }
            }
            echo $number;
        } else if ($branch == "Pahang") {
            $code = "(C)";
            if (empty($lastid)) {
                $number = "SGS" . $code . "." . $year2 . $word . "001";
                $id = '001';
                echo $number . "asdasd";
            } else {
                if (strlen($lastid) == 10) {
                    // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                    $idd = substr($lastid, 7);
                    // echo $idd;
                    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);

                    $number = "SGS" . $code . "." . $year2 . $word . $id;
                } else {
                    // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                    $idd = substr($lastid, 10);
                    echo $idd;
                    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                    echo $id;
                    $number = "SGS" . $code . "." . $year2 . $word . $id;
                }
            }
        } else {
            $code = "(J)";
            if (empty($lastid)) {
                $number = "SGS" . $code . "." . $year2 . $word . "001";
                $id = '001';
            } else {
                if (strlen($lastid) == 10) {
                    // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                    $idd = substr($lastid, 7);
                    // echo $idd;
                    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                    $number = "SGS" . $code . "." . $year2 . $word . $id;
                } else {
                    // $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                    $idd = substr($lastid, 10);
                    // echo $idd;
                    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                    $number = "SGS" . $code . "." . $year2 . $word . $id;
                }
            }
        }

        $sql = "INSERT INTO securement (
        s_award_date,
        s_quot_no,
        s_proj_no,
        s_branch,
        s_status,
        s_no_inc
    ) VALUES (
        '$award_date',
        '$quot_no',
        '$number',
        '$branch',
        'pending',
        '$id'
    )";

        $result = mysqli_query($conn, $sql);

        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $user = $_SESSION['staff_no'];
        $log_title = "Approved quotation : " . $quot_no;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: securement.php');
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Something went wrong!";
        header('location: quotation.php?');
    }
}

if (isset($_POST['reject'])) {
    $id = $_POST['id'];
    $project_no = $_POST['proj_no'];
    $remark = $_POST['quot_remark'];
    $sql = "UPDATE quotation SET quot_status='rejected', quot_remark='$remark' WHERE quot_id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $user = $_SESSION['staff_no'];
        $log_title = "Reject quotation : " . $quot_no;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header("Location: quotation.php");
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Something went wrong!";
        header("Location: quotation.php");
    }
    echo 'Reject' . $project_no;
}
