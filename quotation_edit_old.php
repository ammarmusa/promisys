<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['id'];
?>
    <?php
    $data = "SELECT * FROM quotation WHERE quot_id = '$id'";
    $result = mysqli_query($conn, $data);
    while ($rows = mysqli_fetch_assoc($result)) {
    ?>
        <div class="row">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Edit Quotation
                    </div>
                    <div class="card-body">
                        <form action="quotation_update.php" method="post" class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label ">Project Reference</label>
                                    <input type="hidden" name="quot_id" value="<?= $id ?>">
                                    <input class="form-control" type="text" name="quot_no" placeholder="" value="<?= $rows['quot_no']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="date" class="mt-3 col-form-label">Project Title: </label>
                                <input class="form-control" name="quot_title" type="text" value="<?= $rows['quot_title']; ?>" placeholder="" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Person Incharge:</label>
                                    <select class="form-select" name="quot_pic" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <?php
                                        $user = mysqli_query($conn, "SELECT shortform FROM users");
                                        while ($sf = mysqli_fetch_assoc($user)) {
                                        ?>
                                            <option value="<?= $sf['shortform'] ?>" <?= $sf['shortform'] == $rows['quot_pic'] ? 'selected="selected"' : '' ?>><?= $sf['shortform'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Market segmentation:</label>
                                    <select class="form-select" name="quot_market_segmentation" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="OIL & GAS" <?= $rows['quot_market_segmentation'] == 'OIL & GAS' ? ' selected="selected"' : ''; ?>>OIL & GAS</option>
                                        <option value="PROPERTY & INFRASTRUCTURE" <?= $rows['quot_market_segmentation'] == 'PROPERTY & INFRASTRUCTURE' ? ' selected="selected"' : ''; ?>>PROPERTY & INFRASTRUCTURE</option>
                                        <option value="UTILITY" <?= $rows['quot_market_segmentation'] == 'UTILITY' ? ' selected="selected"' : ''; ?>>UTILITY</option>
                                        <option value="AVIATION" <?= $rows['quot_market_segmentation'] == 'AVIATION' ? ' selected="selected"' : ''; ?>>AVIATION</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Site location:</label>
                                    <input class="form-control" value="<?= $rows['quot_site_location']; ?>" name="quot_site_location" type="text" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Work scope:</label>
                                    <select class="form-select" name="quot_work_scope" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="ENG" <?= $rows['quot_work_scope'] == 'ENG' ? ' selected="selected"' : ''; ?>>ENG</option>
                                        <option value="UUM" <?= $rows['quot_work_scope'] == 'UUM' ? ' selected="selected"' : ''; ?>>UUM</option>
                                        <option value="TITLE" <?= $rows['quot_work_scope'] == 'TITLE' ? ' selected="selected"' : ''; ?>>TITLE</option>
                                        <option value="GIS" <?= $rows['quot_work_scope'] == 'GIS' ? ' selected="selected"' : ''; ?>>GIS</option>
                                        <option value="HYDRO" <?= $rows['quot_work_scope'] == 'HYDRO' ? ' selected="selected"' : ''; ?>>HYDRO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Project duration:</label>
                                    <input class="form-control" value="<?= $rows['quot_proj_duration']; ?>" name="quot_proj_duration" type="text" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-5 col-form-label mt-3">Amount (RM)</label>
                                    <input class="form-control" name="quot_amount" value="<?= $rows['quot_amount']; ?>" type="text" placeholder="" pattern="^\d*(\.\d{0,2})?$" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-6">
                                    <div class="form-check form-switch">
                                        <?php
                                        if ($rows['quot_amount'] != $rows['quot_amount_tax']) {
                                            $checkbox = "checked";
                                        } else {
                                            $checkbox = '';
                                        }
                                        ?>
                                        <input class="form-check-input" <?= $checkbox ?> type="checkbox" name="tax" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Include 6% SST</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client:</label>
                                    <select class="form-select" name="quot_client" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <?php
                                        $client_result = mysqli_query($conn, "SELECT * FROM clients");
                                        while ($client = mysqli_fetch_assoc($client_result)) {
                                            $client_id = $client['client_id'];
                                            $client_name = $client['client_comp_name'];
                                        ?>
                                            <option value="<?= $client_id ?>" <?= $client_name == $rows['quot_client'] ? 'selected="selected"' : '' ?>><?= $client_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client type:</label>
                                    <select class="form-select" name="quot_client_type" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="Private" <?= $rows['quot_client_type'] == 'Private' ? ' selected="selected"' : ''; ?>>Private</option>
                                        <option value="GLC" <?= $rows['quot_client_type'] == 'GLC' ? ' selected="selected"' : ''; ?>>GLC</option>
                                        <option value="Gov" <?= $rows['quot_client_type'] == 'Gov' ? ' selected="selected"' : ''; ?>>Gov</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client status:</label>
                                    <select class="form-select" name="quot_client_status" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="Existing" <?= $rows['quot_client_status'] == 'Existing' ? ' selected="selected"' : ''; ?>>Existing</option>
                                        <option value="New" <?= $rows['quot_client_status'] == 'New' ? ' selected="selected"' : ''; ?>>New</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client phone:</label>
                                    <input class="form-control" value="<?= $rows['quot_client_phone']; ?>" name="quot_client_phone" type="text" placeholder="" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client email:</label>
                                    <input class="form-control" value="<?= $rows['quot_client_email']; ?>" name="quot_client_email" type="email" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client PIC:</label>
                                    <input class="form-control" value="<?= $rows['quot_client_pic']; ?>" name="quot_client_pic" type="text" placeholder="" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Submission deadline:</label>
                                    <input type="date" name="quot_sub_deadline" value="<?= $rows['quot_sub_deadline'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Type:</label>
                                    <select class="form-select" name="quot_type" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="QUOTATION" <?= $rows['quot_type'] == 'QUOTATION' ? ' selected="selected"' : ''; ?>>QUOTATION</option>
                                        <option value="TENDER" <?= $rows['quot_type'] == 'TENDER' ? ' selected="selected"' : ''; ?>>TENDER</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary" name="quotation_update">Update</button>
                                <a href="quotation_view.php?id=<?= $id ?>" class="btn btn-danger">
                                    Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>