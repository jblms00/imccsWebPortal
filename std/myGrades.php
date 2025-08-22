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
</head>

<body class="student-pg" data-student-id="<?php echo checkValue($user_data['student_id']); ?>">
    <?php include("../includes/components/navbar.php"); ?>
    <main>
        <section class="grades-container container" style="padding: 4rem 0;">
            <div class="table-container mb-5">
                <table id="recordsTbl" class="table table-bordered border-success animation-left"
                    style="width: 50%; margin: auto;">
                    <thead>
                        <tr>
                            <th style="background-color: var(--mainbg3) !important;">Record Number</th>
                            <th style="background-color: var(--mainbg3) !important;">School Year</th>
                            <th style="background-color: var(--mainbg3) !important;"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="grades-table-container"></div>
        </section>
    </main>
    <?php include("../includes/scripts.php"); ?>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="../assets/js/components/navbar.js"></script>
    <script src="../assets/js/std/studentGrades.js"></script>
</body>

</html>