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
    data-user-id="<?php echo $user_data['user_id'] ?>" data-user-name="<?php echo $user_data['user_name'] ?>">
    <?php include("../../includes/components/sidebar.php"); ?>
    <div class="logo-container main-bg d-flex align-items-center">
        <img src="../../assets/images/logo1.png" alt="img" width="60">
        <div class="title">
            <h4 class="ms-3 text-light fw-bold text-uppercase mb-0">Iligan Medical</h4>
            <h4 class="ms-3 text-light fw-bold text-uppercase mb-0">Center College</h4>
        </div>
    </div>
    <main class="home-section">
        <div class="page-title d-flex align-items-center justify-content-between">
            <h3 class="fw-bold custom-text-color">Manage Students</h3>
            <button type="button" class="btn btn-sm btn-primary add-section">Add Section</button>
        </div>
        <section class="admin-home">
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
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Dynamic content will be inserted here -->
                </div>
            </div>
        </div>
    </div>
    <?php include("../../includes/components/toast.php"); ?>
    <?php include("../../includes/scripts.php"); ?>
    <script src="../../assets/js/components/sidebar.js"></script>
    <script src="../../assets/js/admin/manageStudents.js"></script>
</body>

</html>