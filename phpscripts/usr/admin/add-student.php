<?php
session_start();

include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $studentName = isset($_POST['student_name']) ? mysqli_real_escape_string($con, $_POST['student_name']) : '';
    $studentId = isset($_POST['student_id']) ? mysqli_real_escape_string($con, $_POST['student_id']) : '';
    $email = isset($_POST['student_email']) ? mysqli_real_escape_string($con, $_POST['student_email']) : '';
    $course = isset($_POST['course_id']) ? mysqli_real_escape_string($con, $_POST['course_id']) : '';
    $section = isset($_POST['section']) ? mysqli_real_escape_string($con, $_POST['section']) : '';
    $yearLevel = isset($_POST['year_level']) ? mysqli_real_escape_string($con, $_POST['year_level']) : '';
    $enrollmentDate = isset($_POST['student_enrollment_date']) ? mysqli_real_escape_string($con, $_POST['student_enrollment_date']) : '';

    $data['studentName'] = $studentName;
    $data['studentId'] = $studentId;
    $data['email'] = $email;
    $data['course'] = $course;
    $data['section'] = $section;
    $data['yearLevel'] = $yearLevel;
    $data['enrollmentDate'] = $enrollmentDate;

    if (empty($studentName) || empty($studentId) || empty($email) || empty($course) || empty($section) || empty($yearLevel) || empty($enrollmentDate)) {
        $data['status'] = 'error';
        $data['message'] = 'All fields are required';
    } else if (!is_numeric($studentId)) {
        $data['status'] = 'error';
        $data['message'] = 'Student ID must be a numeric value.';
    } else {
        // Generate the password based on the last 3 letters of the last name and last 5 digits of the student ID
        $lastName = explode(" ", $studentName)[1]; // Assuming the student's name is "First Last"
        $lastNamePart = substr($lastName, -3); // Last 3 letters of the last name
        $studentIdPart = substr($studentId, -5); // Last 5 digits of the student ID
        $password = strtolower($lastNamePart . $studentIdPart);
        $encodedPassword = base64_encode($password);

        // Insert the student data into the database
        $query = "INSERT INTO student_data (student_id, student_name, student_email, student_course, student_section, student_year_level, student_password, student_enrollment_date) 
                  VALUES ('$studentId', '$studentName', '$email', '$course', '$section', '$yearLevel', '$encodedPassword', '$enrollmentDate')";

        if (mysqli_query($con, $query)) {
            $data['status'] = 'success';
            $data['message'] = 'Student added successfully';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to add student: ' . mysqli_error($con);
        }
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>