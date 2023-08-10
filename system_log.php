<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
?>
    <?php if ($_SESSION['role'] == 'admin' && $_SESSION['special'] == 'true') { ?>
        <div class="row mt-3">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> User Log
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
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Timestamp</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $retrieve_staff = mysqli_query($conn, "SELECT * FROM log ORDER BY log_id DESC");
                                ?>
                                <tbody>
                                    <?php

                                    while ($rows = mysqli_fetch_assoc($retrieve_staff)) {
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $rows['log_title'] ?></td>
                                            <td><?= $rows['log_user'] ?></td>
                                            <td><?= $rows['log_date'] ?></td>
                                            <td><?= $rows['log_status'] ?></td>
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
        <script src="datatable.js"></script>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>