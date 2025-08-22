const toastMessage = $("#liveToast .toast-body p");
const dataTable = $("#coursesTable").DataTable({
	autoWidth: true,
	scrollX: true,
	paging: true,
	responsive: true,
	columns: [
		{ width: "1%" },
		{ width: "5%" },
		{ width: "40%" },
		{ width: "1%" },
	],
	columnDefs: [
		{
			targets: "_all",
			className: "text-start",
		},
		{
			targets: 3,
			className: "text-center",
		},
	],
	createdRow: function (row, data, dataIndex) {
		$(row).attr("data-course-id", data[4]);
	},
	data: [],
	language: {
		emptyTable: "No matching records found",
	},
});

$(document).ready(function () {
	displayCoursesOnTable();
	manageCourse();

	$(document).on("click", ".edit", function () {
		var courseId = $(this).closest("tr").data("course-id");
		var courseCode = $(this).closest("tr").find("td").eq(1).text();
		var courseName = $(this).closest("tr").find("td").eq(2).text();

		$(".courseId").val(courseId);
		$("#courseCode").val(courseCode);
		$("#courseName").val(courseName);
		$("#editModal").modal("show");
	});

	$(document).on("click", ".delete", function () {
		var courseId = $(this).closest("tr").data("course-id");

		$(".courseId").val(courseId);
		$("#deleteConfirmationModal").modal("show");
	});
});

function displayCoursesOnTable() {
	$.ajax({
		url: "../../phpscripts/usr/admin/get-courses.php",
		type: "GET",
		dataType: "json",
		success: function (response) {
			if (response.status === "success") {
				var tableBody = $("#coursesTable tbody");
				tableBody.empty();

				var counter = 1;
				var coursesResult = response.courses.map((course) => {
					return [
						counter++,
						course.course_code,
						course.course_name,
						`
                            <div class="dropdown">
                                <button class="btn-option" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="course?cid=${course.course_id}&cn=${course.course_name}&cd=${course.course_code}" target="_blank">
                                            <i class="fa-solid fa-eye me-2"></i>
                                            View Course Subjects
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item edit" href="#">
                                            <i class="fa-solid fa-pen-to-square me-2"></i>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item delete" href="#">
                                            <i class="fa-solid fa-trash-can me-2"></i>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        `,
						course.course_id,
					];
				});
				dataTable.clear().rows.add(coursesResult).draw();
			} else {
				console.error(response.message);
			}
		},
		error: function (xhr, status, error) {
			console.error(error);
		},
	});
}

function manageCourse() {
	$(document).on("click", "#saveCourseBtn", function () {
		var courseId = $(".courseId").val();
		var courseCode = $("#courseCode").val();
		var courseName = $("#courseName").val();

		$.ajax({
			url: "../../phpscripts/usr/admin/update-course.php",
			type: "POST",
			data: {
				course_id: courseId,
				course_name: courseName,
				course_code: courseCode,
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

					displayCoursesOnTable();
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
			url: "../../phpscripts/usr/admin/delete-course.php",
			type: "POST",
			data: { course_id: courseIdToDelete },
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
