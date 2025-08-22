<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['course_id'])) {
        $course_id = mysqli_real_escape_string($con, $_POST['course_id']);

        $delete_course_query = "DELETE FROM `course` WHERE `course_id` = '$course_id'";

        if (mysqli_query($con, $delete_course_query)) {
            $data['status'] = 'success';
            $data['message'] = 'Course deleted successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to delete course';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Course ID not provided';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>