<?php session_start();
include("phpscripts/database-connection.php");
include("phpscripts/check-login.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <?php include("includes/header.php"); ?>
</head>

<body class="homepage">
    <?php include("includes/components/navbar.php"); ?>
    <main>
        <section class="container-fluid py-5 bg-light">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-center mb-4 fw-bold custom-text-color animation-downwards">About Portal</h1>
                    <p class="lead text-center mb-4 text-dark animation-downwards">Welcome to the Iligan Medical Center
                        College (IMCC)
                        Student Portal
                        – your digital gateway to a streamlined and connected student experience! This portal is
                        designed to empower you, our students, by giving you quick and easy access to essential academic
                        resources and tools, helping you stay focused on your educational journey at IMCC.</p>

                    <h2 class="h4 mt-5 fw-semibold custom-text-color animation-downwards">Portal Features</h2>
                    <ul class="list-unstyled ps-3">
                        <li class="fs-5 mb-3 animation-downwards">
                            <strong class="custom-text-color fw-semibold">View Grades:</strong> Stay up-to-date with
                            your academic progress and performance by accessing your grades securely from any device.
                        </li>
                        <li class="fs-5 mb-3 animation-downwards">
                            <strong class="custom-text-color fw-semibold">Check Class Schedules:</strong> Find your
                            daily
                            schedule
                            with ease and ensure you
                            never miss a class or important update.
                        </li>
                        <li class="fs-5 mb-3 animation-downwards">
                            <strong class="custom-text-color fw-semibold">Access Your Prospectus:</strong> Track your
                            course
                            requirements, subjects, and
                            prerequisites for each program.
                        </li>
                        <li class="fs-5 mb-3 animation-downwards">
                            <strong class="custom-text-color fw-semibold">Request Credentials:</strong> Request
                            transcripts,
                            certifications, and other
                            academic documents in just a few clicks.
                        </li>
                        <li class="fs-5 mb-5 animation-downwards">
                            <strong class="custom-text-color fw-semibold">Stay Informed with the Academic
                                Calendar:</strong> Keep
                            track of important dates,
                            from enrollment and examination periods to holidays and special events.
                        </li>
                    </ul>
                    <p class="lead mt-5 text-dark animation-downwards">At Iligan Medical Center College, we are
                        committed to
                        enhancing the
                        academic journey
                        by providing tools and resources that support your success. The IMCC Student Portal is an
                        essential part of that commitment, giving you the freedom to manage and organize your academic
                        life with greater ease and efficiency.</p>
                </div>
            </div>
        </section>
    </main>
    <?php include("includes/scripts.php"); ?>
    <script src="assets/js/components/navbar.js"></script>
</body>

</html>