<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $user = $_SESSION['shortform'];
?>
    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') { ?>
        <div class="row mt-3">
            <div class="col-md-2 d-grid gap-2">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Request">Contract Partner</button>

                <!-- Modal -->
                <div class="modal fade" id="Request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="inquiry_process.php" method="POST" enctype='multipart/form-data'>
                                <div class="modal-body">
                                    <input type="text" class="form-control mb-2" name="noti_body" placeholder="Remark" required>
                                    <label for="date" class="col-form-label">Form :</label>
                                    <input name="upload[]" type="file" class="form-control" required />
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="req_new_partner">Send Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-grid gap-2">
                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#bugReport">Report bug</button>

                <!-- Modal -->
                <div class="modal fade" id="bugReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Please fill in information requried</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="inquiry_process.php" method="POST" enctype='multipart/form-data'>
                                <div class="modal-body">
                                    <input type="text" class="form-control mb-2" name="noti_body" placeholder="Remark" required>
                                    <label for="date" class="col-form-label mt-3">Screenshot :</label>
                                    <input name="upload[]" type="file" class="form-control" required />
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="bug_report">Send Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-grid gap-2">
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#other">Other</button>

                <!-- Modal -->
                <div class="modal fade" id="other" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Please fill in information requried</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="inquiry_process.php" method="POST" enctype='multipart/form-data'>
                                <div class="modal-body">
                                    <input type="text" class="form-control mb-2" name="noti_title" placeholder="Title" required>
                                    <input type="text" class="form-control" name="noti_body" placeholder="Remark" required>
                                    <label for="date" class="col-form-label mt-3">Supporting file :</label>
                                    <input name="upload[]" type="file" class="form-control" />
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="other_report">Send Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span>Inquiry list
                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Staff
                        </button>
                        <a href="javascript:history.go(-1)" class="btn btn-sm btn-warning float-end" style="margin-right: 10px">
                            << Back</a> -->

                    </div>
                    <div class="card-body" style="font-size:90%">
                        <!-- <a href="project_add.php" class="btn btn-sm btn-primary">Add Quotation</a> -->

                        <div class="data_table">
                            <table id="myTable" class="table table-striped table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ref No.</th>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Timestamp</th>
                                        <th>Status</th>
                                        <th>Submitted Form</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $retrieve_staff = mysqli_query($conn, "SELECT * FROM notification WHERE noti_req_by = '$user'");
                                ?>
                                <tbody>
                                    <?php

                                    while ($rows = mysqli_fetch_assoc($retrieve_staff)) {
                                        if ($rows['noti_path'] == '') {
                                            $disabled = 'eye-slash';
                                            $class = 'secondary';
                                        } else {
                                            $disabled = 'eye';
                                            $class = 'dark';
                                        }
                                        $timestamp = strtotime($rows['noti_timestamp']);
                                        $date = date("d/m/Y", $timestamp);
                                        $status = $rows['noti_status'];
                                        if ($status == 'Applied') {
                                            $stat_code = "<span class='badge bg-warning text-dark'>Applied</span>";
                                        } else if ($status == 'Done') {
                                            $stat_code = "<span class='badge bg-success'>Done</span>";
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $rows['noti_ref_no'] ?></td>
                                            <td><?= $rows['noti_title'] ?></td>
                                            <td><?= $rows['noti_req_by'] ?></td>
                                            <td><?= $date ?></td>
                                            <td><?= $stat_code ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center find_noti_id">
                                                    <?php
                                                    if ($status == 'Applied') {
                                                    ?>
                                                        <input type="hidden" id="noti_id" value="<?= $rows['noti_id'] ?>">
                                                        <a title="Delete" class="delete_noti" style="margin-right:10px"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                    <?php
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>

                                                    <a href="<?= $rows['noti_path'] ?>" title="View"><span class='badge bg-<?= $class ?>'><i class="bi bi-<?= $disabled ?>"></i></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {

                // var table = $('#myTable_2').DataTable({
                //     responsive: true,
                //     buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                // })

                // table.button().container().appendTo('#myTable_2_wrapper .col-md-6:eq(0)')

                $('.delete_noti').click(function(e) {
                    e.preventDefault();
                    // console.log("clicked")
                    var noti_id = $(this).closest(".find_noti_id").find('#noti_id').val();
                    console.log(noti_id)

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Delete!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "inquiry_process.php",
                                data: {
                                    "delete_noti": 1,
                                    "noti_id": noti_id,
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
                                        'Failed!',
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
            });
        </script>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>