<?php
session_start();
include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $student_account = $_POST['userAccount'];
    $student_password = $_POST['userPassword'];

    // Validate IMCC email format
    if (filter_var($student_account, FILTER_VALIDATE_EMAIL) && strpos($student_account, '@imcc.edu.ph') === false) {
        $data['status'] = "error";
        $data['message'] = "Please use a valid IMCC email.";
        echo json_encode($data);
        exit();
    }

    $get_students_query = "SELECT * FROM student_data WHERE student_id = '$student_account' OR student_email = '$student_account'";
    $get_students_result = mysqli_query($con, $get_students_query);
    $fetch_students = mysqli_fetch_assoc($get_students_result);

    if ($get_students_result && mysqli_num_rows($get_students_result) <= 0) {
        $data['status'] = "error";
        $data['message'] = "No student account found";
    } else if (empty($student_account) || empty($student_password)) {
        $data['status'] = "error";
        $data['message'] = "Please enter your student number or student email and password";
    } else if (!($student_account == $fetch_students['student_email'] || $student_account == $fetch_students['student_id'])) {
        $data['status'] = "error";
        $data['message'] = "Incorrect student number or email. Please try again.";
    } else if (base64_encode($student_password) != $fetch_students['student_password']) {
        $data['status'] = "error";
        $data['message'] = "Incorrect password. Please try again.";
    } else {
        $_SESSION['student_id'] = $fetch_students['student_id'];
        $_SESSION['student_email'] = $fetch_students['student_email'];
        $data['status'] = "success";
        $data['message'] = "Login Successfully!";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method. Please try again.";
}

echo json_encode($data);
