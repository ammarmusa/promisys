<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['id'] ?? null;

?>
    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') { ?>
        <div class="row mt-3" style="font-size: 90%">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <?php
                        $sql = "SELECT * FROM quotation WHERE quot_id='$id'";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($rows = mysqli_fetch_assoc($res)) {
                                $proj_no = $rows['quot_no'];
                                $amount = number_format($rows['quot_amount'], 2);
                                $amount_2 = number_format($rows['quot_amount_tax'], 2);
                                $state = $rows['quot_proj_state'];
                                $branch = $rows['quot_branch'];
                                $status = $rows['quot_status'];
                                $link = $rows['quot_link'];
                        ?>
                                <span><i class="bi bi-table me-2"></i></span> <?= $proj_no; ?>
                                <input type="hidden" name="quotation_id" id="quotation_id" value="<?= $id ?>">
                                <?php
                                $securement_check = mysqli_query($conn, "SELECT * FROM securement WHERE s_quot_no = '$proj_no'");
                                if (mysqli_num_rows($securement_check) == 0) {
                                    if ($status == 'applied') {
                                ?>
                                        <a href="" class="btn btn-sm btn-danger float-end delete_quotation" title="Delete" style="margin-right: 10px">
                                            <i class="bi bi-trash"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="" class="btn btn-sm btn-danger disabled float-end" title="Delete" style="margin-right: 10px">
                                            <i class="bi bi-trash"></i></a>
                                    <?php
                                    }
                                    ?>

                                <?php
                                } else { ?>
                                    <a href="" class="btn btn-sm btn-danger disabled float-end" title="Delete" style="margin-right: 10px">
                                        <i class="bi bi-trash"></i></a>
                                <?php
                                }
                                ?>
                                <a href="quotation_edit.php?id=<?= $id ?>" class="btn btn-sm btn-primary float-end" title="Edit" style="margin-right: 10px">
                                    <i class="bi bi-pencil-square"></i></a>

                                <?php
                                if ($link != "") {
                                    $get_id = mysqli_query($conn, "SELECT quot_id FROM quotation WHERE quot_no")
                                ?>
                                    <a href="quotation.php" class="btn btn-sm btn-secondary float-end" title="Link" style="margin-right: 10px">
                                        <i class="bi bi-link"></i></a>
                                <?php
                                }
                                ?>
                                <a href="quotation.php" title="Back" class="btn btn-sm btn-warning float-end" style="margin-right: 10px">
                                    <i class="bi bi-arrow-left-square"></i></a>
                    </div>
                    <div class="card-body">
                        <h5><strong>PROJECT DETAILS (<?= $rows['quot_type']; ?>)</strong></h5>
                        <hr>
                        <p><strong>Title: </strong><?= $rows['quot_title']; ?></p>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Person incharge: </strong><?= $rows['quot_pic']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Site location: </strong><?= $rows['quot_site_location']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Projct state: </strong> <?= $rows['quot_proj_state']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Scope of work: </strong><?= $rows['quot_work_scope']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Market segmentation: </strong><?= $rows['quot_market_segmentation']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Duration: </strong> <?= $rows['quot_proj_duration']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Amount Inc Tax: </strong>RM <?= $amount ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Amount Exc Tax: </strong>RM <?= $amount_2 ?></p>
                            </div>
                        </div>

                        <br>
                        <h5><strong>CLIENT DETAILS</strong></h5>
                        <?php
                                if ($rows['quot_client'] === '') {
                        ?>
                            <div id="err_client" style="color:red">Please input client details.</div>
                        <?php
                                }
                        ?>
                        <hr>
                        <div class="row">
                            <p><strong>Company: </strong><?= $rows['quot_client']; ?></p>
                            <div class="col-md-4">
                                <p><strong>PIC: </strong><?= $rows['quot_client_pic']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Email: </strong><?= $rows['quot_client_email']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Phone: </strong><?= $rows['quot_client_phone']; ?></p>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                if ($rows['quot_sub_deadline'] == '0000-00-00') {
                                    $deadline = '-';
                                } else {
                                    $deadline = date("d/m/Y", strtotime($rows['quot_sub_deadline']));
                                }
                                ?>
                                <p><strong>Submission deadline: </strong><?= $deadline ?></p>
                            </div>
                            <div class="col-md-8">
                                <p><strong>Status: </strong>
                                    <?php
                                    $action = '';
                                    $sql_2 = "SELECT * FROM action WHERE action_proj_no = '$proj_no' AND action_for = 'quotation'";
                                    $res_2 = mysqli_query($conn, $sql_2);
                                    if (mysqli_num_rows($res_2) == 0) {
                                        echo "<span class='badge bg-warning text-dark'>Pending - Action required!</span>";
                                    } else {
                                        $action = '1';
                                        $check = mysqli_query($conn, "SELECT quot_status, quot_remark FROM quotation WHERE quot_no = '$proj_no'");
                                        while ($fetch = mysqli_fetch_assoc($check)) {
                                            if ($fetch['quot_status'] == 'approved') {
                                                echo "<span class='badge bg-success'>Success - " . $fetch['quot_remark'] . "</span><p></p>";
                                            } else if ($fetch['quot_status'] == 'rejected') {
                                                echo "<span class='badge bg-danger'>Failed - " . $fetch['quot_remark'] . "</span>";
                                            } else {
                                                echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                            }
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                <?php }
                        } ?>

                <div class="mb-3 row">
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add action</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="action_process.php" method="post">
                                    <div class="modal-body">
                                        <div class="">
                                            <input type="hidden" name="action_by" value="<?= $_SESSION['shortform']; ?>">
                                            <input type="hidden" name="quotation" value="<?= $id; ?>">
                                            <label for="date" class="col-form-label">Action taken: </label>
                                            <input class="form-control" required type="text" name="action_body" placeholder="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $sql_check = "SELECT quot_status, quot_client FROM quotation WHERE quot_no = '$proj_no'";
                $check_result = mysqli_query($conn, $sql_check);
                while ($check_rows = mysqli_fetch_assoc($check_result)) {
                    if ($check_rows['quot_status'] === 'approved' || $check_rows['quot_status'] === 'rejected' || $action === '' || $check_rows['quot_client'] === '') {
                        echo "<div class='col-sm-10'>
                        <button type='button' class='btn btn-dark' disabled data-bs-toggle='modal' data-bs-target='#approve'>
                            Approve / Reject
                        </button>
                    </div>";
                    } else {
                ?>
                        <div class="mb-3 row">
                            <!-- Button trigger modal -->
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#approve">
                                    Approve / Reject Quotation
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="approve" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="approveLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approveLabel">Add remark</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="quot_approve_process.php" method="post">
                                            <!-- <form action="test_post.php" method="post"> -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="proj_location" value="<?= $state ?>">
                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                        <input type="hidden" name="proj_no" value="<?= $proj_no; ?>">
                                                        <input type="hidden" name="branch" value="<?= $branch ?>">
                                                        <label for="date" class="col-form-label">Remark: </label>
                                                        <input class="form-control" required type="text" name="quot_remark">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label for="date" class="col-form-label">Award / Reject date: </label>
                                                        <input type="date" class="form-control" name="award_date" id="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                                <button type="submit" name="approve" class="btn btn-success">Approve</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        Action
                        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <?php
                            $sql = "SELECT * FROM action WHERE action_proj_no = '$proj_no' AND action_for = 'quotation'";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) { ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($res)) {
                                        $date = $rows['action_date'];
                                        $newDate = date("d/m/Y", strtotime($date));
                                    ?>
                                        <li class="list-group-item">
                                            <input type="hidden" name="action_id" class="action_id" value="<?= $rows['action_id'] ?>">
                                            <?= $rows['action_body'] ?>
                                            <a href="" class="delete_action"><i class="bi bi-trash" style="color:red"></i></a>
                                            <br>
                                            <span style=" font-size: 80%; color: blue">By: <?= $rows['action_by'] ?>, <?= $newDate ?></span>
                                        </li>
                                <?php $i++;
                                    }
                                } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'modal_add_doc.php';
        ?>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Supporting Files
                        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#upload_doc">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="data_table">
                            <table id="myTable" class="table table-striped table-bordered" class="display" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Document name</th>
                                        <th>Upload by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $quot_doc = mysqli_query($conn, "SELECT * FROM documents WHERE doc_proj_no = '$proj_no'");
                                    while ($qd = mysqli_fetch_assoc($quot_doc)) {
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $qd['doc_name'] ?></td>
                                            <td><?= $qd['doc_upload_by'] ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <input type="hidden" class="doc_id" value="<?= $qd['doc_id'] ?>">
                                                    <a href="<?= $qd['doc_path'] ?>" title="View" style="margin-right: 10px"><span class='badge bg-dark'><i class="bi bi-eye"></i></span></a>
                                                    <a href="" class="delete_document" title="Delete">
                                                        <span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
    <script>
        $(document).ready(function() {
            $('.delete_action').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var action_id = $(this).closest("li").find('.action_id').val();
                console.log(action_id)

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
                            url: "action_process.php",
                            data: {
                                "action_delete": 1,
                                "action_id": action_id,
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

            $('.delete_document').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var document_id = $(this).closest("td").find('.doc_id').val();
                console.log(document_id)

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
                            url: "document_process.php",
                            data: {
                                "delete_doc": 1,
                                "doc_id": document_id,
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
        })

        $(document).ready(function() {
            $('.delete_quotation').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var quotation_id = document.getElementById("quotation_id").value;
                console.log(quotation_id)

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
                            url: "quotation_delete.php",
                            data: {
                                "quotation_delete": 1,
                                "quotation_id": quotation_id,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    '',
                                    'success'
                                ).then((result) => {
                                    window.location.href = "quotation.php";
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
        })
    </script>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>