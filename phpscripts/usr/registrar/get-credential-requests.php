<?php
session_start();
include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $request_status = mysqli_real_escape_string($con, $_GET["status"]);

    $data['reqs'] = $request_status;

    $get_requests_query = "
        SELECT 
            credential_requests.request_id, 
            credential_requests.student_requested, 
            credential_requests.request_status, 
            credential_requests.datetime_request,
            student_data.*
        FROM credential_requests
        INNER JOIN student_data ON credential_requests.student_id = student_data.student_id
        WHERE credential_requests.request_status = '$request_status'
    ";
    $get_requests_result = mysqli_query($con, $get_requests_query);

    if ($get_requests_result && mysqli_num_rows($get_requests_result) > 0) {
        $data['requests'] = [];
        while ($fetch_information = mysqli_fetch_assoc($get_requests_result)) {
            $data['requests'][] = $fetch_information;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = "error";
        $data['message'] = "Credential requests not found";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method. Please try again.";
}

echo json_encode($data);
