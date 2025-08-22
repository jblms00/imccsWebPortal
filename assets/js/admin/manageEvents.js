const toastMessage = $("#liveToast .toast-body p");

$(document).ready(function () {
	displayCalendar();
	updateEvent();
	addNewEvent();
});

function displayCalendar() {
	var calendarEl = document.getElementById("calendar");

	var calendar = new FullCalendar.Calendar(calendarEl, {
		events: function (info, successCallback, failureCallback) {
			$.ajax({
				url: "../../phpscripts/fetch-calendar-data.php",
				dataType: "json",
				success: function (response) {
					if (response.status === "success") {
						var events = response.holidays.map(function (event) {
							return {
								id: event.event_id,
								title: event.event_name,
								date: event.event_date,
								extendedProps: {
									isHoliday: event.is_holiday,
								},
							};
						});
						successCallback(events);
					} else {
						console.error("Error fetching holidays:", response.message);
						failureCallback("Error fetching holidays");
					}
				},
			});
		},
		eventColor: "#e72489",
		headerToolbar: {
			left: "prev,next today addEvent",
			center: "title",
			right: "dayGridMonth,dayGridWeek,dayGridDay",
		},
		customButtons: {
			addEvent: {
				text: "Add Event",
				click: function () {
					$("#addEventModal").modal("show");
				},
			},
		},
		editable: true,
		droppable: true,
		eventClick: function (info) {
			$("#editEventModal").modal("show");

			$("#eventId").val(info.event.id);
			$("#eventTitle").val(info.event.title);
			$("#eventDate").val(formatDate(info.event.start));
			$("#eventIsHoliday").val(info.event.extendedProps.isHoliday);
		},
	});

	calendar.render();
}

function updateEvent() {
	$(document).on("click", "#saveEventChanges", function () {
		var id = $("#eventId").val();
		var title = $("#eventTitle").val();
		var date = $("#eventDate").val();
		var isHoliday = $("#eventIsHoliday").val();

		$.ajax({
			url: "../../phpscripts/usr/admin/update-calendar-event.php",
			type: "POST",
			data: {
				id: id,
				title: title,
				date: date,
				isHoliday: isHoliday,
			},
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
				console.error("AJAX Error:", status, error);
			},
		});
	});
}

function addNewEvent() {
	$(document).on("click", "#saveNewEvent", function () {
		var title = $("#newEventTitle").val();
		var date = $("#newEventDate").val();
		var isHoliday = $("#newEventIsHoliday").val();

		$.ajax({
			url: "../../phpscripts/usr/admin/add-new-calendar-event.php",
			type: "POST",
			data: {
				title: title,
				date: date,
				isHoliday: isHoliday,
			},
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					toastMessage
						.text(response.message)
						.removeClass("text-danger")
						.addClass("text-success");
					$("#liveToast").toast("show");

					$("#addEventModal").modal("hide");
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
				console.error("AJAX Error:", status, error);
			},
		});
	});
}

function formatDate(date) {
	if (date) {
		var d = new Date(date);

		var year = d.getFullYear();
		var month = ("0" + (d.getMonth() + 1)).slice(-2);
		var day = ("0" + d.getDate()).slice(-2);

		return year + "-" + month + "-" + day;
	}
	return "";
}
