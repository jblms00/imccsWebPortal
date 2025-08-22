<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['subject_id'], $_POST['subject_name'], $_POST['subject_code'], $_POST['lec_units'], $_POST['lab_units'])) {

        $subject_id = mysqli_real_escape_string($con, $_POST['subject_id']);
        $subject_name = mysqli_real_escape_string($con, $_POST['subject_name']);
        $subject_code = mysqli_real_escape_string($con, $_POST['subject_code']);
        $lec_units = mysqli_real_escape_string($con, $_POST['lec_units']);
        $lab_units = mysqli_real_escape_string($con, $_POST['lab_units']);

        $update_subject_query = "UPDATE `academic_subjects` 
                                 SET `subject_name` = '$subject_name', 
                                     `subject_code` = '$subject_code', 
                                     `lec_units` = '$lec_units', 
                                     `lab_units` = '$lab_units' 
                                 WHERE `subject_id` = '$subject_id'";

        if (mysqli_query($con, $update_subject_query)) {
            $data['status'] = 'success';
            $data['message'] = 'Subject updated successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to update subject';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Missing required fields';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>