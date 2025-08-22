<?php
session_start();
include("../phpscripts/database-connection.php");
include("../phpscripts/check-login.php");
$user_data = check_login($con);

function checkValue($value)
{
    return !empty(trim($value)) ? $value : "N/A";
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include("../includes/header.php"); ?>
    <style>
        *::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="student-pg" data-student-id="<?php echo checkValue($user_data['student_id']); ?>"
    data-student-name="<?php echo checkValue($user_data['student_name']); ?>"
    data-year-level="<?php echo checkValue($user_data['student_year_level']); ?>"
    data-section="<?php echo checkValue($user_data['student_section']); ?>">
    <?php include("../includes/components/navbar.php"); ?>
    <main>
        <div class="table-container container" style="padding: 2rem 1rem;">
            <table class="table table-striped table-bordered table-responsive border-success animation-right"
                id="tblSchedule">
                <thead>
                    <th colspan="5" class="text-center" style="background-color: var(--mainbg3) !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="text-uppercase fw-semibold">Class Schedule</h3>
                            <button type="button" class="btn btn-sm btn-primary print-schedule">Print Schedule</button>
                        </div>
                    </th>
                </thead>
                <thead>
                    <th style="background-color: var(--mainbg3) !important;">Subject Code</th>
                    <th style="background-color: var(--mainbg3) !important;">Subject Description</th>
                    <th style="background-color: var(--mainbg3) !important;">Days of Week</th>
                    <th style="background-color: var(--mainbg3) !important;">Time</th>
                    <th style="background-color: var(--mainbg3) !important;">Professor</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="container animation-left" style="padding: 4rem 1rem;">
            <div id='calendar'></div>
        </div>
    </main>
    <?php include("../includes/components/toast.php"); ?>
    <?php include("../includes/scripts.php"); ?>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="../assets/js/components/navbar.js"></script>
    <script src="../assets/js/std/studentHomepage.js"></script>
</body>

</html>