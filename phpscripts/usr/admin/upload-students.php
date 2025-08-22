<?php
session_start();
include("../../database-connection.php");
require("../../../assets/vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\IOFactory;

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if all necessary fields are provided
    if (isset($_POST['course_id']) && isset($_POST['student_year_level']) && isset($_POST['section_name']) && isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] === UPLOAD_ERR_OK) {

        $courseId = mysqli_real_escape_string($con, $_POST['course_id']);
        $yearLevel = mysqli_real_escape_string($con, $_POST['student_year_level']);
        $sectionName = mysqli_real_escape_string($con, $_POST['section_name']);
        $fileName = $_FILES['excel_file']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if (in_array($fileExtension, array('xlsx', 'xls'))) {
            // Process the Excel file
            $spreadsheet = IOFactory::load($_FILES['excel_file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet();

            // Get the highest row number
            $highestRow = $worksheet->getHighestRow();

            // Start from row 2 assuming the first row is for headers
            for ($row = 2; $row <= $highestRow; $row++) {
                // Extract data from specific cells for each row
                $studentId = $worksheet->getCell('A' . $row)->getValue();
                $studentName = $worksheet->getCell('B' . $row)->getValue();
                $studentEmail = $worksheet->getCell('C' . $row)->getValue();
                $studentEnrollmentDate = $worksheet->getCell('D' . $row)->getValue();

                // Check if any of the required fields are empty or blank
                if (empty($studentId) || empty($studentName) || empty($studentEmail) || empty($studentEnrollmentDate)) {
                    $data['status'] = "error";
                    $data['message'] = "Row $row contains empty required fields. Please fill in all required fields.";
                    break;
                }

                // Generate password based on last 3 letters of last name and last 5 digits of student ID
                $lastName = explode(" ", $studentName)[1]; // Assuming the student's name is "First Last"
                $lastNamePart = substr($lastName, -3); // Last 3 letters of the last name
                $studentIdPart = substr($studentId, -5); // Last 5 digits of the student ID
                $password = strtolower($lastNamePart . $studentIdPart); // Combined password
                $encodedPassword = base64_encode($password); // Base64 encoded password

                // SQL query to insert student data into the database
                $sql = "INSERT INTO student_data (student_id, student_name, student_email, student_course, student_section, student_year_level, student_photo, student_password, student_enrollment_date) 
                        VALUES ('$studentId', '$studentName', '$studentEmail', '$courseId', '$sectionName', '$yearLevel', '', '$encodedPassword', '$studentEnrollmentDate')";

                if (!empty($studentId)) {
                    $result = mysqli_query($con, $sql);
                    if (!$result) {
                        $data['status'] = "error";
                        $data['message'] = "Failed to save data to the database.";
                        break;
                    }
                }
            }

            // Return success message if no error occurred
            if (!isset($data['status'])) {
                $data['status'] = "success";
                $data['message'] = "Student data saved successfully.";
            }
        } else {
            $data['status'] = "error";
            $data['message'] = "Only Excel files (XLSX, XLS) are allowed.";
        }
    } else {
        $data['status'] = "error";
        $data['message'] = "Required fields missing or file upload failed.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>