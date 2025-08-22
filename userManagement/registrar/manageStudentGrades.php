<?php
session_start();
include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");
$user_data = check_login($con);
$user_type = ucfirst($user_data['user_type']);

?>
<!doctype html>
<html lang="en">

<head>
    <?php include("../../includes/header.php"); ?>
</head>

<body class="usr-management">
    <?php include("../../includes/components/sidebar.php"); ?>
    <main class="home-section">
        <div class="page-title animation-downwards">
            <h3 class="fw-bold custom-text-color">Manage Student Grades</h3>
        </div>
        <section class="registrar-home">
            <div class="row">
                <div class="col">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="first-year mb-4">
                            <h4 class="fw-semibold">1st Year</h4>
                            <div class="card-container"></div>
                        </div>
                        <div class="second-year mb-4">
                            <h4 class="fw-semibold">2nd Year</h4>
                            <div class="card-container"></div>
                        </div>
                        <div class="third-year mb-4">
                            <h4 class="fw-semibold">3rd Year</h4>
                            <div class="card-container"></div>
                        </div>
                        <div class="fourth-year">
                            <h4 class="fw-semibold">4th Year</h4>
                            <div class="card-container"></div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div id="studentList" class="student-list animation-right"></div>
                </div>
            </div>
        </section>
    </main>
    <div class="modal fade" id="uploadGrades" tabindex="-1" aria-labelledby="uploadGradesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="uploadGradesForm">
                        <div class="mb-3">
                            <label for="section" class="form-label fw-semibold mb-0">Section</label>
                            <input type="text" class="form-control" name="section" id="section" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="yearLevel" class="form-label fw-semibold mb-0">Year Level</label>
                            <input type="text" class="form-control" name="year_level" id="yearLevel" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-semibold mb-0">Subject</label>
                            <select class="form-select" name="subject" id="subject">
                                <option value="" disabled selected>Select a subject</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gradeFile" class="form-label fw-semibold mb-0">Upload Grades (Excel file
                                only)</label>
                            <input type="file" class="form-control" name="grade_file" id="gradeFile"
                                accept=".xls, .xlsx">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-primary w-50">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../../includes/components/toast.php"); ?>
    <?php include("../../includes/scripts.php"); ?>
    <script src="../../assets/js/components/sidebar.js"></script>
    <script src="../../assets/js/rgstrar/manageStudentGrades.js"></script>
</body>

</html>