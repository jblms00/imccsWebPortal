<?php
session_start();
include("../phpscripts/database-connection.php");
include("../phpscripts/check-login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <?php include("../includes/header.php"); ?>
    <style>
        main {
            display: flex;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body class="usr-management">
    <main>
        <section class="container-fluid">
            <div class="row justify-content-center">
                <div class="col">
                    <form id="userLoginForm" class="login-form needs-validation" novalidate>
                        <div class="text-center mb-4 animation-downwards">
                            <img src="../assets/images/logo1.png" width="180" height="180" alt="IMCC Logo" class="mb-3">
                            <h4 class="custom-text-color">IMCC Management</h4>
                        </div>
                        <div class="mb-3 animation-downwards">
                            <select class="form-select" id="userType" name="userType" required>
                                <option selected disabled value="">Select type of user</option>
                                <option value="admin">Administrator</option>
                                <option value="finance">Finance</option>
                                <option value="registrar">Registrar</option>
                            </select>
                            <div class="invalid-feedback">Please select a user type.</div>
                        </div>
                        <div class="mb-3 animation-left">
                            <input id="userEmail" type="text" name="userEmail" class="form-control" placeholder="Email"
                                autocomplete="off" required>
                            <div class="invalid-feedback">Please enter your email.</div>
                        </div>
                        <div class="mb-3 animation-right">
                            <input id="userPassword" type="password" name="userPassword" class="form-control"
                                placeholder="Password" autocomplete="off" required>
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>
                        <div class="form-check mb-3 animation-left">
                            <input type="checkbox" class="form-check-input" id="showPassword">
                            <label class="form-check-label" for="showPassword">Show Password</label>
                        </div>
                        <hr>
                        <div class="text-center animation-right">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include("../includes/scripts.php"); ?>
    <?php include("../includes/components/toast.php"); ?>
    <script src="../assets/js/components/navbar.js"></script>
    <script src="../assets/js/components/tooltip.js"></script>
    <script src="../assets/js/userManagementLogin.js"></script>
</body>

</html>