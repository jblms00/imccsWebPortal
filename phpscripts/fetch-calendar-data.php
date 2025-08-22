<?php
session_start();

include("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT * FROM academic_calendar";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $holidays = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $holidays[] = [
                'event_id' => $row['calendar_id'],
                'event_name' => $row['event_name'],
                'event_date' => $row['event_date'],
                'is_holiday' => $row['is_holiday'],
            ];
        }
        $data['status'] = 'success';
        $data['holidays'] = $holidays;
    } else {
        $data['status'] = "error";
        $data['message'] = "No holidays found";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}

echo json_encode($data);
?>