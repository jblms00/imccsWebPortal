<?php
session_start();
include("../phpscripts/database-connection.php");
include("../phpscripts/check-login.php");
$user_data = check_login($con);
?>
<!doctype html>
<html lang="en">

<head>
    <?php include("../includes/header.php"); ?>
</head>

<body class="student-pg" data-student-id="<?php echo $user_data['student_id']; ?>">
    <?php include("../includes/components/navbar.php"); ?>
    <main>
        <div class="container py-4">
            <div class="row align-items-center my-4">
                <div class="col-sm">
                    <form id="requestForm" class="request-credential-form animation-right">
                        <div class="form-header mb-4">
                            <h2 class="m-0 text-light text-center text-uppercase fw-semibold">Request Credentials</h2>
                            <h5 class="text-light text-center fw-light">myIMCC Portal</h5>
                        </div>
                        <div class="input-data mb-3">
                            <h6 class="fw-semibold">Student Number <span class="text-danger">*</span></h6>
                            <input type="text" id="userStudentNumber" class="form-control"
                                value="<?php echo $user_data['student_id']; ?>" placeholder="Your student number"
                                autocomplete="off">
                        </div>
                        <div class="input-data mb-3">
                            <h6 class="fw-semibold">Name <span class="text-danger">*</span></h6>
                            <input type="text" id="userName" class="form-control"
                                value="<?php echo $user_data['student_name']; ?>" placeholder="Your name"
                                autocomplete="off">
                        </div>
                        <div class="input-data mb-3">
                            <h6 class="fw-semibold">Email <span class="text-danger">*</span></h6>
                            <input type="email" id="userEmail" class="form-control" placeholder="Your email"
                                value="<?php echo $user_data['student_email']; ?>" autocomplete="off">
                        </div>
                        <div class="input-data mb-3">
                            <h6 class="fw-semibold">Contact Number <span class="text-danger">*</span></h6>
                            <input type="text" id="userContactNumber" class="form-control"
                                placeholder="Your contact number" autocomplete="off">
                        </div>
                        <div class="input-data mb-3">
                            <h6 class="fw-semibold">Year Graduated (if applicable)</h6>
                            <input type="text" id="userYear" class="form-control" placeholder="Your year"
                                autocomplete="off">
                        </div>
                        <div class="input-data mb-3">
                            <h6 class="fw-semibold">Which Registrar Document(s) do you need? Please select the relevant
                                document(s) by checking the box(es) below <span class="text-danger">*</span></h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="document[]" value="Form 137"
                                    id="form137">
                                <label class="form-check-label" for="form137">Form 137</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="document[]" value="Good Moral"
                                    id="goodMoral">
                                <label class="form-check-label" for="goodMoral">Good Moral</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="document[]"
                                    value="Certificate of Enrollment" id="certificateEnrollment">
                                <label class="form-check-label" for="certificateEnrollment">Certificate of
                                    Enrollment</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="document[]"
                                    value="Certificate of Graduation" id="certificateGraduation">
                                <label class="form-check-label" for="certificateGraduation">Certificate of
                                    Graduation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="document[]"
                                    value="2nd Copy of Diploma" id="secondDiploma">
                                <label class="form-check-label" for="secondDiploma">2nd Copy of Diploma</label>
                            </div>
                        </div>
                        <div class="input-data mb-3">
                            <h6 class="fw-semibold">What is the purpose of the requested credential(s)? <span
                                    class="text-danger">*</span></h6>
                            <input type="text" id="userAnswer" class="form-control" placeholder="Your answer"
                                autocomplete="off">
                        </div>
                        <div class="display-message"></div>
                        <div class="submit-button text-center">
                            <button type="submit" class="btn btn-primary-subtle text-dark py-1 w-50"
                                style="background-color: var(--mainbg3);">Submit
                                Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include("../includes/components/toast.php"); ?>
    <?php include("../includes/scripts.php"); ?>
    <script src="../assets/js/components/navbar.js"></script>
    <script src="../assets/js/std/requestCredential.js"></script>
</body>

</html>