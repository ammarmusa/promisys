<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>
    <section style="background-color: #eee;">


        <?php
        $staff = $_SESSION['staff_no'];
        $retrieve_data = mysqli_query($conn, "SELECT * FROM staff WHERE staff_number = '$staff'");
        while ($rows = mysqli_fetch_assoc($retrieve_data)) {
        ?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Staff's Profile
                            <a href="staff_edit.php?id=<?= $rows['id'] ?>" class="btn btn-sm btn-primary float-end" title="Edit" style="margin-right: 10px">
                                    <i class="bi bi-pencil-square"></i></a>
                        </div>
                        <div class="card-body text-center">
                            <img src="assets/images/default.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?= $rows['staff_initial']; ?></h5>
                            <p class="text-muted mb-1"><?= $rows['staff_title']; ?></p>
                            <p class="text-muted mb-4">Branch: <?= $rows['branch']; ?></p>
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0 fw-bold">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?= $rows['staff_name']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0 fw-bold">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?= $rows['staff_email']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0 fw-bold">Branch</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?= $rows['branch']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0 fw-bold">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?= $rows['staff_phone']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0 fw-bold">Address</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?= $rows['staff_address']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4">
                    <form action="staff_process.php" method="post">
                        <input type="password" class="form-control mb-2" name="password" placeholder="Reset Password">
                        <button type="submit" name="update_password" class="btn btn-danger">Reset Password</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
<?php
    include "include_header.php";
} else {
    header("Location: login.php");
} ?>