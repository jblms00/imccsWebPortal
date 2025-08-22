<?php
session_start();
include("database-connection.php");

if (isset($_SESSION['student_email']) || isset($_SESSION['student_id'])) {
    $student_identifier = isset($_SESSION['student_email']) ? $_SESSION['student_email'] : $_SESSION['student_id'];

    $get_student_query = "SELECT * FROM student_data WHERE student_email = '$student_identifier' OR student_id = '$student_identifier'";
    $get_student_result = mysqli_query($con, $get_student_query);

    if ($get_student_result && mysqli_num_rows($get_student_result) > 0) {
        session_destroy();
        header("Location: ../");
        exit;
    }
} else if (isset($_SESSION['user_email']) || isset($_SESSION['user_id']) || isset($_SESSION['user_type'])) {
    $user_identifier = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];

    $get_user_query = "SELECT * FROM users_data WHERE user_email = '$user_identifier' OR user_id = '$user_identifier' AND user_type = '$user_type'";
    $get_user_result = mysqli_query($con, $get_user_query);

    if ($get_user_result && mysqli_num_rows($get_user_result) > 0) {
        session_destroy();
        header("Location: ../");
        exit;
    }
} else {
    header("Location: ../");
    exit;
}
