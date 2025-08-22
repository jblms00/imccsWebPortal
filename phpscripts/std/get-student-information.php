<?php
session_start();

include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $student_number = mysqli_real_escape_string($con, $_POST['student_number']);
    $section = mysqli_real_escape_string($con, $_POST['section']);
    $year_level = mysqli_real_escape_string($con, $_POST['year_level']);

    if (empty($student_number)) {
        $data['status'] = "error";
        $data['message'] = "Student number not found";
    } else {
        $get_student_query = "
            SELECT 
                sd.*, 
                c.course_name 
            FROM 
                student_data sd
            LEFT JOIN 
                course c 
            ON 
                sd.student_course = c.course_id
            WHERE 
                sd.student_id = '$student_number'
        ";
        $get_student_result = mysqli_query($con, $get_student_query);

        if ($get_student_result && mysqli_num_rows($get_student_result) > 0) {
            $data['student_info'] = [];
            while ($fetch_information = mysqli_fetch_assoc($get_student_result)) {
                $data['student_info'][] = $fetch_information;
            }
            $data['status'] = 'success';
        } else {
            $data['status'] = "error";
            $data['message'] = "Student not found";
        }
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}

echo json_encode($data);
