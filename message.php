<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>
    <?php if ($_SESSION['role'] == 'admin') { ?>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Receive Message

                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Quotation
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#client" style="margin-right:10px">
                            Clients
                        </button> -->

                    </div>
                    <div class="card-body">
                        <!-- <a href="project_add.php" class="btn btn-sm btn-primary">Add Quotation</a> -->
                        <form action="note_process.php" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="note_body" id="" required placeholder="Message">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <select class="form-select" name="note_staff" required>
                                        <option selected value="">Staff</option>
                                        <?php
                                        $use = $_SESSION['shortform'];
                                        $user = mysqli_query($conn, "SELECT shortform FROM users WHERE shortform != '$use'");
                                        while ($sf = mysqli_fetch_assoc($user)) {
                                        ?>
                                            <option value="<?= $sf['shortform'] ?>"><?= $sf['shortform'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <select class="form-select" name="note_priority" required>
                                        <option selected value="">Priority</option>
                                        <option value="1">Urgent</option>
                                        <option value="2">Intermediate</option>
                                        <option value="3">Free time</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button type="submit" name="send_msg" class="btn btn-dark">Send</button>
                                </div>
                            </div>
                        </form>
                        <div class="data_table">
                            <table id="myTable" class="table table-striped table-bordered" class="display" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Datetime</th>
                                        <th>Message</th>
                                        <th>From</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $note_sql = "SELECT * FROM note WHERE note_staff='$use'";
                                $note_res = mysqli_query($conn, $note_sql);
                                ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($nr = mysqli_fetch_assoc($note_res)) {
                                        $timestamp2 = date('d/m/y g:i A', strtotime($nr['note_timestamp']));
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $timestamp2 ?></td>
                                            <td><?= $nr['note_body'] ?></td>
                                            <td><?= $nr['note_user'] ?></td>
                                            <td><?php
                                                if ($nr['note_priority'] == '1') {
                                                    echo "<span class='badge bg-danger'>Urgent</span>";
                                                } else if ($nr['note_priority'] == '2') {
                                                    echo "<span class='badge bg-warning text-dark'>Intermediate</span>";
                                                } else {
                                                    echo "<span class='badge bg-primary'>Free Time</span>";
                                                }
                                                ?></td>
                                            <td>
                                                <?php
                                                if ($nr['note_status'] == 'pending') {
                                                    echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                                } else {
                                                    echo "<span class='badge bg-success'>Completed</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center find_id">
                                                    <input type="hidden" name="note_id" id="note_id" class="note_id" value="<?= $nr['note_id'] ?>">
                                                    <?php
                                                    if ($nr['note_status'] == 'pending') {
                                                    ?>
                                                        <a title="Complete" class="complete"><span class='badge bg-success'><i class="bi bi-clipboard2-check"></i></span></a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a disabled title="Complete"><span class='badge bg-secondary'><i class="bi bi-clipboard2-check"></i></span></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--End of Row-->

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Sent Message

                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Quotation
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#client" style="margin-right:10px">
                            Clients
                        </button> -->

                    </div>
                    <div class="card-body">
                        <!-- <a href="project_add.php" class="btn btn-sm btn-primary">Add Quotation</a> -->
                        <div class="data_table">
                            <table id="myTable_2" class="table table-striped table-bordered" class="display" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Datetime</th>
                                        <th>Message</th>
                                        <th>Receiver</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $sent_sql = "SELECT * FROM note WHERE note_user='$use'";
                                $sent_res = mysqli_query($conn, $sent_sql);
                                ?>
                                <tbody>
                                    <?php
                                    $a = 1;
                                    while ($sn = mysqli_fetch_assoc($sent_res)) {
                                        $timestamp = date('d/m/y g:i A', strtotime($sn['note_timestamp']));
                                    ?>
                                        <tr>
                                            <td><?= $a; ?></td>
                                            <td><?= $timestamp ?></td>
                                            <td><?= $sn['note_body'] ?></td>
                                            <td><?= $sn['note_staff'] ?></td>
                                            <td>
                                                <?php
                                                if ($sn['note_priority'] == '1') {
                                                    echo "<span class='badge bg-danger'>Urgent</span>";
                                                } else if ($sn['note_priority'] == '2') {
                                                    echo "<span class='badge bg-warning text-dark'>Intermediate</span>";
                                                } else {
                                                    echo "<span class='badge bg-primary'>Free Time</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($sn['note_status'] == 'pending') {
                                                    echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                                } else {
                                                    echo "<span class='badge bg-success'>Completed</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center find_id">
                                                    <input type="hidden" name="note_id" id="note_id" class="note_id" value="<?= $sn['note_id'] ?>">
                                                    <a title="Delete" class="delete"><span class='badge bg-danger'><i class="bi bi-trash"></i></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $a++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var table = $('#myTable_2').DataTable({
                responsive: true,
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            })

            table.button().container().appendTo('#myTable_2_wrapper .col-md-6:eq(0)')

            $('.complete').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var note_id = $(this).closest(".find_id").find('.note_id').val();
                console.log(note_id)

                Swal.fire({
                    title: 'Change status to completed?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "note_process.php",
                            data: {
                                "change_status": 1,
                                "note_id": note_id,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Status updated!',
                                    '',
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                })
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Failed to update',
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

            $('.delete').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var note_id = $(this).closest(".find_id").find('.note_id').val();
                console.log(note_id)

                Swal.fire({
                    title: 'Delete message?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "note_process.php",
                            data: {
                                "delete_status": 1,
                                "note_id": note_id,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Message deleted!',
                                    '',
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                })
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Failed to delete message',
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
        </script>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>