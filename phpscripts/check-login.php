<?php

function check_login($con)
{
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_type'])) {
        $user_id = $_SESSION['user_id'];
        $user_email = $_SESSION['user_email'];
        $user_type = $_SESSION['user_type'];

        $query = "SELECT * FROM users_data WHERE user_id = '$user_id' OR user_email = '$user_email' AND user_type = '$user_type' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    } else if (isset($_SESSION['student_id']) && isset($_SESSION['student_email'])) {
        $student_id = $_SESSION['student_id'];
        $student_email = $_SESSION['student_email'];
        $query = "SELECT * FROM student_data WHERE student_id = '$student_id' OR student_email = '$student_email' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    header("Location: ./");
    die;
}
