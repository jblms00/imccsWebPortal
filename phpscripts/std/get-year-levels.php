<?php
session_start();
include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['student_id'])) {
        $student_id = mysqli_real_escape_string($con, $_GET['student_id']);

        // Query to get year levels, semester, and computed school year
        $query = "
            SELECT DISTINCT 
                asub.year_level, 
                asub.semester, 
                CONCAT(YEAR(sg.datetime_added), ' - ', YEAR(sg.datetime_added) + 1) AS school_year
            FROM 
                student_grades sg
            INNER JOIN 
                academic_subjects asub ON sg.subject_id = asub.subject_id
            WHERE 
                sg.student_id = '$student_id'
            ORDER BY 
                asub.year_level ASC, asub.semester ASC";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data['year_levels'] = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data['year_levels'][] = $row;
            }
            $data['status'] = "success";
        } else {
            $data['status'] = "error";
            $data['message'] = "No grades found for the student.";
        }
    } else {
        $data['status'] = "error";
        $data['message'] = "Student ID not provided.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>