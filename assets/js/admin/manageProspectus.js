const toastMessage = $("#liveToast .toast-body p");

$(document).ready(function () {
	const urlParams = new URLSearchParams(window.location.search);
	const courseId = urlParams.get("cid");
	const courseName = urlParams.get("cn");
	const courseCode = urlParams.get("cd");

	$(".page-title .fw-bold.custom-text-color").text(
		`${courseName} (${courseCode})`
	);

	displayProspectus(courseId);
	manageSubject();

	$(document).on("click", ".delete", function () {
		var subjectId = $(this).closest("tr").data("subject-id");

		$(".subjectId").val(subjectId);
		$("#deleteConfirmationModal").modal("show");
	});
});

function displayProspectus(courseId) {
	$.ajax({
		url: "../../phpscripts/usr/admin/get-subjects.php",
		type: "GET",
		data: { course_id: courseId },
		dataType: "json",
		success: function (response) {
			if (response.status === "success") {
				let prospectusHtml = "";

				// Group subjects by year level
				let yearLevels = {};
				response.subjects.forEach((subject) => {
					if (!yearLevels[subject.year_level]) {
						yearLevels[subject.year_level] = {
							firstSemester: [],
							secondSemester: [],
						};
					}
					if (subject.semester === "1st") {
						yearLevels[subject.year_level].firstSemester.push(subject);
					} else if (subject.semester === "2nd") {
						yearLevels[subject.year_level].secondSemester.push(subject);
					}
				});

				// Loop through the year levels and display in rows
				for (const yearLevel in yearLevels) {
					const firstSemesterSubjects =
						yearLevels[yearLevel].firstSemester;
					const secondSemesterSubjects =
						yearLevels[yearLevel].secondSemester;

					// Generate HTML for each year level row
					prospectusHtml += `
                        <div class="year-level-row mb-4">
                            <h5 class="p-3 text-center text-light fw-bold main-bg">${yearLevel} Year</h5>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr class="">
                                                <th colspan="6" class="bg-dark-subtle text-center fw-semibold">1st Semester</th>
                                            </tr>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>Subject Code</th>
                                                <th>Lec Units</th>
                                                <th>Lab Units</th>
                                                <th>Total Units</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${generateSubjectRows(
																firstSemesterSubjects
															)}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr class="">
                                                <th colspan="6" class="bg-dark-subtle text-center fw-semibold">2nd Semester</th>
                                            </tr>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>Subject Code</th>
                                                <th>Lec Units</th>
                                                <th>Lab Units</th>
                                                <th>Total Units</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${generateSubjectRows(
																secondSemesterSubjects
															)}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    `;
				}

				// Append the generated HTML to the prospectus section
				$("#prospectusSection").html(prospectusHtml);
			} else {
				console.error(response.message);
			}
		},
		error: function (xhr, status, error) {
			console.error(error);
		},
	});
}

// Function to generate rows for subjects
function generateSubjectRows(subjects) {
	return subjects
		.map((subject) => {
			var totalUnits = subject.lec_units + subject.lab_units;
			return `
            <tr data-subject-id="${subject.subject_id}">
                <td>${subject.subject_name}</td>
                <td>${subject.subject_code}</td>
                <td>${subject.lec_units}</td>
                <td>${subject.lab_units}</td>
                <td>${totalUnits}</td>
                <td class="text-center">
                    <div class="dropdown">
                        <button class="btn-option" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item edit" href="#" data-subject-id="${subject.id}">
                                    <i class="fa-solid fa-pen-to-square me-2"></i> Edit
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item delete" href="#" data-subject-id="${subject.id}">
                                    <i class="fa-solid fa-trash-can me-2"></i> Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        `;
		})
		.join("");
}

function manageSubject() {
	$(document).on("click", ".edit", function () {
		var subjectId = $(this).closest("tr").data("subject-id");
		$.ajax({
			url: "../../phpscripts/usr/admin/get-subject-details.php",
			type: "GET",
			data: { subject_id: subjectId },
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					var subject = response.subject;

					$(".subjectId").val(subject.subject_id);
					$("#subjectName").val(subject.subject_name);
					$("#subjectCode").val(subject.subject_code);
					$("#lecUnits").val(subject.lec_units);
					$("#labUnits").val(subject.lab_units);
					$("#editModal").modal("show");
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

	$(document).on("click", "#saveSubjectBtn", function () {
		var subjectId = $("#subjectId").val();
		var subjectName = $("#subjectName").val();
		var subjectCode = $("#subjectCode").val();
		var lecUnits = $("#lecUnits").val();
		var labUnits = $("#labUnits").val();

		$.ajax({
			url: "../../phpscripts/usr/admin/update-subject.php",
			type: "POST",
			data: {
				subject_id: subjectId,
				subject_name: subjectName,
				subject_code: subjectCode,
				lec_units: lecUnits,
				lab_units: labUnits,
			},
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					toastMessage
						.text(response.message)
						.removeClass("text-danger")
						.addClass("text-success");
					$("#liveToast").toast("show");
					$("#editModal").modal("hide");

					$("button, input, select").prop("disabled", true);
					$("a")
						.addClass("disabled")
						.on("click", function (e) {
							e.preventDefault();
						});

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

	$(document).on("click", "#confirmDelete", function () {
		$.ajax({
			url: "../../phpscripts/usr/admin/delete-subject.php",
			type: "POST",
			data: { subject_id: subjectIdToDelete },
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					toastMessage
						.text(response.message)
						.removeClass("text-danger")
						.addClass("text-success");
					$("#liveToast").toast("show");

					$("button, input, select").prop("disabled", true);
					$("a")
						.addClass("disabled")
						.on("click", function (e) {
							e.preventDefault();
						});

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
