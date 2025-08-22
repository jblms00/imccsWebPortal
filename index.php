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
        <section class="banner animation-fade-in" style="background-image: url(assets/images/background.jpg);">
        </section>
        <section class="login-container-btn secondary-bg">
            <h5 class="mb-0 fw-bold custom-text-color animation-left">View your updated <span
                    class="text-decoration-underline">#myIMCC</span> Student
                Portal Account</h5>
            <a href="#loginForm" class="btn btn-primary btn-md fw-semibold animation-right">Login</a>
        </section>
        <section class="container landing-content">
            <div class="card animation-left">
                <div class="card-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold custom-text-color">Empowering Excellence</h4>
                    <p>IMCC is dedicated to empowering students with skills and knowledge that meet the evolving demands
                        of healthcare and other professional fields, fostering growth and success in every student.</p>
                </div>
            </div>
            <div class="card animation-downwards">
                <div class="card-icon">
                    <i class="fas fa-stethoscope"></i>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold custom-text-color">Leaders in Healthcare and Innovation</h4>
                    <p>With a reputation for excellence, IMCC consistently produces top-tier graduates who excel in
                        their respective fields. Our comprehensive programs prepare students to become innovative
                        leaders, advancing the standards of healthcare and other critical disciplines.</p>
                </div>
            </div>
            <div class="card animation-right">
                <div class="card-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold custom-text-color">A Premier Institution in Mindanao</h4>
                    <p>Recognized as a leading institution in Southern Philippines, IMCC stands as a beacon of quality
                        education,
                        providing a solid foundation for students to excel locally and globally.</p>
                </div>
            </div>
            <div class="card animation-left">
                <div class="card-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold custom-text-color">Advanced Learning for a Modern World</h4>
                    <p>IMCC integrates cutting-edge technology and research-driven education to deliver a learning
                        experience that’s both intensive and impactful. Through our extensive instruction, students are
                        prepared for a world that values innovation and adaptability.</p>
                </div>
            </div>
            <div class="card animation-upwards">
                <div class="card-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold custom-text-color">Learning Beyond the Classroom</h4>
                    <p>Our campus is strategically located in Iligan City, combining accessibility with a peaceful
                        environment that fosters focused learning. Students enjoy a balanced experience, with access to
                        student-friendly amenities and resources.</p>
                </div>
            </div>
            <div class="card animation-right">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold custom-text-color">Community-Focused and Future Ready</h4>
                    <p>IMCC takes pride in its strong community ties and commitment to social responsibility. Through
                        collaborative programs and research, we extend learning beyond the campus, creating real-world
                        impact in the community and contributing to societal advancement.</p>
                </div>
            </div>
        </section>
        <section class="container-fluid journey-section main-bg">
            <div class="row align-items-center">
                <div class="col-md">
                    <h2 class="fw-bold text-light animation-left">Empowering Future Healthcare Leaders</h2>
                    <h5 class="fw-light text-light w-75 animation-left">Iligan Medical Center College is a prestigious
                        institution
                        committed to
                        nurturing skilled
                        professionals in healthcare and allied fields. With a focus on holistic education, IMCC fosters
                        an environment that encourages student growth, resilience, and community engagement. Established
                        in Iligan City, the college has a rich history of academic excellence and community service,
                        aligned with its mission to produce globally competent graduates. Through innovative teaching
                        methods and state-of-the-art facilities, IMCC equips students with the knowledge and skills
                        needed to thrive in an ever-evolving healthcare landscape, all while upholding values of
                        integrity, compassion, and dedication.</h5>
                </div>
                <div class="col-md-4">
                    <form id="loginForm" class="login-form needs-validation" novalidate>
                        <div class="row">
                            <div class="col-sm text-center">
                                <img src="assets/images/logo1.png" width="180" height="180" alt="IMCC Logo"
                                    class="mb-3 animation-fade-in">
                                <h4 class="text-light animation-fade-in" data-aos="fade-down">myIMCC Portal</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 animation-downwards">
                                    <select class="form-select" id="userType" name="userType" required>
                                        <option selected disabled value="">Select type of user</option>
                                        <option value="admin">Administrator</option>
                                        <option value="finance">Finance</option>
                                        <option value="registrar">Registrar</option>
                                        <option value="student">Student</option>
                                    </select>
                                    <div class="invalid-feedback text-light mt-0">Please select a user type.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row animation-right mb-2">
                            <div class="col-sm">
                                <input id="userAccount" type="text" name="user_account" placeholder="Student Number"
                                    data-aos="fade-down" autocomplete="off" required>
                                <div class="invalid-feedback text-light mt-0">
                                    Please enter your email.
                                </div>
                            </div>
                            <div class="col-sm">
                                <input id="userPassword" type="password" name="user_password" placeholder="Password"
                                    autocomplete="off" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="For the student, enter the last 3 letters of your last name followed by the last 5 digits of your student number."
                                    required>
                                <div class="invalid-feedback text-light mt-0">Please enter your password.</div>
                            </div>
                        </div>
                        <div class="row mb-3 animation-upwards">
                            <div class="col">
                                <div class="show-password" data-aos="fade-down">
                                    <input type="checkbox" class="toggle-password" id="showPassword">
                                    <label class="text-light">Show Password</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center animation-right">
                            <button type="submit" class="btn btn-secondary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="container-fluid socmed-container" style="padding: 2rem 4rem;">
            <div class="row mb-3">
                <div class="col">
                    <h2 class="animation-left fw-bold custom-text-color">Facebook</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F%40iliganmedicalcc%2F&tabs=timeline&width=500&height=500&small_header=true&adapt_container_width=false&hide_cover=true&show_facepile=false&appId"
                        width="500" height="500" class="animation-left" style="border:none;overflow:hidden"
                        scrolling="no" frameborder="0" allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="col">
                    <iframe
                        src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Filiganmedicalcc%2Fposts%2Fpfbid0eudYPBgQG7J6se7UnPao28iaSRKSJMCeFZgwX3Qo7yRSPqWiXFbxBgLNXsc6BxHGl&width=500&show_text=false&height=500&appId"
                        width="500" height="500" class="animation-upwards" style="border:none;overflow:hidden"
                        scrolling="no" frameborder="0" allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="col-4">
                    <div class="video-container animation-right">
                        <video src="assets/videos/iligan-medical-center-college-TV-commercial.mp4" autoplay muted loop
                            preload="auto">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include("includes/components/toast.php"); ?>
    <?php include("includes/scripts.php"); ?>
    <script src="assets/js/components/navbar.js"></script>
    <script src="assets/js/components/tooltip.js"></script>
    <script src="assets/js/login.js"></script>

</body>

</html>