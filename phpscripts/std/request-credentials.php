<?php
session_start();

include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $student_number = isset($_POST['student_number']) ? mysqli_real_escape_string($con, $_POST['student_number']) : '';
    $student_name = isset($_POST['student_name']) ? mysqli_real_escape_string($con, $_POST['student_name']) : '';
    $student_email = isset($_POST['student_email']) ? mysqli_real_escape_string($con, $_POST['student_email']) : '';
    $student_contact_number = isset($_POST['student_contact_number']) ? mysqli_real_escape_string($con, $_POST['student_contact_number']) : '';
    $student_year_graduated = isset($_POST['student_year_graduated']) ? mysqli_real_escape_string($con, $_POST['student_year_graduated']) : '';
    $request_purpose = isset($_POST['userAnswer']) ? mysqli_real_escape_string($con, $_POST['userAnswer']) : '';

    if (empty($student_number) || empty($student_name) || empty($student_email) || empty($student_contact_number) || empty($request_purpose)) {
        $data['status'] = "error";
        $data['message'] = "Please fill in all required fields.";
    } else if (!filter_var($student_email, FILTER_VALIDATE_EMAIL)) {
        $data['status'] = "error";
        $data['message'] = "Please provide a valid email address.";
    } else {
        $documents = [];
        if (!empty($_POST['form137Checked']) && $_POST['form137Checked'] === 'true') {
            $documents[] = "Form 137";
        }
        if (!empty($_POST['goodMoralChecked']) && $_POST['goodMoralChecked'] === 'true') {
            $documents[] = "Good Moral";
        }
        if (!empty($_POST['certificateEnrollmentChecked']) && $_POST['certificateEnrollmentChecked'] === 'true') {
            $documents[] = "Certificate of Enrollment";
        }
        if (!empty($_POST['certificateGraduationChecked']) && $_POST['certificateGraduationChecked'] === 'true') {
            $documents[] = "Certificate of Graduation";
        }
        if (!empty($_POST['secondDiplomaChecked']) && $_POST['secondDiplomaChecked'] === 'true') {
            $documents[] = "2nd Copy of Diploma";
        }

        if (empty($documents)) {
            $data['status'] = "error";
            $data['message'] = "Please select at least one document to request.";
        } else {
            $request_id = rand(10000000, 99999999);
            $student_requested = implode(", ", $documents);
            $request_status = "pending";

            $insert_query = "INSERT INTO credential_requests (request_id, student_id, student_contact_number, year_graduated, student_requested, request_purpose, request_status, datetime_request) 
                             VALUES ('$request_id', '$student_number', '$student_contact_number', '$student_year_graduated', '$student_requested', '$request_purpose', '$request_status', NOW())";

            $insert_result = mysqli_query($con, $insert_query);

            if ($insert_result) {
                $data['status'] = "success";
                $data['message'] = "Your credential request has been successfully submitted.";
            } else {
                $data['status'] = "error";
                $data['message'] = "Failed to submit request. Please try again later.";
            }
        }
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method. Please try again later.";
}

echo json_encode($data);
?>