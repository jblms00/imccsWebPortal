<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['student_id'])) {
        $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

        $delete_student_query = "DELETE FROM `student_data` WHERE `student_id` = '$student_id'";

        if (mysqli_query($con, $delete_student_query)) {
            $data['status'] = 'success';
            $data['message'] = 'Student deleted successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to delete Student';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Student ID not provided';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>