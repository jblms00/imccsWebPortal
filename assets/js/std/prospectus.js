const toastMessage = $("#liveToast .toast-body p");

$(document).ready(function () {
	displayProspectus();
});

function displayProspectus() {
	var courseId = $("body").data("student-course");

	$.ajax({
		url: "../phpscripts/usr/admin/get-subjects.php",
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
                            <h5 class="p-3 text-center text-light fw-bold main-bg animation-downwards">${yearLevel} Year</h5>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <table class="table table-bordered border-success table-sm animation-left">
                                        <thead>
                                            <tr>
                                                <th colspan="6" class="text-center fw-semibold" style="background-color: var(--mainbg3) !important;">1st Semester</th>
                                            </tr>
                                            <tr>
												<th style="background-color: var(--mainbg3) !important;">Subject Code</th>
												<th style="background-color: var(--mainbg3) !important;">Subject Name</th>
                                                <th style="background-color: var(--mainbg3) !important;">Lec Units</th>
                                                <th style="background-color: var(--mainbg3) !important;">Lab Units</th>
                                                <th style="background-color: var(--mainbg3) !important;">Total Units</th>
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
                                    <table class="table table-bordered border-success table-sm animation-right">
                                        <thead>
                                            <tr>
                                                <th colspan="6" class="text-center fw-semibold" style="background-color: var(--mainbg3) !important;">2nd Semester</th>
                                            </tr>
                                            <tr>
												<th style="background-color: var(--mainbg3) !important;">Subject Code</th>
												<th style="background-color: var(--mainbg3) !important;">Subject Name</th>
                                                <th style="background-color: var(--mainbg3) !important;">Lec Units</th>
                                                <th style="background-color: var(--mainbg3) !important;">Lab Units</th>
                                                <th style="background-color: var(--mainbg3) !important;">Total Units</th>
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
				<td>${subject.subject_code}</td>
                <td>${subject.subject_name}</td>
                <td>${subject.lec_units}</td>
                <td>${subject.lab_units}</td>
                <td>${totalUnits}</td>
            </tr>
        `;
		})
		.join("");
}
