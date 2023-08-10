<?php
include "db_conn.php";

$year = $_GET['year'];
// $year = '2023';

$status_client = mysqli_query($conn, "SELECT quot_client_type, count(DISTINCT quot_id) AS Number FROM quotation WHERE quot_status = 'Approved' AND YEAR(quot_app_date) = '$year' GROUP BY quot_client_type ");

if (mysqli_num_rows($status_client) == 0) {
    echo "404";
} else {
    while ($row = mysqli_fetch_assoc($status_client)) {
        $rows[] = $row;
    }
    print_r(json_encode($rows));
}
