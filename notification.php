<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $branch = $_SESSION['branch'];
?>
    <?php if ($_SESSION['role'] == 'admin' && $_SESSION['special'] == 'true' || $_SESSION['role'] == 'superuser') { ?>
        <div class="row">
            <div class="col-md-12 mb-3 mt-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Notification

                        <!-- Button trigger modal -->
                        <!-- <a href="quotation_add.php" class="btn btn-sm btn-dark float-end">
                            Add Quotation
                        </a>
                        <button type="button" class="btn btn-sm btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#client" style="margin-right:10px">
                            Clients
                        </button> -->

                    </div>
                    <div class="card-body">
                        <!-- <a href="project_add.php" class="btn btn-sm btn-primary">Add Quotation</a> -->
                        <!-- Modal Add Quotation-->

                        <!-- Modal Client-->
                        <?php
                        include "modal_client.php";
                        ?>

                        <?php
                        // $sql_by_year = "select * from quotation where year(quot_app_date) = 2020";
                        ?>

                        <div class="data_table">
                            <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ref. No.</th>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Req by</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT * FROM notification";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) { ?>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($rows = mysqli_fetch_assoc($res)) {
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
                                                <td><?= $date ?></td>
                                                <td><?= $rows['noti_title'] ?></td>
                                                <td><?= $rows['noti_body'] ?></td>
                                                <td><?= $rows['noti_req_by'] ?></td>
                                                <td><?= $stat_code ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center find_noti_id">
                                                        <?php
                                                        if ($status == 'Applied') {
                                                        ?>
                                                            <input type="hidden" id="noti_id" value="<?= $rows['noti_id'] ?>">
                                                            <a title="Done" class="delete_noti" style="margin-right:10px"><span class="badge bg-success"><i class="bi bi-check-square"></i></span></a>
                                                        <?php
                                                        } else {
                                                            echo '';
                                                        }
                                                        ?>

                                                        <a href="<?= $rows['noti_path'] ?>" title="View"><span class='badge bg-<?= $class ?>'><i class="bi bi-<?= $disabled ?>"></i></span></a>

                                                    </div>
                                                </td>

                                            </tr>
                                        <?php $i++;
                                        } ?>

                                    </tbody>
                            </table>
                        </div>

                    <?php } ?>

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
                        title: 'Complete request?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, mark as Done!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "inquiry_process.php",
                                data: {
                                    "complete_request": 1,
                                    "noti_id": noti_id,
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Request is completed!',
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