const toastMessage = $("#liveToast .toast-body p");
const loggedInUserId = $("body").data("user-id");
const loggedInUserName = $("body").data("user-name");

$(document).ready(function () {
	displaySectionsOnTable();
	handleModal();
	addNewStudent();
	removeStudent();
	uploadSchedule();
	printSchedule();
});

function displaySectionsOnTable() {
	$.ajax({
		url: "../../phpscripts/usr/registrar/get-students-by-sections.php",
		type: "GET",
		dataType: "json",
		success: function (response) {
			if (response.status === "success") {
				$(
					".first-year .card-container, .second-year .card-container, .third-year .card-container, .fourth-year .card-container"
				).empty();

				var hasData = {
					"1st Year": false,
					"2nd Year": false,
					"3rd Year": false,
					"4th Year": false,
				};

				// Group students by section
				var groupedBySection = {};

				response.students_info.forEach(function (student) {
					var sectionYear = `${student.student_section}`;
					var sectionKey = `${student.student_year_level}-${sectionYear}`;

					// If the section is not yet in the object, create an array for it
					if (!groupedBySection[sectionKey]) {
						groupedBySection[sectionKey] = {
							section: sectionYear,
							students: [],
							yearLevel: student.student_year_level,
						};
					}

					// Push the student to the corresponding section
					groupedBySection[sectionKey].students.push(student);
				});

				// Create cards for each section
				Object.values(groupedBySection).forEach(function (sectionGroup) {
					var cardHtml = `
                        <div class="card mb-3" <div class="card mb-3" data-course="${sectionGroup.students[0].student_course}" data-section="${sectionGroup.section}" data-year-level="${sectionGroup.yearLevel}">
							<div class="card-body">
								<h5 class="card-title mb-0">${sectionGroup.section}</h5>
							</div>
						</div>
                    `;

					if (sectionGroup.yearLevel === "1st Year") {
						$(".first-year .card-container").append(cardHtml);
						hasData["1st Year"] = true;
					} else if (sectionGroup.yearLevel === "2nd Year") {
						$(".second-year .card-container").append(cardHtml);
						hasData["2nd Year"] = true;
					} else if (sectionGroup.yearLevel === "3rd Year") {
						$(".third-year .card-container").append(cardHtml);
						hasData["3rd Year"] = true;
					} else if (sectionGroup.yearLevel === "4th Year") {
						$(".fourth-year .card-container").append(cardHtml);
						hasData["4th Year"] = true;
					}
				});

				// Handle empty sections
				Object.keys(hasData).forEach(function (yearLevel) {
					if (!hasData[yearLevel]) {
						var noDataHtml = `
                            <h6 class="text-danger fw-semibold">Currently no section here</h6>
                        `;
						if (yearLevel === "1st Year") {
							$(".first-year .card-container").append(noDataHtml);
						} else if (yearLevel === "2nd Year") {
							$(".second-year .card-container").append(noDataHtml);
						} else if (yearLevel === "3rd Year") {
							$(".third-year .card-container").append(noDataHtml);
						} else if (yearLevel === "4th Year") {
							$(".fourth-year .card-container").append(noDataHtml);
						}
					}
				});

				// Add click event to display students when a section is clicked
				$(".card").on("click", function () {
					var course = $(this).data("course");
					var section = $(this).data("section");
					var yearLevel = $(this).data("year-level");

					displayStudentsInSection(
						section,
						yearLevel,
						course,
						response.students_info
					);
				});
			} else {
				console.error(response.message);
			}
		},
		error: function (xhr, status, error) {
			console.error(error);
		},
	});
}

// Function to display students in the #studentList section
function displayStudentsInSection(section, yearLevel, course, students) {
	// Filter students by section
	var studentsInSection = students.filter(function (student) {
		return student.student_section === section;
	});

	var tableHtml = `
        <div class="mb-3 d-flex align-content-center">
            <h4 class="fw-semibold">Students in ${section}</h4>
			<div class="ms-auto">
				<div class="dropdown">
					<button class="btn-option" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fa-solid fa-ellipsis"></i>
					</button>
					<ul class="dropdown-menu">
						<li>
							<button type="button" class="dropdown-item add-student" data-course="${course}" data-section="${section}" data-year-level="${yearLevel}">Add Student</button>
						</li>
						<li>
							<button type="button" class="dropdown-item upload-schedule" data-course="${course}" data-section="${section}" data-year-level="${yearLevel}">Upload Schedule</button>
						</li>
						<li>
							<button type="button" class="dropdown-item print-schedule" data-course="${course}" data-section="${section}" data-year-level="${yearLevel}">Print Schedule</button>
						</li>
					</ul>
				</div>
			</div>
        </div>
        <table class="table table-bordered table-sm animation-fade-in">
            <thead>
                <tr>
                    <th>Student Number</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
    `;

	// Populate the table with students' data
	studentsInSection.forEach(function (student) {
		tableHtml += `
            <tr data-student-id="${student.student_id}">
                <td>${student.student_id}</td>
                <td>${student.student_name}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-sm btn-primary view-btn">
                            <i class="fa-solid fa-eye me-2"></i>
                            View
                        </button>
                        <button type="button" class="btn btn-sm btn-danger delete-btn">
                            <i class="fa-solid fa-trash-can me-2"></i>
                            Remove
                        </button>
                    </div>
                </td>
            </tr>
        `;
	});

	tableHtml += `
            </tbody>
        </table>
    `;

	$("#studentList").html(tableHtml);

	$(".view-btn").on("click", function () {
		var studentId = $(this).closest("tr").data("student-id");

		viewStudentDetails(studentId);
	});
}

