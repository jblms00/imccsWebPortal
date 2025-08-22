<?php
session_start();
include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");
$user_data = check_login($con);
$user_type = ucfirst($user_data['user_type']);

$queryString = $_SERVER['QUERY_STRING'];

if ($queryString === 'pending') {
    $status = ucfirst('pending');
} elseif ($queryString === 'completed') {
    $status = ucfirst('completed');
} else {
    $status = ucfirst('unknown');
}

?>
<!doctype html>
<html lang="en">

<head>
    <?php include("../../includes/header.php"); ?>
</head>

<body class="usr-management">
    <?php include("../../includes/components/sidebar.php"); ?>
    <main class="home-section">
        <div class="page-title animation-downwards">
            <h3 class="fw-bold custom-text-color">Manage <?php echo $status; ?> Credential Requests</h3>
        </div>
        <section>
            <div class="table-container animation-left">
                <table class="display table-bordered table-striped table-light border border-opacity-50"
                    id="requestsTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Request ID</th>
                            <th>Requested by</th>
                            <th>Requested Document</th>
                            <th>Requested At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </section>
    </main>
    <?php include("../../includes/scripts.php"); ?>
    <?php include("../../includes/components/toast.php"); ?>
    <script src="../../assets/js/components/sidebar.js"></script>
    <script src="../../assets/js/rgstrar/manageCredentialRequests.js"></script>
</body>

</html>