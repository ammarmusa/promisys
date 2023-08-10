<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['id'] ?? null;
?>

    <div class="row mt-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Securement update
                </div>
                <div class="card-body">
                    <form action="project_add_process.php" method="post">

                        <?php
                        $retrieve_data = mysqli_query($conn, "SELECT * FROM securement WHERE s_id='$id'");
                        while ($rows = mysqli_fetch_assoc($retrieve_data)) {
                            if ($rows['s_proj_code'] == '') {
                                $mode = 'save';
                            } else {
                                $mode = 'update';
                            }
                            $quot_no = $rows['s_quot_no'];
                            $quot = mysqli_query($conn, "SELECT * FROM quotation WHERE quot_no = '$quot_no'");
                            while ($q = mysqli_fetch_assoc($quot)) {
                                $title = $q['quot_title'];
                                $market = $q['quot_market_segmentation'];
                                $site = $q['quot_site_location'];
                                $scope = $q['quot_work_scope'];
                                $client_type = $q['quot_client_type'];
                                $client_status = $q['quot_client_status'];
                                $client_comp = $q['quot_client'];
                                $client_pic = $q['quot_client_pic'];
                                $client_phone = $q['quot_client_phone'];
                                $client_email = $q['quot_client_email'];
                                $duration = $q['quot_proj_duration'];
                                $amount = $q['quot_amount'];
                                $amount_tax = $q['quot_amount_tax'];
                            }
                        ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <label for="date" class="col-form-label ">Project Reference</label>
                                    <input class="form-control" type="text" name="quot_proj_no" value="<?= $rows['s_proj_no'] ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label ">Quotation Reference</label>
                                    <input class="form-control" type="text" name="quot_no" value="<?= $rows['s_quot_no']; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="date" class="mt-3 col-form-label">Project Title: </label>
                                <input class="form-control" name="quot_proj_title" value="<?= $title ?>" type="text" required>
                            </div>
                            <div class="col-md-12">
                                <label for="date" class="mt-3 col-form-label">Project Code Name:</label>
                                <input class="form-control" name="s_proj_code" type="text" value="<?= $rows['s_proj_code']; ?>" required>
                            </div>
                            <!-- Temp -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Person Incharge:</label>
                                    <select class="form-select" name="s_proj_pic" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <?php
                                        // Update mode get data from db : save mode input by user.
                                        if ($mode == 'save') {
                                            $user = mysqli_query($conn, "SELECT shortform FROM users");
                                            while ($sf = mysqli_fetch_assoc($user)) {
                                        ?>
                                                <option value="<?= $sf['shortform'] ?>" <?= $sf['shortform'] == $_SESSION['shortform'] ? 'selected="selected"' : '' ?>><?= $sf['shortform'] ?></option>
                                            <?php
                                            }
                                        } else {
                                            $user = mysqli_query($conn, "SELECT shortform FROM users");
                                            while ($sf = mysqli_fetch_assoc($user)) {
                                            ?>
                                                <option value="<?= $sf['shortform'] ?>" <?= $sf['shortform'] == $rows['s_proj_pic'] ? 'selected="selected"' : '' ?>><?= $sf['shortform'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Market segmentation:</label>
                                    <select class="form-select" name="quot_market_segmentation" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="OIL & GAS" <?= $market == 'OIL & GAS' ? ' selected="selected"' : ''; ?>>OIL & GAS</option>
                                        <option value="PROPERTY & INFRASTRUCTURE" <?= $market == 'PROPERTY & INFRASTRUCTURE' ? ' selected="selected"' : ''; ?>>PROPERTY & INFRASTRUCTURE</option>
                                        <option value="UTILITY" <?= $market == 'UTILITY' ? ' selected="selected"' : ''; ?>>UTILITY</option>
                                        <option value="AVIATION" <?= $market == 'AVIATION' ? ' selected="selected"' : ''; ?>>AVIATION</option>
                                        <option value="POWER" <?= $market == 'POWER' ? ' selected="selected"' : ''; ?>>POWER</option>
                                        <option value="PLANTATION" <?= $market == 'PLANTATION' ? ' selected="selected"' : ''; ?>>PLANTATION</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Site location:</label>
                                    <input class="form-control" value="<?= $site ?>" name="quot_site_location" type="text" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Work scope:</label>
                                    <select class="form-select" name="quot_work_scope" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="ENG" <?= $scope == 'ENG' ? ' selected="selected"' : ''; ?>>ENG</option>
                                        <option value="UUM" <?= $scope == 'UUM' ? ' selected="selected"' : ''; ?>>UUM</option>
                                        <option value="TITLE" <?= $scope == 'TITLE' ? ' selected="selected"' : ''; ?>>TITLE</option>
                                        <option value="GIS" <?= $scope == 'GIS' ? ' selected="selected"' : ''; ?>>GIS</option>
                                        <option value="HYDRO" <?= $scope == 'HYDRO' ? ' selected="selected"' : ''; ?>>HYDRO</option>
                                        <option value="STRATA" <?= $scope == 'STRATA' ? ' selected="selected"' : ''; ?>>STRATA</option>
                                    </select>
                                </div>
                            </div>
                            <?php
                            $text = $duration;
                            $newText = (explode(" ", $text));
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="date" class="col-form-label mt-3">Project duration:</label>
                                    <input class="form-control" name="quot_proj_duration" value="<?= $newText[0] ?>" type="number" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="col-form-label mt-3">-</label>
                                    <select name="days" id="" class="form-select">
                                        <option value="Day" <?= $newText[1] == 'Day' ? ' selected="selected"' : ''; ?>>Day</option>
                                        <option value="Month" <?= $newText[1] == 'Month' ? ' selected="selected"' : ''; ?>>Month</option>
                                        <option value="Year" <?= $newText[1] == 'Year' ? ' selected="selected"' : ''; ?>>Year</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-5 col-form-label mt-3">Amount (RM)</label>
                                    <input class="form-control" name="quot_amount" value="<?= $amount ?>" type="text" pattern="^\d+(?:\.\d{1,2})?$" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-6">
                                    <div class="form-check form-switch">
                                        <?php
                                        if ($amount != $amount_tax) {
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
                                    <select class="form-select" name="project_client" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <?php
                                        $client_result = mysqli_query($conn, "SELECT * FROM clients");
                                        while ($client = mysqli_fetch_assoc($client_result)) {
                                            $client_id = $client['client_id'];
                                            $client_name = $client['client_comp_name'];
                                        ?>
                                            <option value="<?= $client_id ?>" <?= $client_name == $client_comp ? 'selected="selected"' : '' ?>><?= $client_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client type:</label>
                                    <select class="form-select" name="quot_client_type" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="Private" <?= $client_type == 'Private' ? ' selected="selected"' : ''; ?>>Private</option>
                                        <option value="GLC" <?= $client_type == 'GLC' ? ' selected="selected"' : ''; ?>>GLC</option>
                                        <option value="Gov" <?= $client_type == 'Gov' ? ' selected="selected"' : ''; ?>>Gov</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client status:</label>
                                    <select class="form-select" name="quot_client_status" aria-label="Default select example" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="Existing" <?= $client_status == 'Existing' ? ' selected="selected"' : ''; ?>>Existing</option>
                                        <option value="New" <?= $client_status == 'New' ? ' selected="selected"' : ''; ?>>New</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client phone:</label>
                                    <input class="form-control" value="<?= $client_phone ?>" name="quot_client_phone" type="text" placeholder="" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client email:</label>
                                    <input class="form-control" value="<?= $client_email ?>" name="quot_client_email" type="email" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Client PIC:</label>
                                    <input class="form-control" value="<?= $client_pic ?>" name="quot_client_pic" type="text" placeholder="" required>
                                </div>
                            </div>
                            <!-- End Temp -->

                            <div class="mt-5">
                                <?php
                                if ($mode == 'save') {
                                ?>
                                    <button type="submit" name="save_securement" class="btn btn-primary">Save</button>
                                <?php
                                } else {
                                ?>
                                    <button type="submit" name="update_securement" class="btn btn-primary">Update</button>
                                <?php
                                }
                                ?>

                                <a href="securement.php" class="btn btn-danger">
                                    << Back</a>
                            </div>
                        <?php
                        }
                        ?>


                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include "include_footer.php";
} else {
    header("Location: index.php");
} ?>