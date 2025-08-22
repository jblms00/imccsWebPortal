const dataTable = $("#requestsTable").DataTable({
    autoWidth: true,
    scrollX: true,
    paging: true,
    columns: [
        { width: "1%" },
        { width: "10%" },
        { width: "15%" },
        { width: "20%" },
        { width: "10%" },
        { width: "10%" },
    ],
    columnDefs: [
        {
            targets: "_all",
            className: "text-start",
        },
    ],
    createdRow: function (row, data, dataIndex) {
        $(row).attr("data-request-id", data[1]);
        $(row).attr("data-student-id", data[5]);
    },
    data: [],
    language: {
        emptyTable: "No matching records found",
    },
});

$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.has("pending") ? "pending" : "completed";

    displayRequestsOnTable(status);
});

function displayRequestsOnTable(status) {
    $.ajax({
        url: "../../phpscripts/usr/registrar/get-credential-requests.php",
        type: "GET",
        data: { status: status },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                var tableBody = $("#requestsTable tbody");
                tableBody.empty();

                var requestsResult = response.requests.map((request) => {
                    return [
                        `<input type="checkbox" class="request-checkbox" value="${request.request_id}">`,
                        request.request_id,
                        request.student_name,
                        request.student_requested,
                        request.datetime_request,
                        `<div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-warning btn-sm view-modal">
                                <span class="me-2"><i class="fa-solid fa-eye"></i></span>View
                            </button>
                            <button type="button" class="btn btn-danger btn-sm delete-modal">
                                <span class="me-2"><i class="fa-solid fa-trash-can"></i></span>Delete
                            </button>
                        </div>`,
                        request.student_id,
                    ];
                });
                dataTable.clear().rows.add(requestsResult).draw();
            } else {
                console.error(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}
