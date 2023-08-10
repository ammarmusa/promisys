<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
?>

    <div class="row">
        <div class="mb-3">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Add Quotation
                </div>
                <div class="card-body">
                    <form action="quotation_process.php" method="post" class="" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="date" class="col-form-label ">Apply Date</label>
                                <input type="date" name="apply_date" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="date" class="col-form-label ">Project Location</label>
                                <select class="form-select" name="project_location" aria-label="Default select example" required>
                                    <option selected value="">Open this select menu</option>
                                    <option value="Johor">Johor</option>
                                    <option value="Melaka">Melaka</option>
                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                    <option value="Pahang">Pahang</option>
                                    <option value="Terengganu">Terengganu</option>
                                    <option value="Kelantan">Kelantan</option>
                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                    <option value="Kedah">Kedah</option>
                                    <option value="Pulau Pinang">Pulau Pinang</option>
                                    <option value="Perlis">Perlis</option>
                                    <option value="Selangor">Selangor</option>
                                    <option value="Perak">Perak</option>
                                    <option value="Sabah">Sabah</option>
                                    <option value="Sarawak">Sarawak</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="date" class="col-form-label ">Branch</label>
                                <select class="form-select" name="quot_branch" aria-label="Default select example" required>
                                    <option selected value="">Open this select menu</option>
                                    <option value="HQ" <?= $_SESSION['branch'] == "HQ" ? 'selected="selected"' : '' ?>>HQ</option>
                                    <option value="Pahang" <?= $_SESSION['branch'] == "Pahang" ? 'selected="selected"' : '' ?>>Pahang</option>
                                    <option value="Johor" <?= $_SESSION['branch'] == "Johor" ? 'selected="selected"' : '' ?>>Johor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="date" class="mt-3 col-form-label">Project Title: </label>
                            <textarea class="form-control" name="quot_title" type="text" placeholder="" required></textarea>
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
                                        <option value="<?= $sf['shortform'] ?>" <?= $sf['shortform'] == $_SESSION['shortform'] ? 'selected="selected"' : '' ?>><?= $sf['shortform'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Market segmentation:</label>
                                <select class="form-select" name="quot_market_segmentation" aria-label="Default select example" required>
                                    <option selected value="">Open this select menu</option>
                                    <option value="OIL & GAS">OIL & GAS</option>
                                    <option value="PROPERTY & INFRASTRUCTURE">PROPERTY & INFRASTRUCTURE</option>
                                    <option value="UTILITY">UTILITY</option>
                                    <option value="AVIATION">AVIATION</option>
                                    <option value="POWER">POWER</option>
                                    <option value="PLANTATION">PLANTATION</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Site location:</label>
                                <input class="form-control" name="quot_site_location" type="text" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Work scope:</label>
                                <select class="form-select" name="quot_work_scope" aria-label="Default select example" required>
                                    <option selected value="">Open this select menu</option>
                                    <option value="ENG">ENG</option>
                                    <option value="UUM">UUM</option>
                                    <option value="TITLE">TITLE</option>
                                    <option value="GIS">GIS</option>
                                    <option value="HYDRO">HYDRO</option>
                                    <option value="STRATA">STRATA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="date" class="col-form-label mt-3">Project duration:</label>
                                <input class="form-control" step=".01" name="quot_proj_duration" type="number" placeholder="" required>
                            </div>
                            <div class="col-md-2">
                                <label for="" class="col-form-label mt-3">-</label>
                                <select name="days" id="" class="form-select">
                                    <option value="Day">Day</option>
                                    <option value="Week">Week</option>
                                    <option value="Month">Month</option>
                                    <option value="Year">Year</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="col-5 col-form-label mt-3">Amount (RM)</label>
                                <input class="form-control" name="quot_amount" type="text" placeholder="" pattern="^\d+(?:\.\d{1,2})?$" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="tax" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Include 6% SST</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Client:</label>
                                <select class="form-select" name="quot_client" aria-label="Default select example" required>
                                    <option selected value="">Open this select menu</option>
                                    <option value="TBA">TBA</option>
                                    <?php
                                    $client_result = mysqli_query($conn, "SELECT * FROM clients");
                                    while ($client = mysqli_fetch_assoc($client_result)) {
                                        $client_id = $client['client_id'];
                                        $client_name = $client['client_comp_name'];
                                    ?>
                                        <option value="<?= $client_id ?>"><?= $client_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Client type:</label>
                                <select class="form-select" name="quot_client_type" aria-label="Default select example">
                                    <option selected value="">Open this select menu</option>
                                    <option value="Private">Private</option>
                                    <option value="GLC">GLC</option>
                                    <option value="Gov">Gov</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Client status:</label>
                                <select class="form-select" name="quot_client_status" aria-label="Default select example">
                                    <option selected value="">Open this select menu</option>
                                    <option value="Existing">Existing</option>
                                    <option value="New">New</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Submission deadline:</label>
                                <input type="date" name="quot_sub_deadline" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Type:</label>
                                <select class="form-select" name="quot_type" aria-label="Default select example" required>
                                    <option selected value="">Open this select menu</option>
                                    <option value="QUOTATION">QUOTATION</option>
                                    <option value="TENDER">TENDER</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Supporting files:</label>
                                <input name="upload[]" type="file" multiple="multiple" class="form-control" />
                            </div>
                        </div>

                        <div class="mt-5">
                            <!-- <button type="submit" class="btn btn-primary" name="add_quotation">Submit</button> -->
                            <button type="submit" class="btn btn-primary" name="add_quotation">Submit</button>
                            <a href="quotation.php" class="btn btn-danger">
                                Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>