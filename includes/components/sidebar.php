<div class="sidebar">
    <div class="logo-details">
        <div class="logo-name ms-4">IMCC - Web Portal</div>
        <i class="fa-solid fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
        <?php if (strpos($_SERVER['REQUEST_URI'], '/userManagement/registrar/') !== false) { ?>
            <li>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span class="links-name">Manage Credential Requests</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item bg-transparent" href="manageRequests?pending">Pending</a>
                        </li>
                        <li>
                            <a class="dropdown-item bg-transparent" href="manageRequests?completed">Completed</a>
                        </li>
                    </ul>
                </div>
                <span class="tooltip">Manage Credential Requests</span>
            </li>
            <li>
                <a href="manageStudentGrades">
                    <i class="fa-solid fa-users"></i>
                    <span class="links-name">Manage Student Grades</span>
                </a>
                <span class="tooltip">Manage Student Grades</span>
            </li>
        <?php } else if (strpos($_SERVER['REQUEST_URI'], '/userManagement/finance/') !== false) { ?>
                <li>
                    <a href="homepage">
                        <i class="fa-solid fa-grip"></i>
                        <span class="links-name">Homepage</span>
                    </a>
                    <span class="tooltip">Homepage</span>
                </li>
        <?php } else if (strpos($_SERVER['REQUEST_URI'], '/userManagement/admin/') !== false) { ?>
                    <!-- <li>
                        <a href="dashboard">
                            <i class="fa-solid fa-grip"></i>
                            <span class="links-name">Dashboard</span>
                        </a>
                        <span class="tooltip">Dashboard</span>
                    </li> -->
                    <li>
                        <a href="manageStudents">
                            <i class="fa-solid fa-users"></i>
                            <span class="links-name">Manage Students</span>
                        </a>
                        <span class="tooltip">Manage Students</span>
                    </li>
                    <li>
                        <a href="manageCourses">
                            <i class="fa-solid fa-clipboard-list"></i>
                            <span class="links-name">Manage Courses</span>
                        </a>
                        <span class="tooltip">Manage Courses</span>
                    </li>
                    <li>
                        <a href="manageEvents">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="links-name">Manage Events</span>
                        </a>
                        <span class="tooltip">Manage Events</span>
                    </li>
        <?php } ?>
        <li>
            <a href="../../phpscripts/user-logout.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="links-name">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>