const toastMessage = $("#liveToast .toast-body p");

$(document).ready(function () {
	userLogin();

	$("#showPassword").on("change", function () {
		$("#userPassword").attr("type", this.checked ? "text" : "password");
	});

	$("#userType").on("change", function () {
		var userType = $(this).val();
		var feedbackMessage =
			userType === "student"
				? "Please enter your email or student number."
				: "Please enter your email.";

		$("#userAccount").siblings(".invalid-feedback").text(feedbackMessage);

		if (userType === "student") {
			$("#userAccount").attr("placeholder", "Student Number or Email");
			$("#userAccount")
				.siblings(".invalid-feedback")
				.text("Please enter your email or student number.");
		} else {
			$("#userAccount").attr("placeholder", "Email");
			$("#userAccount")
				.siblings(".invalid-feedback")
				.text("Please enter your email.");
		}
	});
});

function userLogin() {
	$(document).on("submit", "#loginForm", function (event) {
		event.preventDefault();

		var form = $(this);
		var userAccount = form.find("#userAccount").val();
		var userPassword = form.find("#userPassword").val();
		var userType = form.find("#userType").val();

		if (!form[0].checkValidity()) {
			event.stopPropagation();
			form.addClass("was-validated");
			return;
		}

		var phpUrl =
			userType === "student"
				? "phpscripts/std/student-login.php"
				: "phpscripts/usr/user-login.php";

		$.ajax({
			method: "POST",
			url: phpUrl,
			data: { userAccount, userPassword, userType },
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

					var redirectUrl = "";
					switch (userType) {
						case "finance":
							redirectUrl = "userManagement/finance/homepage";
							break;
						case "registrar":
							redirectUrl =
								"userManagement/registrar/manageRequests?pending";
							break;
						case "admin":
							redirectUrl = "userManagement/admin/manageStudents";
							break;
						case "student":
							redirectUrl = "std/homepage";
							break;
					}

					if (redirectUrl) {
						setTimeout(function () {
							window.location.href = redirectUrl;
						}, 3000);
					}
				} else {
					toastMessage
						.text(response.message)
						.addClass("text-danger")
						.removeClass("text-success");
					$("#liveToast").toast("show");
				}
			},
			error: function (error) {
				console.log(error);
			},
		});
	});
}
