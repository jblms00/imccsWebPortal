$(document).ready(function () {
	loadYearLevels();
	displayGrades();
});

function loadYearLevels() {
	var studentId = $("body").data("student-id");

	$.ajax({
		url: "../phpscripts/std/get-year-levels.php",
		type: "GET",
		data: { student_id: studentId },
		dataType: "json",
		success: function (response) {
			if (response.status === "success") {
				let yearLevelsHtml = "";
				response.year_levels.forEach((year, index) => {
					yearLevelsHtml += `
                        <tr data-year-level="${
									year.year_level
								}" data-semester="${year.semester}">
                            <th>${index + 1}</th>
                            <td>${year.school_year}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary view-grades">View</button>
                            </td>
                        </tr>
                    `;
				});
				$("#recordsTbl tbody").html(yearLevelsHtml);
			} else {
				alert(response.message);
			}
		},
		error: function (xhr, status, error) {
			console.error(error);
		},
	});
}

function displayGrades() {
	$(document).on("click", ".view-grades", function () {
		var studentId = $("body").data("student-id");
		var yearLevel = $(this).closest("tr").data("year-level");
		var semester = $(this).closest("tr").data("semester");
		var schoolYear = $(this).closest("tr").find("td").eq(0).text();

		console.log(schoolYear);

		$.ajax({
			url: "../phpscripts/std/get-student-grades.php",
			type: "GET",
			data: {
				student_id: studentId,
				year_level: yearLevel,
				semester: semester,
			},
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					let gradesHtml = `
                        <h3 class="text-center fw-bold custom-text-color animation-downwards">Showing Academic Grade Report for School Year ${schoolYear}</h3>
                        <table class="table table-bordered border-success animation-fade-in">
                            <thead>
                                <tr>
                                    <th style="background-color: var(--mainbg3) !important;">Subject Code</th>
                                    <th style="background-color: var(--mainbg3) !important;">Subject Name</th>
                                    <th style="background-color: var(--mainbg3) !important;">Final Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;
					response.grades.forEach((grade) => {
						gradesHtml += `
                            <tr>
                                <td>${grade.subject_code}</td>
                                <td>${grade.subject_name}</td>
                                <td>${grade.grade_value}</td>
                            </tr>
                        `;
					});
					gradesHtml += `
                            </tbody>
                        </table>
                    `;
					$(".grades-table-container").html(gradesHtml);
				} else {
					alert(response.message);
				}
			},
			error: function (xhr, status, error) {
				console.error(error);
			},
		});
	});
}
