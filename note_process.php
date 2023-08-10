<?php
session_start();
include "db_conn.php";

if (isset($_POST['send_msg'])) {
    $note_body = $_POST['note_body'];
    $note_staff = $_POST['note_staff'];
    $note_priority = $_POST['note_priority'];
    $user = $_SESSION['shortform'];

    $sql = "INSERT INTO note (
        note_body,
        note_staff,
        note_priority,
        note_status,
        note_user
        ) VALUES (
            '$note_body',
            '$note_staff',
            '$note_priority',
            'pending',
            '$user'
        )";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Message sent!";
        header("Location: index.php");
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Message fail to send!";
        header("Location: index.php");
    }
}

if (isset($_POST['change_status'])) {
    $note_id = $_POST['note_id'];

    $sql = "UPDATE note SET note_status='completed' WHERE note_id='$note_id'";

    $res = mysqli_query($conn, $sql);
}

if (isset($_POST['delete_status'])) {
    $note_id = $_POST['note_id'];

    $sql = "DELETE FROM note WHERE note_id='$note_id'";

    $res = mysqli_query($conn, $sql);
}
