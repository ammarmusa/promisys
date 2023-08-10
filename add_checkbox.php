<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>

    <div class="row">
        <div class="mb-3">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Add Checkbox
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="body" id="body" class="form-control">
                            <span id="error" style="display: none; color:red"></span>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" id="add_data">Add data</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <form action="checklist_process.php" method="post">
                            <div class="data_table">
                                <table id="myTable_2" class="table table-striped table-bordered" class="display" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                            <th>No.</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT * FROM checklist";
                                    $res = mysqli_query($conn, $sql); ?>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($rows = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox" value="<?= $rows['checklist_id']; ?>" id="<?= $rows['checklist_id']; ?>" name="checkbox[]"></td>
                                                <td><?= $i; ?></td>
                                                <td><?= $rows['checklist_body'] ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <!-- <a href="" title="Delete" style="color:red"><i class="bi bi-trash"></i></a> -->
                                                        <input type="hidden" name="checklist_id" class="checklist_id" value="<?= $rows['checklist_id'] ?>">
                                                        <a href="" class="delete_checklist"><i class="bi bi-trash" style="color:red"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                                <button type="submit" name="add_checklist" class="btn btn-primary mt-3">Add Checklist to Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#myTable_2').DataTable({
                responsive: true,
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                paging: false
            })

            table.button().container().appendTo('#myTable_2_wrapper .col-md-6:eq(0)')

            // Handle click on "Select all" control
            $('#example-select-all').on('click', function() {
                // Get all rows with search applied
                var rows = table.rows({
                    'search': 'applied'
                }).nodes();
                // Check/uncheck checkboxes for all rows in the table
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
            });

            $('.delete_checklist').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var checklist_id = $(this).closest("td").find('.checklist_id').val();
                console.log(checklist_id)

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "checklist_process.php",
                            data: {
                                "checklist_delete": 1,
                                "checklist_id": checklist_id,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    '',
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                })
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Failed to delete',
                                    '',
                                    'warning'
                                ).then((result) => {
                                    location.reload();
                                })
                            }
                        })
                    }
                })
            })

            $("#add_data").click(function(e) {
                e.preventDefault();
                //add this line to prevent reload
                var body = $("#body").val();
                if (body == "") {
                    $("#error").fadeIn().text("Description required.");
                    $("input#body").focus();
                    return false;
                }

                $.ajax({
                    type: "post",
                    url: "checklist_process.php",
                    data: "body=" + body + "&add_data=add_data",
                    success: function() {
                        document.getElementById("body").value = '';
                        location.reload();
                    }
                });
            });
        })
    </script>

<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>