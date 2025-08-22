<?php
if (strpos($_SERVER['REQUEST_URI'], '/std/') !== false) { ?>
    <div class="logo text-center p-2">
        <img src="../assets/images/logo1.png" width="150" height="150" alt="IMCC Logo" class="animation-downwards mb-3">
        <div class="school-name animation-downwards">
            <h3 class="custom-text-color fw-bold logoTag">Iligan Medical Center College</h3>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item animation-left">
                    <a class="nav-link" href="homepage">Home</a>
                </li>
                <li class="nav-item animation-left">
                    <a class="nav-link" href="requestCredentials">Request Credentials</a>
                </li>
                <li class="nav-item animation-left">
                    <a class="nav-link" href="myProspectus">Prospectus</a>
                </li>
                <li class="nav-item animation-right">
                    <a class="nav-link" href="myGrades">My Grades</a>
                </li>
                <li class="nav-item animation-right">
                    <a class="nav-link" href="myProfile">My Profile</a>
                </li>
                <li class="nav-item animation-right">
                    <a class="nav-link" href="../phpscripts/user-logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
<?php } else { ?>
    <div class="logo">
        <img src="assets/images/logo1.png" class="animation-downwards logoTag" width="100" height="100%" alt="IMCCS Logo">
        <div class="school-name animation-upwards">
            <h3 class="custom-text-color logoTag">Iligan Medical Center College</h3>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid px-5">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item animation-right">
                    <a class="nav-link" href="./">Home</a>
                </li>
                <li class="nav-item animation-right">
                    <a class="nav-link" href="aboutPortal">About Portal</a>
                </li>
                <li class="nav-item dropdown animation-right">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        FAQs
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-dark" href="faqForStudents">FAQs for Students</a></li>
                        <li><a class="dropdown-item text-dark" href="generalFAQs">General FAQs</a></li>
                    </ul>
                </li>
                <li class="nav-item animation-right">
                    <a class="nav-link" href="contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
<?php } ?>