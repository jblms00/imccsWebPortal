const toastMessage = $("#liveToast .toast-body p");

$(document).ready(function () {
	displaySectionsOnTable();
	uploadGrades();
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

				response.students_info.forEach(function (student) {
					var sectionYear = `${student.student_section}`;
					var cardHtml = `
                        <div class="card mb-3" data-course-id="${student.student_course}" data-section="${student.student_section}" data-year-level="${student.student_year_level}">
                            <div class="card-body">
                                <h5 class="card-title mb-0">${sectionYear}</h5>
                            </div>
                        </div>
                    `;

					if (student.student_year_level === "1st Year") {
						$(".first-year .card-container").append(cardHtml);
						hasData["1st Year"] = true;
					} else if (student.student_year_level === "2nd Year") {
						$(".second-year .card-container").append(cardHtml);
						hasData["2nd Year"] = true;
					} else if (student.student_year_level === "3rd Year") {
						$(".third-year .card-container").append(cardHtml);
						hasData["3rd Year"] = true;
					} else if (student.student_year_level === "4th Year") {
						$(".fourth-year .card-container").append(cardHtml);
						hasData["4th Year"] = true;
					}
				});

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
					var section = $(this).data("section");
					var yearLevel = $(this).data("year-level");
					var courseId = $(this).data("course-id");
					displayStudentsInSection(
						section,
						yearLevel,
						courseId,
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
function displayStudentsInSection(section, yearLevel, courseId, students) {
	// Filter students by section
	var studentsInSection = students.filter(function (student) {
		return student.student_section === section;
	});

	var tableHtml = `
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-semibold">Students in ${section}</h4>
            <button type="button" class="btn btn-primary py-1" data-course-id="${courseId}" data-section="${section}" data-year-level="${yearLevel}" id="uploadGradesBtn">Upload Grades</button>
        </div>
        <table class="table table-bordered animation-fade-in">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
    `;

	// Populate the table with students' data
	studentsInSection.forEach(function (student) {
		tableHtml += `
            <tr>
                <td>${student.student_name}</td>
                <td>${student.student_email}</td>
            </tr>
        `;
	});

	tableHtml += `
            </tbody>
        </table>
    `;

	$("#studentList").html(tableHtml);

	// Open the modal when "Upload Grades" button is clicked
	$("#uploadGradesBtn").on("click", function () {
		var section = $(this).data("section");
		var yearLevel = $(this).data("year-level");
		var courseId = $(this).data("course-id");

		// Populate modal fields
		$("#section").val(section);
		$("#yearLevel").val(yearLevel);

		fetchSubjects(courseId, yearLevel);

		// Show the modal
		$("#uploadGrades").modal("show");
	});
}

function fetchSubjects(courseId, yearLevel) {
	$.ajax({
		url: "../../phpscripts/usr/registrar/get-subjects.php",
		type: "POST",
		data: {
			course_id: courseId,
			year_level: yearLevel,
		},
		dataType: "json",
		success: function (response) {
			if (response.status === "success") {
				var subjectDropdown = $("#subject");
				subjectDropdown.empty();
				subjectDropdown.append(
					'<option value="" disabled selected>Select a subject</option>'
				);

				response.subjects.forEach(function (subject) {
					subjectDropdown.append(
						`<option value="${subject.subject_id}">
                            ${subject.subject_name}
                        </option>`
					);
				});
			} else {
				console.error(response.message);
			}
		},
		error: function (xhr, status, error) {
			console.error("Error fetching subjects:", error);
		},
	});
}

function uploadGrades() {
	$(document).on("submit", "#uploadGradesForm", function (event) {
		event.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			url: "../../phpscripts/usr/registrar/upload-grades.php",
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
