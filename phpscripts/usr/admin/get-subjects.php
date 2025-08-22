<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    // Check if course_id is provided in the query string
    if (isset($_GET['course_id'])) {
        $course_id = mysqli_real_escape_string($con, $_GET['course_id']);

        // Query to fetch subjects based on the course_id
        $get_subjects_query = "SELECT * FROM `academic_subjects` WHERE `course_id` = '$course_id'";
        $get_subjects_result = mysqli_query($con, $get_subjects_query);

        if ($get_subjects_result && mysqli_num_rows($get_subjects_result) > 0) {
            $data['subjects'] = [];
            while ($fetch_subject = mysqli_fetch_assoc($get_subjects_result)) {
                $data['subjects'][] = $fetch_subject;
            }
            $data['status'] = 'success';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Subjects not found for the given course';
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