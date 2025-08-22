<?php
session_start();

include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $get_students_query = " SELECT student_data.*, course.course_id FROM student_data JOIN course ON student_data.student_course = course.course_id";
    $get_students_result = mysqli_query($con, $get_students_query);

    if ($get_students_result && mysqli_num_rows($get_students_result) > 0) {
        $data['students_info'] = [];
        while ($fetch_information = mysqli_fetch_assoc($get_students_result)) {
            $data['students_info'][] = $fetch_information;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = "error";
        $data['message'] = "Students not found";
    }

} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}
echo json_encode($data);