function viewStudentDetails(studentId) {
	$.ajax({
		url: "../../phpscripts/usr/registrar/get-student-details.php",
		type: "GET",
		data: { student_id: studentId },
		dataType: "json",
		success: function (response) {
			if (response.status === "success") {
				var studentData = response.students_info[0];

				var modalHtml = `
                    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Student Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="input-group">
                                                <span class="input-group-text" id="studentNumber">Student Number</span>
                                                <input type="text" class="form-control" value="${studentData.student_id}" placeholder="Student Number" aria-label="Student Number" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group">
                                                <span class="input-group-text" id="studentEmail">Student Email</span>
                                                <input type="text" class="form-control" value="${studentData.student_email}" placeholder="Student Email" aria-label="Student Email" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="input-group">
                                                <span class="input-group-text" id="studentName">Student Name</span>
                                                <input type="text" class="form-control" value="${studentData.student_name}" placeholder="Student Name" aria-label="Student Name" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="input-group">
                                                <span class="input-group-text" id="studentYearLevel">Year Level</span>
                                                <input type="text" class="form-control" value="${studentData.student_year_level}" placeholder="Student Year Level" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group">
                                                <span class="input-group-text" id="studentCourse">Course</span>
                                                <input type="text" class="form-control" value="${studentData.course_name}" placeholder="Student Course" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
				$("body").append(modalHtml);
				var modal = new bootstrap.Modal(
					document.getElementById("studentModal")
				);
				modal.show();

				$("#studentModal").on("hidden.bs.modal", function () {
					$(this).remove();
				});
			} else {
				console.error(response.message);
			}
		},
		error: function (xhr, status, error) {
			console.error(error);
		},
	});
}

function handleModal() {
	function showModal(title, content) {
		var modal = $("#addModal");
		modal.find(".modal-title").text(title);
		modal.find(".modal-body").html(content);
		modal.modal("show");
	}

	$(document).on("click", ".add-section", function () {
		$.ajax({
			url: "../../phpscripts/usr/admin/get-courses.php",
			type: "GET",
			dataType: "json",
			success: function (response) {
				var courseSelectOptions = "";
				if (response.status === "success" && response.courses.length > 0) {
					// Loop through the courses and create options for each
					response.courses.forEach(function (course) {
						courseSelectOptions += `<option value="${course.course_id}">${course.course_name}</option>`;
					});
				} else {
					courseSelectOptions =
						"<option disabled>No courses available</option>";
				}

				var sectionForm = `
					<form id="addSectionForm">
						<div class="input-group mb-3">
							<span class="input-group-text" id="courseName">Course</span>
							<select class="form-select" name="course_id" required>
								<option selected disabled>Select a course...</option>
								${courseSelectOptions}
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text">Year Level</label>
							<select class="form-select" name="student_year_level" required>
								<option selected disabled>Select year level...</option>
								<option value="1st">1st</option>
								<option value="2nd">2nd</option>
								<option value="3rd">3rd</option>
								<option value="4th">4th</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="sectionName">Section Name</span>
							<input type="text" class="form-control" placeholder="Section Name" aria-label="Section Name" aria-describedby="sectionName">
						</div>
						<div class="input-group mb-3">
							<input type="file" class="form-control" id="fileUpload" accept=".xls,.xlsx,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
							<label class="input-group-text" for="fileUpload">Upload Section</label>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-sm btn-primary w-50">Submit</button>
						</div>
					</form>
				`;
				showModal("Add Section", sectionForm);
			},
			error: function (error) {
				console.log(error);
			},
		});
	});

	// Event handler for adding a student
	$(document).on("click", ".add-student", function () {
		var courseId = $(this).data("course");
		var section = $(this).data("section");
		var yearLevel = $(this).data("year-level");

		var studentForm = `
			<form id="addStudentForm">
				<input type="hidden" class="form-control" name="course_id" value="${courseId}" placeholder="Course ID" required>
				<input type="hidden" class="form-control" name="section" value="${section}" placeholder="Section" required>
				<input type="hidden" class="form-control" name="year_level" value="${yearLevel}" placeholder="Year Level" required>
				<div class="input-group mb-3">
					<span class="input-group-text">Student ID</span>
					<input type="number" class="form-control" name="student_id" placeholder="Student ID" required>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text">Student Email</span>
					<input type="email" class="form-control" name="student_email" placeholder="Student Email" required>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text">Student Name</span>
					<input type="text" class="form-control" name="student_name" placeholder="Student Name" required>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text">Enrollment Date</span>
					<input type="date" class="form-control" name="student_enrollment_date" required>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-sm btn-primary w-50">Submit</button>
				</div>
			</form>
		`;
		showModal("Add Student", studentForm);
	});

	$(document).on("click", ".upload-schedule", function () {
		var courseId = $(this).data("course");
		var section = $(this).data("section");
		var yearLevel = $(this).data("year-level");

		var sectionForm = `
			<form id="uploadScheduleForm">
				<input type="hidden" class="form-control" name="course_id" value="${courseId}" placeholder="Course ID" required>
				<input type="hidden" class="form-control" name="section" value="${section}" placeholder="Section" required>
				<input type="hidden" class="form-control" name="year_level" value="${yearLevel}" placeholder="Year Level" required>
				<div class="input-group mb-3">
					<label class="input-group-text">Semester</label>
					<select class="form-select" name="semester" required>
						<option selected disabled>Select semester...</option>
						<option value="1st">1st</option>
						<option value="2nd">2nd</option>
						<option value="3rd">3rd</option>
					</select>
				</div>
				<div class="input-group mb-3">
					<input type="file" class="form-control" name="schedule_file" id="scheduleFile" accept=".xls,.xlsx,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
					<label class="input-group-text" for="scheduleFile">Upload Schedule</label>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-sm btn-primary w-50">Submit</button>
				</div>
			</form>
		`;
		showModal("Upload Schedule", sectionForm);
	});
}

function addNewStudent() {
	$(document).on("submit", "#addStudentForm", function (event) {
		event.preventDefault();

		$.ajax({
			url: "../../phpscripts/usr/admin/add-student.php",
			type: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					toastMessage
						.text(response.message)
						.removeClass("text-danger")
						.addClass("text-success");
					$("#liveToast").toast("show");

					$("#addModal").modal("hide");
					displaySectionsOnTable();
				} else {
					toastMessage
						.text(response.message)
						.removeClass("text-success")
						.addClass("text-danger");
					$("#liveToast").toast("show");
				}
			},
			error: function (xhr, status, error) {
				console.error(error);
			},
		});
	});

	$(document).on("submit", "#addSectionForm", function (event) {
		event.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			url: "../../phpscripts/usr/admin/upload-students.php",
			type: "POST",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					toastMessage
						.text(response.message)
						.removeClass("text-danger")
						.addClass("text-success");
					$("#liveToast").toast("show");

					$("#addModal").modal("hide");
					setTimeout(function () {
						location.reload();
					}, 2000);
				} else {
					toastMessage
						.text(response.message)
						.removeClass("text-success")
						.addClass("text-danger");
					$("#liveToast").toast("show");
				}
			},
			error: function (xhr, status, error) {
				console.error(error);
			},
		});
	});
}

function removeStudent() {
	$(document).on("click", ".delete-btn", function () {
		var studentId = $(this).closest("tr").data("student-id");

		var modalHtml = `
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this student? This action cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-sm btn-primary" id="confirmDeleteBtn">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

		$("body").append(modalHtml);

		var modal = new bootstrap.Modal(document.getElementById("deleteModal"));
		modal.show();

		$(document).on("click", "#confirmDeleteBtn", function () {
			$.ajax({
				url: "../../phpscripts/usr/admin/delete-student.php",
				type: "POST",
				data: { student_id: studentId },
				dataType: "json",
				success: function (response) {
					if (response.status === "success") {
						toastMessage
							.text(response.message)
							.removeClass("text-danger")
							.addClass("text-success");
						$("#liveToast").toast("show");

						setTimeout(function () {
							location.reload();
						}, 2000);
					} else {
						toastMessage
							.text(response.message)
							.removeClass("text-success")
							.addClass("text-danger");
						$("#liveToast").toast("show");
					}

					modal.hide();
					$("#deleteModal").remove();
				},
				error: function (xhr, status, error) {
					console.error(error);
				},
			});
		});

		$(document).on("hidden.bs.modal", "#deleteModal", function () {
			$(this).remove();
		});
	});
}

function uploadSchedule() {
	$(document).on("submit", "#uploadScheduleForm", function (event) {
		event.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			url: "../../phpscripts/usr/admin/upload-schedule.php",
			type: "POST",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					toastMessage
						.text(response.message)
						.removeClass("text-danger")
						.addClass("text-success");
					$("#liveToast").toast("show");

					$("#addModal").modal("hide");
					setTimeout(function () {
						location.reload();
					}, 2000);
				} else {
					toastMessage
						.text(response.message)
						.removeClass("text-success")
						.addClass("text-danger");
					$("#liveToast").toast("show");
				}
			},
			error: function (xhr, status, error) {
				console.error(error);
			},
		});
	});
}

