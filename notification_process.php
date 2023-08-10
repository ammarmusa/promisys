<?php

if (isset($_POST['req_new_partner'])) {
    $staff_name = $_POST['staff_name'];
    $staff_phone = $_POST['staff_phone'];
    $staff_email = $_POST['staff_email'];
    $staff_company = $_POST['staff_company'];

    $body = "Request for contract partner registration. Details are as follow; Name : " . $staff_name .
        ", phone number : " . $staff_phone . ", email : " . $staff_email . " , company : " . $staff_companycompany;

    echo $body;
}
