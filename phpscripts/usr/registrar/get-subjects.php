<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseId = mysqli_real_escape_string($con, $_POST['course_id']);
    $yearLevel = mysqli_real_escape_string($con, $_POST['year_level']);
    $yearLevel = str_replace(" Year", "", $yearLevel);

    $data['courseId'] = $courseId;
    $data['yearLevel'] = $yearLevel;

    $query = "SELECT * FROM `academic_subjects`  WHERE `course_id` = '$courseId' AND `year_level` = '$yearLevel'";

    $result = mysqli_query($con, $query);

    if ($result) {
        $subjects = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $subjects[] = $row;
        }

        $data['status'] = "success";
        $data['subjects'] = $subjects;
    } else {
        $data['status'] = "error";
        $data['message'] = "Failed to fetch subjects.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>