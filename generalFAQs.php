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
        <section class="container animation-fade-in faq-container">
            <div class="row">
                <div class="col">
                    <h1 class="fw-bold text-uppercase text-center custom-text-color">General FAQs</h1>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="btn-container general-faq container mt-5"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="collapse-container container">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- <?php include("includes/components/footer.php"); ?> -->
    <?php include("includes/scripts.php"); ?>
    <script src="assets/js/components/navbar.js"></script>
    <script src="assets/js/components/accordion.js"></script>
</body>

</html>