<?php
session_start();
include 'db_conn.php';

if (isset($_POST['save_contract_partner'])) {
    // print_r($_POST);
    $cp_proj_no = $_POST['cp_proj_no'];
    $cp_ref_no = $_POST['cp_ref_no'];
    $cp_name = $_POST['cp_name'];
    $cp_start = $_POST['cp_start'];
    $cp_end = $_POST['cp_end'];
    $cp_fee = $_POST['cp_fee'];
    $cp_term = $_POST['cp_term'];
    $cp_lad = $_POST['cp_lad'];
    $cp_vas = $_POST['cp_vas'];
    $cp_others = $_POST['cp_others'];

    $sql = "INSERT INTO contract_partner (
        cp_proj_no,
        cp_ref_no,
        cp_name,
        cp_start,
        cp_end,
        cp_fee,
        cp_term,
        cp_lad,
        cp_vas,
        cp_others) VALUES (
        '$cp_proj_no',
        '$cp_ref_no',
        '$cp_name',
        '$cp_start',
        '$cp_end',
        '$cp_fee',
        '$cp_term',
        '$cp_lad',
        '$cp_vas',
        '$cp_others'
    )";
    $result = mysqli_query($conn, $sql);

    if ($result) {
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

if(isset($_POST['update_contract_partner'])) {
    $id = $_POST['id'];
    $cp_ref_no = $_POST['cp_ref_no'];
    $cp_name = $_POST['cp_name'];
    $cp_start = $_POST['cp_start'];
    $cp_end = $_POST['cp_end'];
    $cp_fee = $_POST['cp_fee'];
    $cp_term = $_POST['cp_term'];
    $cp_lad = $_POST['cp_lad'];
    $cp_vas = $_POST['cp_vas'];
    $cp_others = $_POST['cp_others'];

    $sql = "UPDATE contract_partner SET
        cp_ref_no = '$cp_ref_no',
        cp_name = '$cp_name',
        cp_start = '$cp_start',
        cp_end = '$cp_end',
        cp_fee = '$cp_fee',
        cp_term = '$cp_term',
        cp_lad = '$cp_lad',
        cp_vas = '$cp_vas',
        cp_others = '$cp_others' WHERE cp_id = '$id'";
    
    $result = mysqli_query($conn, $sql);
    if($result) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['message'] = "Contract partner updated!";
        header("Location: contract_partner_view.php?id=".$id);
        exit(0);
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['message'] = "Failed to update";
        header("Location: contract_partner_view.php?id=".$id);
    }
}

if(isset($_POST['cp_delete'])) {
    $cp_id = $_POST['cp_id'];
    $query = "DELETE FROM contract_partner WHERE cp_id='$cp_id'";
    $query_run = mysqli_query($conn, $query);
}