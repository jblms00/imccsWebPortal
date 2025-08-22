<?php
session_start();

include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $get_courses_query = "SELECT * FROM course";
    $get_courses_result = mysqli_query($con, $get_courses_query);

    if ($get_courses_result && mysqli_num_rows($get_courses_result) > 0) {
        $data['courses'] = [];
        while ($fetch_information = mysqli_fetch_assoc($get_courses_result)) {
            $data['courses'][] = $fetch_information;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = "error";
        $data['message'] = "Courses not found";
    }

} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}
echo json_encode($data);