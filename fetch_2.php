<?php
include "db_conn.php";

$year = $_GET['year'];
// $year = '2019';
$status_client = mysqli_query($conn, "SELECT quot_client_status, count(DISTINCT quot_id) AS Number FROM quotation WHERE quot_status = 'Approved' AND YEAR(quot_app_date) = '$year' GROUP BY quot_client_status ");
// while ($rows = mysqli_fetch_assoc($status_client)) {
//     $number = $rows['count(DISTINCT quot_id)'];
//     $name = $rows['quot_client_status'];
//     echo $name . " " . $number . "<br>";
// }
// print_r($status_client);

if (mysqli_num_rows($status_client) == 0) {
    // print_r(json_encode("404"));
    echo "404";
} else {
    // foreach ($status_client as $sc) {
    // $data_sc[] = $sc['quot_client_status'];
    // $data_sc_2[] = $sc['Number'];
    //     $data_sc[] = $sc;
    //     print_r($data_sc);
    // }
    // print_r($data_sc);
    // print_r(json_encode($data_sc_2));
    // echo $data_sc;
    // var_dump($data_sc);
    // exit;
    // json_encode($data_sc);
    while ($row = mysqli_fetch_assoc($status_client)) {
        $rows[] = $row;
    }
    print_r(json_encode($rows));
}
