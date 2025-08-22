<?php
session_start();
include("../../database-connection.php");
require("../../../assets/vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\IOFactory;

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get the POST data
    $courseId = mysqli_real_escape_string($con, $_POST['course_id']);
    $yearLevel = mysqli_real_escape_string($con, $_POST['year_level']);
    $sectionName = mysqli_real_escape_string($con, $_POST['section']);
    $semester = mysqli_real_escape_string($con, $_POST['semester']);
    $fileName = $_FILES['schedule_file']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    if (empty($semester) || empty($courseId) || empty($yearLevel) || empty($sectionName) || empty($fileName)) {
        $data['status'] = "error";
        $data['message'] = "Required fields missing or file upload failed.";
    } else {


        if (in_array($fileExtension, array('xlsx', 'xls'))) {
            // Process the Excel file
            $spreadsheet = IOFactory::load($_FILES['schedule_file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet();

            // Get the highest row number (starting from 2, assuming row 1 is for headers)
            $highestRow = $worksheet->getHighestRow();

            // Loop through each row to get the subjects
            for ($row = 2; $row <= $highestRow; $row++) {
                // Extract subject data
                $subjectCode = $worksheet->getCell('A' . $row)->getValue();
                $subjectName = $worksheet->getCell('B' . $row)->getValue();
                $dayOfWeek = $worksheet->getCell('C' . $row)->getValue();
                $startTime = $worksheet->getCell('D' . $row)->getValue();
                $endTime = $worksheet->getCell('E' . $row)->getValue();
                $professor = $worksheet->getCell('F' . $row)->getValue();

                $startTime = gmdate("H:i", $startTime * 24 * 60 * 60); // Convert to hours and minutes
                $endTime = gmdate("H:i", $endTime * 24 * 60 * 60);

                $data['subjectCode'] = $subjectCode;
                $data['subjectName'] = $subjectName;
                $data['dayOfWeek'] = $dayOfWeek;
                $data['startTime'] = $startTime;
                $data['endTime'] = $endTime;
                $data['professor'] = $professor;

                // Query to check if the subject code exists in the database
                $sql = "SELECT subject_id FROM academic_subjects WHERE subject_code = '$subjectCode'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // If the subject code exists, get the subject_id
                    $subjectId = mysqli_fetch_assoc($result)['subject_id'];
                } else {
                    // If subject code does not exist, set an error and exit
                    $data['status'] = "error";
                    $data['message'] = "Subject code '$subjectCode' does not exist.";
                    echo json_encode($data);
                    exit;
                }

                // Fetch students from the selected course, section, and year level
                $sql = "SELECT student_id FROM student_data WHERE student_course = '$courseId' AND student_section = '$sectionName' AND student_year_level = '$yearLevel'";
                $studentsResult = mysqli_query($con, $sql);

                // Insert schedule for each student
                while ($student = mysqli_fetch_assoc($studentsResult)) {
                    $studentId = $student['student_id'];

                    // Insert schedule into the student_schedules table
                    $scheduleId = rand(100000, 999999);
                    $insertScheduleSql = "INSERT INTO student_schedules (schedule_id, student_id, subject_id, day_of_week, start_time, end_time, instructor_name, semester, created_at, updated_at) 
                                          VALUES ('$scheduleId', '$studentId', '$subjectId', '$dayOfWeek', '$startTime', '$endTime', '$professor', '$semester', NOW(), NOW())";

                    mysqli_query($con, $insertScheduleSql);
                }
            }

            $data['status'] = "success";
            $data['message'] = "Student schedule saved successfully.";
        } else {
            $data['status'] = "error";
            $data['message'] = "Only Excel files (XLSX, XLS) are allowed.";
        }
    }

} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>