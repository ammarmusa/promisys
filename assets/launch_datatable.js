$(document).ready(function() {

    var table = $('#myTable').DataTable({
        responsive: true,
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    })

    table.button().container().appendTo('#myTable_wrapper .col-md-6:eq(0)')
});