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
                    <h1 class="text-center mb-4 fw-bold custom-text-color animation-downwards">Contact Information</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>IMCC MAIN CAMPUS</strong></td>
                                <td>
                                    <strong>Address:</strong> San Miguel Village, Pala-o, Iligan City<br><br>
                                    <strong>Phone Numbers:</strong><br>
                                    (063)221-4661 local 1102<br>
                                    (063)221-4649 local 1102<br>
                                    (063)221-2586 local 1102<br>
                                    <br>
                                    <strong>Email Address:</strong><br>
                                    registrar@imcc.edu.ph<br>
                                    imcc_registrar@yahoo.com<br>
                                    imcc.registrar2016@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td><strong>BASIC EDUCATION ANNEX</strong></td>
                                <td>
                                    <strong>Address:</strong> Laya Ext., Pala-o, Iligan City<br><br>
                                    <strong>Phone Numbers:</strong><br>
                                    (063) 222-0676<br>
                                    (063) 222-0677<br>
                                    <br>
                                    <strong>Facebook:</strong> IMCC – Basic Education Department
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <?php include("includes/scripts.php"); ?>
    <script src="assets/js/components/navbar.js"></script>
</body>

</html>