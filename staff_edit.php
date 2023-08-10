<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>
    <?php if ($_SESSION['role'] == 'admin' && $_SESSION['special'] == 'true') { ?>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM staff WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Register Staff Form
                            <!-- Button trigger modal -->
                            <a href="javascript:history.go(-1)" class="btn btn-sm btn-warning float-end">
                                <i class="bi bi-arrow-left-square"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="staff_process.php" method="POST">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Staff number *</label>
                                        <input type="text" name="staff_number" class="form-control" value="<?= $rows['staff_number'] ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="staff_id" value="<?= $id ?>">
                                        <label>Staff name *</label>
                                        <input type="text" name="staff_name" value="<?= $rows['staff_name'] ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Staff initial *</label>
                                        <input type="text" name="staff_initial" value="<?= $rows['staff_initial'] ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Staff title *</label>
                                        <input type="text" name="staff_title" value="<?= $rows['staff_title'] ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Department *</label>
                                        <input type="text" name="staff_department" value="<?= $rows['staff_department'] ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Staff IC number *</label>
                                        <input type="text" name="staff_ic" value="<?= $rows['staff_ic'] ?>" class="form-control" required>
                                        <small style="color: red">e.g: 010101013322</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Staff email address *</label>
                                        <input type="email" name="staff_email" value="<?= $rows['staff_email'] ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Staff address *</label>
                                        <input type="text" name="staff_address" value="<?= $rows['staff_address'] ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Employee EPF Number</label>
                                        <input type="text" name="employee_epf_no" value="<?= $rows['employee_epf_no'] ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Emplyee Income Tax Number</label>
                                        <input type="text" name="employee_income_tax_no" value="<?= $rows['employee_income_tax_no'] ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Bank Name</label>
                                        <input type="text" name="bank_name" value="<?= $rows['bank_name'] ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Bank Account Number</label>
                                        <input type="text" name="bank_acc_no" value="<?= $rows['bank_acc_no'] ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Branch *</label>
                                        <select class="form-select" aria-label="Default select example" name="branch" required>
                                            <option selected>Select branch</option>
                                            <option value="HQ" <?= $rows['branch'] == 'HQ' ? "selected='selected'" : "" ?>>HQ</option>
                                            <option value="Johor" <?= $rows['branch'] == 'Johor' ? "selected='selected'" : "" ?>>Johor</option>
                                            <option value="Pahang" <?= $rows['branch'] == 'Pahang' ? "selected='selected'" : "" ?>>Pahang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <button type="submit" name="update_staff" class="btn btn-primary">Update Staff</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>