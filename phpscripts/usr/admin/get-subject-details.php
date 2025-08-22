<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    // Check if subject_id is provided in the query string
    if (isset($_GET['subject_id'])) {
        $subject_id = mysqli_real_escape_string($con, $_GET['subject_id']);

        // Query to fetch subject based on the subject_id
        $get_subject_query = "SELECT * FROM `academic_subjects` WHERE `subject_id` = '$subject_id' LIMIT 1";  // Assuming 'subject_id' is the correct column name
        $get_subject_result = mysqli_query($con, $get_subject_query);

        if ($get_subject_result && mysqli_num_rows($get_subject_result) > 0) {
            // Fetch the subject details
            $subject = mysqli_fetch_assoc($get_subject_result);
            $data['subject'] = $subject;  // Assign the single subject directly to the response
            $data['status'] = 'success';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Subject not found for the given ID';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Subject ID not provided';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>