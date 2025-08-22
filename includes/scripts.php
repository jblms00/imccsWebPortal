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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<?php if (
    strpos($_SERVER['REQUEST_URI'], '/userManagement/admin') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/userManagement/finance') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/userManagement/registrar') !== false
) { ?>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- FullCalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<?php } ?>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/26afe9fd6c.js" crossorigin="anonymous"></script>