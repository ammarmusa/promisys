<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>
    <?php if ($_SESSION['role'] == 'admin' && $_SESSION['special'] == 'true') { ?>
        <div class="row mt-3">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Register Staff Form
                        <!-- Button trigger modal -->
                        <a href="admin_staff.php" class="btn btn-sm btn-warning float-end">
                            <i class="bi bi-arrow-left-square"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="staff_process.php" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Staff number *</label>
                                    <input type="text" name="staff_number" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Staff name *</label>
                                    <input type="text" name="staff_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Staff initial *</label>
                                    <input type="text" name="staff_initial" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Staff title *</label>
                                    <input type="text" name="staff_title" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Department *</label>
                                    <input type="text" name="staff_department" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Staff IC number *</label>
                                    <input type="text" name="staff_ic" class="form-control" required>
                                    <small style="color: red">e.g: 010101013322</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Staff email address *</label>
                                    <input type="email" name="staff_email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Staff address *</label>
                                    <input type="text" name="staff_address" class="form-control" required>
                                </div>
                            </div>

                            <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Employee EPF Number</label>
                                    <input type="text" name="employee_epf_no" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Emplyee Income Tax Number</label>
                                    <input type="text" name="employee_income_tax_no" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Bank Account Number</label>
                                    <input type="text" name="bank_acc_no" class="form-control">
                                </div>
                            </div> -->

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Branch *</label>
                                    <select class="form-select" aria-label="Default select example" name="branch" required>
                                        <option selected>Select branch</option>
                                        <option value="HQ">Kuala Lumpur</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Pahang">Pahang</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Staff Type *</label>
                                    <select class="form-select" aria-label="Default select example" name="staff_type" required>
                                        <option selected>Select type</option>
                                        <option value="Permanent">Permanent</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Intern">Intern</option>
                                        <!-- <option value="Contract Partner">Contract Partner</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <button type="submit" name="save_staff" class="btn btn-primary">Save Staff</button>
                            </div>
                        </form>
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