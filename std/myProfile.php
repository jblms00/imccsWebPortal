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

<body class="student-pg" data-student-id="<?php echo checkValue($user_data['student_id']); ?>"
    data-student-name="<?php echo checkValue($user_data['student_name']); ?>"
    data-year-level="<?php echo checkValue($user_data['student_year_level']); ?>"
    data-section="<?php echo checkValue($user_data['student_section']); ?>">
    <?php include("../includes/components/navbar.php"); ?>
    <main>
        <div class="profile-container container pt-4">
            <div class="row align-items-center my-5 animation-left">
                <div class="col-sm text-center" id="imageColumn">
                    <input type="file" id="fileInput" style="display: none;" accept="image/*">
                    <img src="" id="userImage" class="user-profile-img" alt="Image" style="cursor: pointer;">
                </div>
            </div>
            <div class="row align-items-center my-4 animation-right">
                <div class="col-sm">
                    <div class="table-responsive">
                        <table class="table table-bordered m-auto" style="width: 70%;">
                            <thead>
                                <tr class="border-success">
                                    <th class="fw-bold text-uppercase table-primary border-success">Student Number
                                    </th>
                                    <th class="fw-light" id="studentNumber"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-success">
                                    <td class="fw-bold text-uppercase table-primary border-success">Name</td>
                                    <td id="studentName"></td>
                                </tr>
                                <tr class="border-success">
                                    <td class="fw-bold text-uppercase table-primary border-success">Course</td>
                                    <td id="studentCourse"></td>
                                </tr>
                                <tr class="border-success">
                                    <td class="fw-bold text-uppercase table-primary border-success">Section</td>
                                    <td id="studentSection"></td>
                                </tr>
                                <tr class="border-success">
                                    <td class="fw-bold text-uppercase table-primary border-success">Year Level
                                    </td>
                                    <td id="studentYearLevel"></td>
                                </tr>
                                <tr class="border-success">
                                    <td class="fw-bold text-uppercase table-primary border-success">Tuition Fee Balance
                                    </td>
                                    <td id="tuiotionBalance"></td>
                                </tr>
                                <tr class="border-success">
                                    <td class="fw-bold text-uppercase table-primary border-success">Password
                                    </td>
                                    <td id="defaultPassword"></td>
                                </tr>
                                <tr class="border-success text-center">
                                    <td colspan="2" class="fw-bold text-uppercase table-primary border-success">
                                        <button type="button" class="btn btn-primary py-1 w-25" data-bs-toggle="modal"
                                            data-bs-target="#modalChangePassword">Change Password</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("../includes/components/toast.php"); ?>
    <div class="modal fade" id="modalChangePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content change-password-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 custom-text-color fw-bold">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">Current Password</p>
                            <input type="text" id="oldPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">New Password</p>
                            <input class="mb-1" type="password" id="newPassword">
                            <div class="show-password mb-4">
                                <input type="checkbox" class="toggle-new-password mb-0">
                                <label>Show Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">Confirm New Password</p>
                            <input class="mb-1" type="password" id="confirmPassword">
                            <div class="show-password">
                                <input type="checkbox" class="toggle-confirm-password mb-0">
                                <label>Show Password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary py-1" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary student-change-password py-1">Save</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/scripts.php"); ?>
    <script src="../assets/js/components/navbar.js"></script>
    <script src="../assets/js/std/studentProfile.js"></script>
</body>

</html>