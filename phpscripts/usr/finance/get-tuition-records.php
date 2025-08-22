<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $get_records_query = "
        SELECT s.student_id, s.student_name, t.*
        FROM student_data s
        JOIN student_tuition_record t ON s.student_id = t.student_id
    ";
    $get_records_result = mysqli_query($con, $get_records_query);

    if ($get_records_result && mysqli_num_rows($get_records_result) > 0) {
        $data['records'] = [];
        while ($fetch_information = mysqli_fetch_assoc($get_records_result)) {
            $data['records'][] = $fetch_information;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = "error";
        $data['message'] = "Tuition records not found";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method. Please try again.";
}

echo json_encode($data);
?>