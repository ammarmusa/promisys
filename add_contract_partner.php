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
                        <span><i class="bi bi-table me-2"></i></span> Register Contract Partner
                        <!-- Button trigger modal -->
                        <a href="admin_staff.php" class="btn btn-sm btn-warning float-end">
                            <i class="bi bi-arrow-left-square"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="contract_partner_process.php" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Project reference *</label>
                                    <select class="form-select" name="cp_proj_no" aria-label="Default select example" id="select_box" required>
                                        <option value="">Select project</option>
                                        <?php
                                        $query = "
                                            SELECT s_proj_no FROM securement
                                            ORDER BY s_award_date ASC
                                        ";

                                        $result = $conn->query($query);
                                        foreach ($result as $row) {
                                        ?>
                                            <option value="<?= $row["s_proj_no"] ?>"> <?= $row["s_proj_no"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Our reference</label>
                                    <input type="text" name="cp_ref_no" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Contract partner *</label>
                                    <input type="text" name="cp_name" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="date" class="col-form-label">Start work *</label>
                                    <input type="date" name="cp_start" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="date" class="col-form-label">Finish work *</label>
                                    <input type="date" name="cp_end" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Contract fee (RM)*</label>
                                    <input type="text" name="cp_fee" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Terms & Mode of Payment *</label>
                                    <textarea name="cp_term" class="form-control" cols="30" rows="5" required></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label class="col-form-label">Miscellaneous</label>
                                <div class="col-md-4">
                                    <input type="text" name="cp_lad" class="form-control" placeholder="LAD">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="cp_vas" class="form-control" placeholder="VAS">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="cp_others" class="form-control" placeholder="Others">
                                </div>
                            </div>

                            <div class="mb-3 mt-3">
                                <button type="submit" name="save_contract_partner" class="btn btn-primary">Register Contract Partner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var select_box_element = document.querySelector('#select_box');

            dselect(select_box_element, {
                search: true
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