<?php
session_start();

include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $eventId = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';
    $title = isset($_POST['title']) ? mysqli_real_escape_string($con, $_POST['title']) : '';
    $date = isset($_POST['date']) ? mysqli_real_escape_string($con, $_POST['date']) : '';
    $isHoliday = isset($_POST['isHoliday']) ? mysqli_real_escape_string($con, $_POST['isHoliday']) : '';

    if (empty($eventId) || empty($title) || empty($date)) {
        $data['status'] = 'error';
        $data['message'] = 'Missing required fields';
    } else {
        $event_month = date("F", strtotime($date));

        $query = "UPDATE academic_calendar 
                  SET event_name = '$title', event_date = '$date', event_month = '$event_month', is_holiday = '$isHoliday' 
                  WHERE calendar_id = '$eventId'";

        if (mysqli_query($con, $query)) {
            $data['status'] = 'success';
            $data['message'] = 'Event updated successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to update event: ' . mysqli_error($con);
        }
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>