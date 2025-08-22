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

<body class="student-pg" data-student-course="<?php echo checkValue($user_data['student_course']); ?>">
    <?php include("../includes/components/navbar.php"); ?>
    <main>
        <section class="container-fluid" id="prospectusSection" style="padding: 4rem;"></section>
    </main>
    <?php include("../includes/components/toast.php"); ?>
    <?php include("../includes/scripts.php"); ?>
    <script src="../assets/js/components/navbar.js"></script>
    <script src="../assets/js/std/prospectus.js"></script>
</body>

</html>