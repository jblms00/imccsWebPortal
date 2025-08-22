var toastMessage = $("#liveToast .toast-body p");
var selectedRecords = [];

$(document).ready(function () {
    displayTuitionRecords();
    updateTuitionRecords();

    $("#selectAllCheckbox").change(function () {
        var isChecked = $(this).is(":checked");
        $(".record-checkbox").prop("checked", isChecked);
        toggleButtonContainer();
    });

    $(document).on("change", ".record-checkbox", function () {
        var allChecked =
            $(".record-checkbox").length ===
            $(".record-checkbox:checked").length;
        $("#selectAllCheckbox").prop("checked", allChecked);
        toggleButtonContainer();
    });

    $(document).on("click", "#updateButton", function () {
        selectedRecords.length = 0;
        $(".record-checkbox:checked").each(function () {
            selectedRecords.push($(this).val());
        });

        if (selectedRecords.length > 0) {
            var firstRecordId = selectedRecords[0];
            var currentStatus = $(
                `tr[data-record-id=${firstRecordId}] td:nth-child(5) .badge`
            )
                .text()
                .trim();
            var currentAmount = $(
                `tr[data-record-id=${firstRecordId}] td:nth-child(4)`
            )
                .text()
                .trim();
            $("#statusSelect").val(currentStatus);
            $("#amountInput").val(currentAmount);
        }
    });
});

const dataTable = $("#tuitionsTable").DataTable({
    autoWidth: true,
    scrollX: true,
    paging: false,
    columns: [
        { width: "1%" },
        { width: "10%" },
        { width: "15%" },
        { width: "20%" },
        { width: "10%" },
    ],
    columnDefs: [
        {
            targets: "_all",
            className: "text-start",
        },
    ],
    createdRow: function (row, data, dataIndex) {
        $(row).attr("data-record-id", data[5]);
    },
    data: [],
    language: {
        emptyTable: "No matching records found",
    },
});

function toggleButtonContainer() {
    var $container = $(".dt-layout-cell.dt-layout-start");
    $container.find(".generate-btn-container").remove();

    var anyChecked = $(".record-checkbox:checked").length > 0;
    var allChecked =
        $(".record-checkbox").length === $(".record-checkbox:checked").length;

    let buttonLabel = "";
    if (allChecked) {
        buttonLabel = "Update All Records";
    } else if (anyChecked) {
        buttonLabel = "Update Selected Records";
    }

    if (buttonLabel) {
        $container.append(`
            <div class="generate-btn-container">
                <button type="button" class="btn btn-warning btn-sm" id="updateButton" data-bs-toggle="modal" data-bs-target="#updateModal">${buttonLabel}</button>
            </div>
        `);
    }
}

function displayTuitionRecords() {
    $.ajax({
        url: "../../phpscripts/usr/finance/get-tuition-records.php",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                var tableBody = $("#tuitionsTable tbody");
                tableBody.empty();

                var recordsResult = response.records.map((record) => {
                    var badgeClass = "";
                    var paymentStatusText = record.payment_status;

                    if (paymentStatusText === "Paid") {
                        badgeClass = "badge bg-success w-50";
                    } else if (paymentStatusText === "Pending") {
                        badgeClass = "badge bg-warning text-dark w-50";
                    } else if (paymentStatusText === "Overdue") {
                        badgeClass = "badge bg-danger w-50";
                    }

                    return [
                        `<input type="checkbox" class="record-checkbox" value="${record.record_id}">`,
                        record.student_id,
                        record.student_name,
                        record.amount,
                        `<span class="${badgeClass}">${paymentStatusText}</span>`,
                        record.record_id,
                    ];
                });

                dataTable.clear().rows.add(recordsResult).draw();
            } else {
                console.error(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

function updateTuitionRecords() {
    $(document).on("click", "#saveStatusBtn", function () {
        var newStatus = $("#statusSelect").val();
        var newAmount = $("#amountInput").val();

        $.ajax({
            url: "../../phpscripts/usr/finance/update-tuition-records.php",
            type: "POST",
            data: {
                recordIds: selectedRecords,
                status: newStatus,
                amount: newAmount,
            },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    toastMessage
                        .text(response.message)
                        .removeClass("text-danger")
                        .addClass("text-success");
                    $("#liveToast").toast("show");
                    $("#selectAllCheckbox, .record-checkbox").prop(
                        "checked",
                        false
                    );
                    $("#updateButton").hide();
                    $("#updateModal").modal("hide");
                    displayTuitionRecords();
                } else {
                    toastMessage
                        .text(response.message)
                        .removeClass("text-success")
                        .addClass("text-danger");
                    $("#liveToast").toast("show");
                }
            },
            error: function (xhr, status, error) {
                toastMessage
                    .text(error)
                    .removeClass("text-success")
                    .addClass("text-danger");
                $("#liveToast").toast("show");
            },
        });
    });
}
