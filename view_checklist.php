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
                    <span><i class="bi bi-table me-2"></i></span> Checklist
                </div>
                <div class="card-body">
                    <form action="checklist_process.php" method="post">
                        <?php
                        $project = 'SGS(J).23J002';
                        $get = mysqli_query($conn, "SELECT s_checklist FROM securement WHERE s_proj_no = '$project'");
                        while ($cl = mysqli_fetch_assoc($get)) {
                            $checklist = $cl['s_checklist'];
                        }
                        $exp = explode(",", $checklist);
                        foreach ($exp as $value) {
                            $new = explode("=", $value);
                            // echo "$new[0] $new[1] <input type='checkbox'/> <br>";
                            if ($new[1] == 0) {
                                $checked = '';
                            } else {
                                $checked = 'checked';
                            }
                            $sql = "SELECT checklist_body FROM checklist WHERE checklist_id = '$new[0]'";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                                $body = $rows['checklist_body'];
                                // echo $body;
                        ?>
                                <ul class="list-group mb-2">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= $body ?>
                                        <span><input type="checkbox" <?= $checked ?> name="isCheck[]" id="" value="<?= $new[0] ?>"></span>
                                        <input type="hidden" name="check_id[]" value="<?= $new[0] ?>" id="">
                                        <!-- <input type="hidden" name="check_value[]" value="<?= $new[1] ?>" id=""> -->
                                    </li>
                                </ul>
                        <?php
                            }
                            // echo $body;
                        }
                        ?>

                        <button class="btn btn-primary mt-2" type="submit" name="update_checklist">Update</button>
                    </form>
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