<?php
session_start();
include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");
$user_data = check_login($con);
$user_type = ucfirst($user_data['user_type']);
?>
<!doctype html>
<html lang="en">

<head>
    <?php include("../../includes/header.php"); ?>
</head>

<body class="usr-management" data-user-email="<?php echo $user_data['user_email'] ?>"
    data-user-id="<?php echo $user_data['user_id'] ?>">
    <?php include("../../includes/components/sidebar.php"); ?>
    <main class="home-section">
        <div class="page-title">
            <h3 class="fw-bold custom-text-color">Manage Events</h3>
        </div>
        <div class="container calendar-container" style="padding: 4rem 0;">
            <div id="calendar" class="bg-light p-4 rounded"></div>
        </div>
    </main>
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editEventForm">
                        <input type="hidden" id="eventId" />
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-semibold">Title</span>
                            <input type="text" class="form-control" id="eventTitle" placeholder="Title" />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-semibold">Date</span>
                            <input type="date" class="form-control" id="eventDate" />
                        </div>
                        <select class="form-select" id="eventIsHoliday" aria-label="Is this holiday?">
                            <option selected disabled>Is this holiday?</option>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" id="saveEventChanges">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-semibold">Title</span>
                        <input type="text" class="form-control" id="newEventTitle" placeholder="Title" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-semibold">Date</span>
                        <input type="date" class="form-control" id="newEventDate" />
                    </div>
                    <select class="form-select" id="newEventIsHoliday" aria-label="Is this holiday?">
                        <option selected disabled>Is this holiday?</option>
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveNewEvent" class="btn btn-sm btn-primary">Save Event</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../../includes/components/toast.php"); ?>
    <?php include("../../includes/scripts.php"); ?>
    <script src="../../assets/js/components/sidebar.js"></script>
    <script src="../../assets/js/admin/manageEvents.js"></script>
</body>

</html>