function printSchedule() {
	$(document).on("click", ".print-schedule", function () {
		var course = $(this).data("course");
		var section = $(this).data("section");
		var yearLevel = $(this).data("year-level");

		// Fetch the schedule for the selected section
		$.ajax({
			url: "../../phpscripts/usr/admin/get-section-schedule.php",
			type: "GET",
			data: {
				course: course,
				section: section,
				year_level: yearLevel,
			},
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					var printWindow = window.open("", "", "height=600,width=800");

					var printContent = `
					        <html>
							<head>
								<style>
									@media print {
										@page {
											margin: 20px;
										}
										body {
											margin: 0;
										}
										.no-print {
											display: none;
										}
									}
									body {
										font-family: 'Times New Roman', serif;
										font-size: 14px;
										margin: 20px;
									}
									table {
										width: 100%;
										border-collapse: collapse;
										margin-top: 20px;
									}
									th, td {
										border: 1px solid #000;
										padding: 10px;
										text-align: center;
									}
									th {
										background-color: #f2f2f2;
									}
									h2 {
										text-align: center;
									}
									h3 {
										text-align: center;
										margin-top: 40px;
									}
									.logo {
										text-align: center;
									}
									.user-details {
										margin: 20px 0;
									}
									.row {
										display: flex;
										align-items: center;
										justify-content: space-between;
									}
								</style>
							</head>
							<body>
								<div class="logo">
									<img src="../../assets/images/logo1.png" height="120" width="120">
								</div>
								<div class="user-details">
									<div class="row">
										<div class="col">
											<p>Generated by: ${loggedInUserName}</p>
											<p>Year Level: ${yearLevel}</p>
										</div>
										<div class="col">
											<p>Date Printed: ${new Date().toLocaleString()}</p>
										</div>
									</div>
								</div>
								<div style="font-family: Arial, sans-serif; text-align: center;">
									<h3>Schedule for ${section}</h3>
									<table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
										<thead>
											<tr>
												<th>Subject Code</th>
												<th>Subject Name</th>
												<th>Days of Week</th>
												<th>Time</th>
												<th>Instructor</th>
											</tr>
										</thead>
										<tbody>
                    `;

					response.schedule.forEach(function (entry) {
						var subject = entry.subject || {};
						var startTime = formatTime(entry.start_time);
						var endTime = formatTime(entry.end_time);
						var timeRange = `${startTime} - ${endTime}`;

						printContent += `
											<tr>
												<td>${subject.subject_code || "N/A"}</td>
												<td>${subject.subject_name || "N/A"}</td>
												<td>${entry.day_of_week || "N/A"}</td>
												<td>${timeRange}</td>
												<td>${entry.instructor_name || "N/A"}</td>
											</tr>
                        `;
					});

					printContent += `
										</tbody>
									</table>
									<button class="no-print" onclick="window.print()">Print this page</button>
								</div>
							</body>
       					</html>
                    `;

					printWindow.document.write(printContent);
					printWindow.document.close();
					printWindow.print();
				} else {
					console.error(response.message);
					toastMessage.text("Failed to fetch schedule. Please try again.");
					$("#liveToast").toast("show");
				}
			},
			error: function (xhr, status, error) {
				console.error(error);
			},
		});
	});
}

function formatTime(timeString) {
	// Ensure the time string is valid and in the correct format
	if (!timeString || !timeString.includes(":")) {
		console.error("Invalid time format:", timeString);
		return "Invalid Time"; // Return a placeholder in case of invalid input
	}

	var [hours, minutes] = timeString.split(":").map(Number); // Split and convert to numbers
	if (isNaN(hours) || isNaN(minutes)) {
		console.error("Invalid time components:", hours, minutes);
		return "Invalid Time"; // Handle invalid numeric conversions
	}

	var period = hours >= 12 ? "PM" : "AM";
	var formattedHours = hours % 12 || 12; // Convert 24-hour time to 12-hour time
	var formattedMinutes = minutes.toString().padStart(2, "0");

	return `${formattedHours}:${formattedMinutes} ${period}`;
}
