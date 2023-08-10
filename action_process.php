<?php
session_start();
include 'db_conn.php';


if (isset($_POST['submit'])) {

    $id = $_POST['quotation'];
    $res = mysqli_query($conn, "SELECT quot_no FROM quotation WHERE quot_id = '$id'");
    while ($rows = mysqli_fetch_assoc($res)) {
        $quotation = $rows['quot_no'];
    }
    // echo $quotation;
    $action_by = $_POST['action_by'];

    $action_body = $_POST['action_body'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO action (
        action_proj_no,
        action_body,
        action_date,
        action_for,
        action_by
        ) values (
            '$quotation',
            '$action_body',
            '$date',
            'quotation',
            '$action_by'
            )";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add action to quotation " . $quotation;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: quotation_view.php?id=' . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add action to quotation ";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: quotation_view.php?id=' . $id);
    }
}

if (isset($_POST['action_delete'])) {
    $action_id = $_POST['action_id'];

    $sql = "DELETE FROM action WHERE action_id='$action_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Delete an action in quotation " . $quotation;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    } else {
        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Delete an action in quotation " . $quotation;
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    }

    // if ($res) {
    //     $_SESSION['status_code'] = 'success';
    //     $_SESSION['message'] = "Client successfully deleted!";
    //     header('location: clients.php');
    // } else {
    //     $_SESSION['status_code'] = 'error';
    //     $_SESSION['message'] = "Client failed to delete!";
    //     header('location: clients.php');
    // }
}


// if ($res) {
//         $_SESSION['status_code'] = 'success';
//         $_SESSION['message'] = "Client successfully deleted!";
//         header('location: clients.php');
//     } else {
//         $_SESSION['status_code'] = 'error';
//         $_SESSION['message'] = "Client failed to delete!";
//         header('location: clients.php');
//     }

if (isset($_POST['add_ps_remark']) && isset($_POST['proj_no'])) {
    $id = $_POST['id'];
    $proj_no = $_POST['proj_no'];
    $action_by = $_SESSION['shortform'];
    $action_body = $_POST['action_body'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO action (
        action_proj_no,
        action_for,
        action_body,
        action_date,
        action_by
        ) values (
            '$proj_no',
            'project',
            '$action_body',
            '$date',
            '$action_by'
            )";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add action to project schedule";
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add action to project schedule";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    }
}

if (isset($_POST['delete_ps_remark'])) {
    $delete_id = $_POST['delete_id'];

    $sql = "DELETE FROM action WHERE action_id='$delete_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Delete an action in project schedule";
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    } else {
        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Delete an action in project schedule";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    }
}

if (isset($_POST['edit_ps_remark'])) {
    $id = $_POST['id'];
    $ids = $_POST['ids'];
    $action_body = $_POST['action_body'];

    $sql = "UPDATE action SET action_body = '$action_body' WHERE action_id = '$ids'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Action updated!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Update action";
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Action fail to update!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Update action";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: project_management.php?id=' . $id);
    }
}

if (isset($_POST['add_comm_invoice'])) {
    $id = $_POST['id'];
    $ids = $_POST['ids'];
    $project = $_POST['proj_no'];
    $pd_invoice_no = $_POST['pd_invoice_no'];
    $action_by = $_SESSION['shortform'];
    $comment = $_POST['comment'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO action (
        action_proj_no,
        action_for,
        action_body,
        action_date,
        action_by
        ) values (
            '$project',
            '$pd_invoice_no',
            '$comment',
            '$date',
            '$action_by'
            )";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Success!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add action invoice " . $pd_invoice_no;
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: invoice_view.php?id=' . $id);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed!";

        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Add action invoice " . $pd_invoice_no;
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
        header('location: invoice_view.php?id=' . $id);
    }
}

if (isset($_POST['delete_action_invoice'])) {
    $action_id = $_POST['action_id'];

    $sql = "DELETE FROM action WHERE action_id='$action_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Delete an action in invoice";
        $log_status = "Success";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    } else {
        $user = $_SESSION['staff_no'];
        $date = date("Y-m-d H:i:s");
        $log_title = "Delete an action in invoice";
        $log_status = "Fail";
        $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
        $log_result = mysqli_query($conn, $log_sql);
    }
}
