<?php
include "db_conn.php";

if (isset($_POST['add_checklist'])) {
    $id = $_POST['id'];
    $project = $_POST['project'];

    $all_id = $_POST['checkbox'];
    $extract_id = implode(',', array_map(function ($all_id) {
        return ($all_id . "=0");
    }, $all_id));

    $save = mysqli_query($conn, "UPDATE securement SET s_checklist='$extract_id' WHERE s_proj_no = '$project'");

    header("Location: project_management.php?id=" . $id);
}

if (isset($_POST['add_data'])) {
    $body = $_POST['body'];

    $sql = "INSERT INTO checklist (checklist_body) VALUES ('$body')";
    $result = mysqli_query($conn, $sql);
}

if (isset($_POST['checklist_delete'])) {
    $checklist_id = $_POST['checklist_id'];

    $sql = "DELETE FROM checklist WHERE checklist_id='$checklist_id'";
    $res = mysqli_query($conn, $sql);
}

if (isset($_POST['update_checklist'])) {
    $id = $_POST['id'];
    $project = $_POST['project'];
    $array = [];
    $isCheck = $_POST['isCheck'];

    // print_r($_POST);
    $check_id = $_POST['check_id'];

    foreach ($check_id as $value) {
        if (in_array($value, $isCheck)) {
            $new_data = $value . "=1";
            $new_array[] = $new_data;
            // echo $new_data;
            // echo "<br>";
        } else {
            $new_data = $value . "=0";
            $new_array[] = $new_data;
            // echo $new_data;
            // echo "<br>";
        }
        // $new_array = array($new_data);
    }

    // $test = array_intersect($isCheck, $check_id);
    $new_data = implode(',', $new_array);
    print_r($new_data);

    // $check_value = $_POST['check_value'];
    // $imp = implode(',', array_map(function ($check_id, $check_value) {
    //     return ($check_id . "=" . $check_value);
    // }, $check_id, $check_value));
    // print_r($imp);
    $save = mysqli_query($conn, "UPDATE securement SET s_checklist='$new_data' WHERE s_proj_no = '$project'");
    header("Location: project_management.php?id=" . $id);
}
