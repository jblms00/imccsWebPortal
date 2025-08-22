<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    // Get the student_id from the query parameters
    $student_id = isset($_GET['student_id']) ? mysqli_real_escape_string($con, $_GET['student_id']) : '';

    if (!empty($student_id)) {
        // Query to fetch student data along with course details, filtered by student_id
        $get_students_query = "
            SELECT 
                student_data.*,
                course.course_name
            FROM student_data
            JOIN course ON student_data.student_course = course.course_id
            WHERE student_data.student_id = '$student_id'
        ";

        $get_students_result = mysqli_query($con, $get_students_query);

        if ($get_students_result && mysqli_num_rows($get_students_result) > 0) {
            $data['students_info'] = [];

            // Fetch the student information and course details
            while ($fetch_information = mysqli_fetch_assoc($get_students_result)) {
                $data['students_info'][] = $fetch_information;
            }

            $data['status'] = 'success';
        } else {
            $data['status'] = "error";
            $data['message'] = "Student not found";
        }
    } else {
        $data['status'] = "error";
        $data['message'] = "Student ID is required";
    }

} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}

echo json_encode($data);
?>