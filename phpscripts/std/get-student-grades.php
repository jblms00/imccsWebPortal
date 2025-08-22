<?php
session_start();
include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['student_id']) && isset($_GET['year_level']) && isset($_GET['semester'])) {
        $student_id = mysqli_real_escape_string($con, $_GET['student_id']);
        $year_level = mysqli_real_escape_string($con, $_GET['year_level']);
        $semester = mysqli_real_escape_string($con, $_GET['semester']);

        // Query to fetch grades for the specific year level and semester
        $query = "
            SELECT 
                sg.grade_id, sg.grade_value, asub.subject_name, asub.subject_code
            FROM 
                student_grades sg
            INNER JOIN 
                academic_subjects asub ON sg.subject_id = asub.subject_id
            WHERE 
                sg.student_id = '$student_id' 
                AND asub.year_level = '$year_level' 
                AND asub.semester = '$semester'";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data['grades'] = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data['grades'][] = $row;
            }
            $data['status'] = "success";
        } else {
            $data['status'] = "error";
            $data['message'] = "No grades found for the selected year level and semester.";
        }
    } else {
        $data['status'] = "error";
        $data['message'] = "Required parameters not provided.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>