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

<body class="usr-management" data-user-email="<?php echo $user_data['user_email'] ?>"
    data-user-id="<?php echo $user_data['user_id'] ?>">
    <?php include("../../includes/components/sidebar.php"); ?>
    <main class="home-section">
        <div class="page-title">
            <h3 class="fw-bold custom-text-color">Manage Courses</h3>
        </div>
        <section>
            <div class="table-container animation-left">
                <table class="display table-bordered table-striped table-light border border-opacity-50"
                    id="coursesTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </section>
    </main>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="courseId">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Course Code</span>
                        <input type="text" class="form-control" id="courseCode" placeholder="Course Code"
                            aria-label="Course Code">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Course Name</span>
                        <input type="text" class="form-control" id="courseName" placeholder="Course Name"
                            aria-label="Course Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" id="saveCourseBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteConfirmationModalLabel">Delete Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="courseId">
                    <p>Are you sure you want to delete this course?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../../includes/components/toast.php"); ?>
    <?php include("../../includes/scripts.php"); ?>
    <script src="../../assets/js/components/sidebar.js"></script>
    <script src="../../assets/js/admin/manageCourses.js"></script>
</body>

</html>