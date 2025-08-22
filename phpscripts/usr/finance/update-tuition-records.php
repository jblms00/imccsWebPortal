<?php
session_start();
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $recordIds = $_POST['recordIds'];
    $status = $_POST['status'];
    $amount = $_POST['amount'];

    if ($status === "Paid") {
        $amount = 0;
    }

    if (!empty($recordIds)) {
        $status = mysqli_real_escape_string($con, $status);
        $amount = mysqli_real_escape_string($con, $amount);
        $recordIdsStr = implode(",", array_map('intval', $recordIds));

        $update_query = "
            UPDATE student_tuition_record 
            SET payment_status = '$status', amount = '$amount'
            WHERE record_id IN ($recordIdsStr)
        ";

        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            $data['status'] = 'success';
            $data['message'] = 'Records updated successfully.';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to update records.';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'No records selected for update.';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method. Please try again.';
}

echo json_encode($data);
