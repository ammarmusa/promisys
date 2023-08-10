<?php
include "db_conn.php";

// $year = $_GET['year'];
$year = '2023';

$status_client = mysqli_query($conn, "SELECT quot_status, count(DISTINCT quot_id) AS Number FROM quotation WHERE YEAR(quot_app_date) = '$year' GROUP BY quot_status ");

if (mysqli_num_rows($status_client) == 0) {
    echo "404";
} else {
    while ($row = mysqli_fetch_assoc($status_client)) {
        $rows[] = $row;
    }
    print_r(json_encode($rows));
}
