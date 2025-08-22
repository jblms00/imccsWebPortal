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
            <h3 class="fw-bold custom-text-color">Homepage</h3>
        </div>
        <section>
            <div class="table-container animation-left">
                <table class="display table-bordered table-striped table-light border border-opacity-50"
                    id="tuitionsTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAllCheckbox"></th>
                            <th>Student Number</th>
                            <th>Student Name</th>
                            <th>Tuition Balance</th>
                            <th>Tuition Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </section>
    </main>
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Record Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="statusSelect" class="fw-semibold">Select Status:</label>
                        <select id="statusSelect" class="form-select">
                            <option selected disabled>Select Tuition Fee Status</option>
                            <option value="Paid">Paid</option>
                            <option value="Pending">Pending</option>
                            <option value="Overdue">Overdue</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amountInput" class="fw-semibold">Amount:</label>
                        <input type="number" id="amountInput" class="form-control" placeholder="Enter new amount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm" id="saveStatusBtn">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../../includes/components/toast.php"); ?>
    <?php include("../../includes/scripts.php"); ?>
    <script src="../../assets/js/components/sidebar.js"></script>
    <script src="../../assets/js/fnnce/manageStudentTuition.js"></script>
</body>

</html>