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
            <h3 class="fw-bold custom-text-color">Manage Prospectus</h3>
        </div>
        <section id="prospectusSection"></section>
    </main>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="subjectId">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Subject Name</span>
                        <input type="text" class="form-control" id="subjectName" placeholder="Subject Name"
                            aria-label="Subject Name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Subject Code</span>
                        <input type="text" class="form-control" id="subjectCode" placeholder="Subject Code"
                            aria-label="Subject Code">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Lec Units</span>
                        <input type="text" class="form-control" id="lecUnits" placeholder="Lec Units"
                            aria-label="Lec Units">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Lab Units</span>
                        <input type="text" class="form-control" id="labUnits" placeholder="Lab Units"
                            aria-label="Lab Units">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" id="saveSubjectBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteConfirmationModalLabel">Delete Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="subjectId">
                    <p>Are you sure you want to delete this subject?</p>
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
    <script src="../../assets/js/admin/manageProspectus.js"></script>
</body>

</html>