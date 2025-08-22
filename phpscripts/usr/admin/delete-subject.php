<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['subject_id'])) {
        $subject_id = mysqli_real_escape_string($con, $_POST['subject_id']);

        $delete_subject_query = "DELETE FROM `academic_subjects` WHERE `subject_id` = '$subject_id'";

        if (mysqli_query($con, $delete_subject_query)) {
            $data['status'] = 'success';
            $data['message'] = 'Subject deleted successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to delete subject';
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