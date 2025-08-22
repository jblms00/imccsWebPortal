<?php session_start();
include("phpscripts/database-connection.php");
include("phpscripts/check-login.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <?php include("includes/header.php"); ?>
    <!-- Flipbook StyleSheets -->
    <link href="assets/dflip/css/dflip.min.css" rel="stylesheet" type="text/css">
    <link href="assets/dflip/css/themify-icons.min.css" rel="stylesheet" type="text/css">
</head>

<body class="homepage">
    <?php include("includes/components/navbar.php"); ?>
    <main>
        <section>
            <div class="_df_book" height="800" source="assets/uploads/fileUploads/STUDENT-HANDBOOK-2016.pdf"></div>
        </section>
    </main>
    <!-- <?php include("includes/components/footer.php"); ?> -->
    <?php include("includes/scripts.php"); ?>
    <!-- Scripts -->
    <script src="assets/dflip/js/libs/jquery.min.js" type="text/javascript"></script>
    <script src="assets/dflip/js/dflip.min.js" type="text/javascript"></script>
    <script src="assets/js/components/navbar.js"></script>
    <script src="assets/js/components/tooltip.js"></script>


</body>

</html>