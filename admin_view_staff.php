<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['id'];
?>
    <?php if ($_SESSION['role'] == 'admin' && $_SESSION['special'] == 'true') { ?>
        <div class="row mt-3">
            <?php
            $retrieve_staff = mysqli_query($conn, "SELECT * FROM staff WHERE id='$id'");
            while ($rows = mysqli_fetch_assoc($retrieve_staff)) {
                $staff = $rows['staff_number'];
            ?>
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Staff Information
                            <?php
                            $sql_2 = "SELECT * FROM users WHERE staff_no = '$staff'";
                            $res_2 = mysqli_query($conn, $sql_2);
                            while($r = mysqli_fetch_assoc($res_2)){
                                $user_id = $r['id'];
                                echo $user_id;
                            }
                            if (mysqli_num_rows($res_2) != 0) {
                                $registered = 'true';
                            } else {
                                $registered = 'false';
                            ?>
                            <?php
                            }
                            ?>
                             <button type="button" class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Promisys
                                </button>
                            <a href="staff_edit.php?id=<?= $id ?>" class="btn btn-sm btn-dark float-end" style="margin-right: 10px">
                                Update</a>

                            <a href="javascript:history.go(-1)" class="btn btn-sm btn-warning float-end" style="margin-right: 10px">
                                <i class="bi bi-arrow-left-square"></i></a>

                        </div>
                        
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">

                                <?php
                                if($registered === 'true'){
                                    ?>
                                     <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Remove user from Promisys</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="staff_process.php" method="post">
                                            <div class="modal-body">
                                                    <p>Are you sure?</p>
                                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="delete_promisys" class="btn btn-danger">Remove</button>
                                        </div>
                                        </form>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Register staff to Promisys</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="staff_process.php" method="post">
                                        <div class="modal-body">
                                       
                                            <div class="">
                                                <input type="hidden" name="id" value="<?= $rows['id'] ?>">
                                                <input type="hidden" name="staff_no" value="<?= $staff ?>">
                                                <input type="hidden" name="staff_name" value="<?= $rows['staff_name'] ?>">
                                                <input type="hidden" name="staff_ic" value="<?= $rows['staff_ic'] ?>">
                                                <input type="hidden" name="staff_initial" value="<?= $rows['staff_initial'] ?>">
                                                <label for="role" class="col-form-label">Role</label>
                                                <select class="form-select" name="role" aria-label="Default select example" required>
                                                    <option selected value="">Open this select menu</option>
                                                    <option value="admin">admin</option>
                                                </select>
                                                <div class="form-check form-switch mt-2">
                                                    <input class="form-check-input" type="checkbox" name="special_role" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Special role</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="add_promisys" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                    <?php
                                }
                                ?>
                                    
                                </div>
                            </div>
                        
                        <div class="card-body">

                            <section style="background-color: #f4f5f7;">
                                <div class="container py-5 h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col col-lg-12 mb-4 mb-lg-0">
                                            <div class="card mb-3" style="border-radius: .5rem;">
                                                <div class="row g-0">
                                                    <div class="col-md-4 gradient-custom text-center" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                        <img src="assets/images/man.png" alt="Avatar" class="img-fluid my-3" style="width: 80px;" />
                                                        <h6><strong><?= $rows['staff_name'] ?> (<?= $rows['staff_initial'] ?>)</strong></h6>
                                                        <p><?= $rows['staff_title'] ?></p>
                                                        <span class="badge bg-success"><?= $rows['staff_number'] ?></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body p-4">
                                                            <h6>Information</h6>
                                                            <hr class="mt-0 mb-4">
                                                            <div class="row pt-1">
                                                                <div class="col-6 mb-3">
                                                                    <h6>Email</h6>
                                                                    <p class="text-muted"><?= $rows['staff_email'] ?></p>
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <h6>Phone</h6>
                                                                    <p class="text-muted"><?= $rows['staff_phone'] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row pt-1">
                                                                <div class="col-6 mb-3">
                                                                    <h6>Department</h6>
                                                                    <p class="text-muted"><?= $rows['staff_department'] ?></p>
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <h6>Branch</h6>
                                                                    <p class="text-muted"><?= $rows['branch'] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row pt-1">
                                                                <div class="col-6 mb-3">
                                                                    <h6>IC Number</h6>
                                                                    <p class="text-muted"><?= $rows['staff_ic'] ?></p>
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <h6>Address</h6>
                                                                    <p class="text-muted"><?= $rows['staff_address'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php
                    }
                        ?>
                        </div>
                    </div>
                </div>
        </div>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>