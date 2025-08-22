<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $course_id = isset($_POST['course_id']) ? mysqli_real_escape_string($con, $_POST['course_id']) : '';
    $course_code = isset($_POST['course_code']) ? mysqli_real_escape_string($con, $_POST['course_code']) : '';
    $course_name = isset($_POST['course_name']) ? mysqli_real_escape_string($con, $_POST['course_name']) : '';

    if (empty($course_id) || empty($course_name) || empty($course_code)) {
        $data['status'] = 'error';
        $data['message'] = 'Missing required fields';
    } else {
        $update_course_query = "UPDATE course SET course_code = '$course_code',  course_name = '$course_name' WHERE course_id = '$course_id'";

        if (mysqli_query($con, $update_course_query)) {
            $data['status'] = 'success';
            $data['message'] = 'Course updated successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to update course';
        }
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>