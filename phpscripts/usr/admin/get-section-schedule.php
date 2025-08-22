<?php
session_start(); // Start session
include("../../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check for required parameters
    if (isset($_GET['course'], $_GET['section'], $_GET['year_level'])) {
        $course = mysqli_real_escape_string($con, $_GET['course']);
        $section = mysqli_real_escape_string($con, $_GET['section']);
        $year_level = mysqli_real_escape_string($con, $_GET['year_level']);

        // Query to fetch the schedule
        $schedule_query = "
            SELECT 
                ss.`schedule_id`, 
                ss.`student_id`, 
                ss.`subject_id`, 
                ss.`day_of_week`, 
                ss.`start_time`, 
                ss.`end_time`, 
                ss.`instructor_name`, 
                ss.`semester`, 
                ss.`created_at`, 
                ss.`updated_at`
            FROM 
                `student_schedules` ss
            INNER JOIN 
                `student_data` sd 
            ON 
                ss.`student_id` = sd.`student_id`
            WHERE 
                sd.`student_course` = '$course' AND 
                sd.`student_section` = '$section' AND 
                sd.`student_year_level` = '$year_level'
        ";
        $schedule_result = mysqli_query($con, $schedule_query);

        if ($schedule_result) {
            $schedule = mysqli_fetch_all($schedule_result, MYSQLI_ASSOC);

            // Fetch subject details for each schedule entry
            foreach ($schedule as &$entry) {
                $subject_id = $entry['subject_id'];

                $subject_query = "
                    SELECT `subject_id`, `course_id`, `subject_name`, `subject_code`, `lec_units`, 
                           `lab_units`, `semester`, `year_level`
                    FROM `academic_subjects`
                    WHERE `subject_id` = '$subject_id'
                ";
                $subject_result = mysqli_query($con, $subject_query);

                if ($subject_result && mysqli_num_rows($subject_result) > 0) {
                    $subject_details = mysqli_fetch_assoc($subject_result);

                    // Add subject details to schedule entry
                    $entry['subject'] = [
                        'subject_id' => $subject_details['subject_id'],
                        'subject_name' => $subject_details['subject_name'],
                        'subject_code' => $subject_details['subject_code'],
                        'lec_units' => $subject_details['lec_units'],
                        'lab_units' => $subject_details['lab_units'],
                        'semester' => $subject_details['semester'],
                        'year_level' => $subject_details['year_level'],
                    ];
                } else {
                    $entry['subject'] = null;
                }
            }

            $data['status'] = 'success';
            $data['schedule'] = $schedule;
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to retrieve schedule.';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Missing required parameters.';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method.';
}

echo json_encode($data);
?>