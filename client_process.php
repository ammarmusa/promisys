<?php
session_start();
include "db_conn.php";

if (isset($_POST['add_client'])) {
    $client_comp_name = $_POST['client_comp_name'];
    $client_address = $_POST['client_address'];
    $client_pic = $_POST['client_pic'];
    $client_phone = $_POST['client_phone'];
    $client_fax = $_POST['client_fax'];
    $client_email = $_POST['client_email'];

    $sql = "INSERT INTO clients (
    client_comp_name,
    client_address,
    client_pic,
    client_phone,
    client_fax,
    client_email)
    VALUES (
    '$client_comp_name',
    '$client_address',
    '$client_pic',
    '$client_phone',
    '$client_fax',
    '$client_email'
    )";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Client Added!";
        header("Location: quotation.php");
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed to add client!";
        header("Location: quotation.php");
    }
}

if (isset($_POST['update_client'])) {
    $client_id = $_POST['client_id'];
    $client_comp_name = $_POST['client_comp_name'];
    $client_address = $_POST['client_address'];
    $client_pic = $_POST['client_pic'];
    $client_phone = $_POST['client_phone'];
    $client_fax = $_POST['client_fax'];
    $client_email = $_POST['client_email'];

    $sql = "UPDATE clients SET 
    client_comp_name='$client_comp_name',
    client_address='$client_address',
    client_pic='$client_pic',
    client_phone='$client_phone',
    client_fax='$client_fax',
    client_email='$client_email'
    WHERE client_id='$client_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Client Updated!";
        header("Location: quotation.php");
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed to update client!";
        header("Location: quotation.php");
    }
}

if (isset($_POST['delete_client_set'])) {
    $client_id = $_POST['client_id'];

    $sql = "DELETE FROM clients WHERE client_id='$client_id'";
    $res = mysqli_query($conn, $sql);
}
