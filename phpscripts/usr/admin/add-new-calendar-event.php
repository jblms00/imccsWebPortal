<?php
session_start();

include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = isset($_POST['title']) ? mysqli_real_escape_string($con, $_POST['title']) : '';
    $date = isset($_POST['date']) ? mysqli_real_escape_string($con, $_POST['date']) : '';
    $isHoliday = isset($_POST['isHoliday']) ? mysqli_real_escape_string($con, $_POST['isHoliday']) : '';

    if (empty($title) || empty($date)) {
        $data['status'] = 'error';
        $data['message'] = 'All fields are required';
    } else {
        $calendar_id = rand(10000000, 99999999);
        $event_month = date("F", strtotime($date));

        $query = "INSERT INTO academic_calendar (calendar_id, event_name, event_month, event_date, is_holiday) 
                  VALUES ('$calendar_id', '$title', '$event_month', '$date', '$isHoliday')";

        if (mysqli_query($con, $query)) {
            $data['status'] = 'success';
            $data['message'] = 'Event added successfully';
            $data['event_id'] = mysqli_insert_id($con);
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to add event: ' . mysqli_error($con);
        }
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>