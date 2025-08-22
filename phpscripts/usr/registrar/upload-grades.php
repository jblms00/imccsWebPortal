<?php
session_start();
include("../../database-connection.php");
require("../../../assets/vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\IOFactory;

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $section = isset($_POST['section']) ? mysqli_real_escape_string($con, $_POST['section']) : null;
    $year_level = isset($_POST['year_level']) ? mysqli_real_escape_string($con, $_POST['year_level']) : null;
    $subject = isset($_POST['subject']) ? mysqli_real_escape_string($con, $_POST['subject']) : null;

    $fileName = isset($_FILES['grade_file']['name']) ? $_FILES['grade_file']['name'] : null;
    $fileTmp = isset($_FILES['grade_file']['tmp_name']) ? $_FILES['grade_file']['tmp_name'] : null;
    $fileExtension = $fileName ? pathinfo($fileName, PATHINFO_EXTENSION) : null;

    if (in_array($fileExtension, array('xlsx', 'xls'))) {
        // Process the Excel file
        $spreadsheet = IOFactory::load($_FILES['grade_file']['tmp_name']);
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest row number
        $highestRow = $worksheet->getHighestRow();

        // Start processing from row 2 assuming the first row is a header
        $insertedRows = 0;

        for ($row = 2; $row <= $highestRow; $row++) {
            // Extract data from specific cells
            $studentId = $worksheet->getCell('A' . $row)->getValue();
            $studentName = $worksheet->getCell('B' . $row)->getValue();
            $gradeValue = $worksheet->getCell('C' . $row)->getValue();

            // Check for blank or null fields
            if (empty($studentId) || empty($studentName) || empty($gradeValue)) {
                $data['status'] = "error";
                $data['message'] = "Row $row contains empty fields.";
                continue;
            }

            // Remove dashes from the student ID
            $studentId = str_replace("-", "", $studentId);

            // Validate student ID is numeric
            if (!is_numeric($studentId)) {
                $data['status'] = "error";
                $data['message'] = "Row $row: Student ID must be numeric after removing dashes.";
                continue;
            }

            // Check if student ID exists in the student_data table
            $checkSql = "SELECT student_id FROM student_data WHERE student_id = '$studentId'";
            $checkResult = mysqli_query($con, $checkSql);

            if (mysqli_num_rows($checkResult) == 0) {
                $data['status'] = "error";
                $data['message'] = "Row $row: Student ID $studentId does not exist in the database.";
                continue;
            }

            // Insert data into the student_grades table
            $gradeId = rand(100000, 999999);

            $sql = "INSERT INTO student_grades (grade_id, student_id, subject_id, grade_value, datetime_added) 
                    VALUES ('$gradeId', '$studentId', '$subject', '$gradeValue', NOW())";

            $result = mysqli_query($con, $sql);
            if ($result) {
                $insertedRows++;
            } else {
                $data['status'] = "error";
                $data['message'] = "Row $row: Failed to save data to the database.";
            }
        }

        // Determine the response based on results
        if ($insertedRows > 0) {
            $data['status'] = "success";
            $data['message'] = "$insertedRows rows successfully inserted.";
        } else {
            $data['status'] = "error";
            $data['message'] = "No rows were inserted. Please check the errors.";
        }
    } else {
        $data['status'] = "error";
        $data['message'] = "Only Excel files (XLSX, XLS) are allowed.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>