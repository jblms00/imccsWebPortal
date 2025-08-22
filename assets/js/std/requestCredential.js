const toastMessage = $("#liveToast .toast-body p");

$(document).ready(function () {
    submitRequestForm();
});

function submitRequestForm() {
    $("#requestForm").on("submit", function (event) {
        event.preventDefault();
        event.stopPropagation();

        var form = $(this)[0];

        var form137Checked = $("#form137").prop("checked");
        var goodMoralChecked = $("#goodMoral").prop("checked");
        var certificateEnrollmentChecked = $("#certificateEnrollment").prop(
            "checked"
        );
        var certificateGraduationChecked = $("#certificateGraduation").prop(
            "checked"
        );
        var secondDiplomaChecked = $("#secondDiploma").prop("checked");

        if (
            !form137Checked &&
            !goodMoralChecked &&
            !certificateEnrollmentChecked &&
            !certificateGraduationChecked &&
            !secondDiplomaChecked
        ) {
            toastMessage
                .text("Please select at least one document to request.")
                .addClass("text-danger")
                .removeClass("text-success");
            $("#liveToast").toast("show");
            return;
        }

        var student_number = $("body.student-pg").data("student-id");
        var userName = $("#userName").val();
        var userEmail = $("#userEmail").val();
        var userContactNumber = $("#userContactNumber").val();
        var userYear = $("#userYear").val();
        var userAnswer = $("#userAnswer").val();

        $.ajax({
            method: "POST",
            url: "../phpscripts/std/request-credentials.php",
            data: {
                student_number: student_number,
                student_name: userName,
                student_email: userEmail,
                student_contact_number: userContactNumber,
                student_year_graduated: userYear,
                form137Checked,
                goodMoralChecked,
                certificateEnrollmentChecked,
                certificateGraduationChecked,
                secondDiplomaChecked,
                userAnswer,
            },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    toastMessage
                        .text(response.message)
                        .addClass("text-success")
                        .removeClass("text-danger");
                    $("#liveToast").toast("show");
                    $("#requestForm")[0].reset();
                    $("button, input").prop("disabled", true);
                    setTimeout(() => window.location.reload(), 2000);
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
