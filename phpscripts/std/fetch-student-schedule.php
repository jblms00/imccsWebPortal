<?php
session_start();
include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['student_number']) && !empty($_GET['student_number'])) {
        $studentId = mysqli_real_escape_string($con, $_GET['student_number']);

        // SQL query with LEFT JOIN
        $sql = "
            SELECT 
                ss.day_of_week, 
                ss.start_time, 
                ss.end_time, 
                ss.instructor_name, 
                asub.subject_name, 
                asub.subject_code
            FROM 
                student_schedules ss
            LEFT JOIN 
                academic_subjects asub 
            ON 
                ss.subject_id = asub.subject_id
            WHERE 
                ss.student_id = '$studentId'
        ";

        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $schedules = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $schedules[] = $row;
                }
                $data['status'] = "success";
                $data['schedules'] = $schedules;
            } else {
                $data['status'] = "error";
                $data['message'] = "No schedules found for the student.";
            }
        } else {
            $data['status'] = "error";
            $data['message'] = "Query error: " . mysqli_error($con);
        }
    } else {
        $data['status'] = "error";
        $data['message'] = "Student number is required.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>