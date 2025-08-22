const toastMessage = $("#liveToast .toast-body p");

$(document).ready(function () {
	studentInformation();
	changePassword();

	$(".toggle-new-password").click(function () {
		var passwordInput = $("#newPassword");
		if (passwordInput.attr("type") === "password") {
			passwordInput.attr("type", "text");
		} else {
			passwordInput.attr("type", "password");
		}
	});

	$(".toggle-confirm-password").click(function () {
		var passwordInput = $("#confirmPassword");
		if (passwordInput.attr("type") === "password") {
			passwordInput.attr("type", "text");
		} else {
			passwordInput.attr("type", "password");
		}
	});

	$("#userImage").click(function () {
		$("#fileInput").click();
	});

	$("#fileInput").change(function (event) {
		var file = event.target.files[0];
		if (file) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$("#userImage").attr("src", e.target.result);
				uploadProfileImage(file);
			};
			reader.readAsDataURL(file);
		}
	});
});

function studentInformation() {
	var student_number = $(".student-pg").data("student-id");
	var year_level = $(".student-pg").data("year-level");
	var section = $(".student-pg").data("section");

	$.ajax({
		method: "POST",
		url: "../phpscripts/std/get-student-information.php",
		data: { student_number, year_level, section },
		dataType: "json",
		success: function (response) {
			if (response.status === "success") {
				var student_data = response.student_info[0];
				$("#studentNumber").text(student_data.student_id);
				$("#studentName").text(student_data.student_name);
				$("#studentCourse").text(student_data.course_name);
				$("#studentSection").text(student_data.student_section);
				$("#studentYearLevel").text(student_data.student_year_level);

				var decodedPassword = atob(student_data.student_password);
				$("#defaultPassword").text(decodedPassword);

				var imageColumn = $("#imageColumn");
				var studentImage =
					student_data.student_photo !== ""
						? "../assets/images/studentImages/" +
						  student_data.student_photo
						: "../assets/images/studentImages/default-profile.png";

				imageColumn.find("img#userImage").attr("src", studentImage);
			} else {
				console.log(response.message);
			}
		},
		error: function (error) {
			console.log(error);
		},
	});
}

function changePassword() {
	$(document).on("click", ".student-change-password", function () {
		var user_id = $(".student-side-page").data("student-id");
		var old_password = $("#oldPassword").val();
		var new_password = $("#newPassword").val();
		var confirm_password = $("#confirmPassword").val();

		$.ajax({
			method: "POST",
			url: "../phpscripts/std/change-password.php",
			data: {
				user_id: user_id,
				old_password: old_password,
				new_password: new_password,
				confirm_password: confirm_password,
			},
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					toastMessage
						.text(response.message)
						.addClass("text-success")
						.removeClass("text-danger");
					$("#liveToast").toast("show");

					$("button, input").prop("disabled", true);
					$("a")
						.addClass("disabled")
						.on("click", function (e) {
							e.preventDefault();
						});

					setTimeout(function () {
						window.location.reload();
					}, 2000);
				} else {
					toastMessage
						.text(response.message)
						.addClass("text-danger")
						.removeClass("text-success");
					$("#liveToast").toast("show");
				}
			},
			error: function (xhr, status, error) {
				console.log("AJAX Error:", error);
			},
		});
	});
}

function uploadProfileImage(file) {
	var formData = new FormData();
	formData.append("image", file);
	formData.append("student_id", $(".student-pg").data("student-id"));
	formData.append("student_name", $(".student-pg").data("student-name"));

	$.ajax({
		method: "POST",
		url: "../phpscripts/std/update-profile-image.php",
		data: formData,
		processData: false,
		contentType: false,
		success: function (response) {
			if (response.status === "success") {
				toastMessage
					.text(response.message)
					.addClass("text-success")
					.removeClass("text-danger");
				$("#liveToast").toast("show");
				$("#userImage").attr("src", response.new_image_url);
			} else {
				toastMessage
					.text(response.message)
					.addClass("text-danger")
					.removeClass("text-success");
				$("#liveToast").toast("show");
			}
		},
		error: function (xhr, status, error) {
			console.log("AJAX Error:", error);
		},
	});
}
