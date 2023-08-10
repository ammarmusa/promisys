<?php
//setting header to json
header('Content-Type: application/json');

include 'db_conn.php';

//query to get data from the table
$query = "SELECT quot_amount FROM quotation";

//execute query
$result = $conn->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);
