<?php
if (
    strpos($_SERVER['REQUEST_URI'], '/userManagement/admin') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/userManagement/finance') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/userManagement/registrar') !== false
) {
    $linkTg = "../../";
} else if (
    strpos($_SERVER['REQUEST_URI'], '/std/') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/userManagement/login') !== false
) {
    $linkTg = "../";
} else {
    $linkTg = "";
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $linkTg; ?>assets/images/logo1.png">
<title>Iligan Medical Center College | Student Portal</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php if (
    strpos($_SERVER['REQUEST_URI'], '/userManagement/admin') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/userManagement/finance') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/userManagement/registrar') !== false
) { ?>
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
<?php } ?>
<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo $linkTg; ?>assets/css/styles.css">