<?php
session_start();
include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_email = $_POST['userAccount'];
    $user_type = $_POST['userType'];
    $user_password = $_POST['userPassword'];

    if (empty($user_type) || !in_array($user_type, ['admin', 'finance', 'registrar'])) {
        $data['status'] = "error";
        $data['message'] = "Invalid user type. Please select a valid user type.";
        echo json_encode($data);
        exit();
    }

    $get_users_query = "SELECT * FROM users_data WHERE user_email = '$user_email' AND user_type = '$user_type'";
    $get_users_result = mysqli_query($con, $get_users_query);
    $fetch_users = mysqli_fetch_assoc($get_users_result);

    if ($get_users_result && mysqli_num_rows($get_users_result) <= 0) {
        $data['status'] = "error";
        $data['message'] = "Account not found";
    } else if (empty($user_email) || empty($user_password)) {
        $data['status'] = "error";
        $data['message'] = "Please enter your email and password.";
    } else if ($user_email != $fetch_users['user_email']) {
        $data['status'] = "error";
        $data['message'] = "Incorrect email. Please try again.";
    } else if (base64_encode($user_password) != $fetch_users['user_password']) {
        $data['status'] = "error";
        $data['message'] = "Incorrect password. Please try again.";
    } else {
        $_SESSION['user_id'] = $fetch_users['user_id'];
        $_SESSION['user_email'] = $fetch_users['user_email'];
        $_SESSION['user_type'] = $fetch_users['user_type'];
        $data['user_type'] = $fetch_users['user_type'];
        $data['status'] = "success";
        $data['message'] = "Login Successfully!";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method. Please try again.";
}

echo json_encode($data);
?>