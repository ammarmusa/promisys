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
                    <form action="quotation_add_process.php" method="post" class="">

                        <?php
                        if (isset($_POST['submit'])) {
                            $project_app_date = $_POST['quot_app_date'];
                            $project_location = $_POST['project_location'];
                            $year = date("y", strtotime($project_app_date));
                            // echo $project_app_date;
                            $word = '';
                            if ($project_location == 'Johor') {
                                $word = 'J';
                            } elseif ($project_location == 'Perak') {
                                $word = 'A';
                            } elseif ($project_location == 'Selangor') {
                                $word = 'B';
                            } elseif ($project_location == 'Pahang') {
                                $word = 'C';
                            } elseif ($project_location == 'Kelantan') {
                                $word = 'D';
                            } elseif ($project_location == 'Kedah') {
                                $word = 'K';
                            } elseif ($project_location == 'Melaka') {
                                $word = 'M';
                            } elseif ($project_location == 'Negeri Sembilan') {
                                $word = 'N';
                            } elseif ($project_location == 'Pulau Pinang') {
                                $word = 'P';
                            } elseif ($project_location == 'Perlis') {
                                $word = 'R';
                            } elseif ($project_location == 'Terengganu') {
                                $word = 'T';
                            } elseif ($project_location == 'Kuala Lumpur') {
                                $word = 'V';
                            } elseif ($project_location == 'Sarawak') {
                                $word = 'Q';
                            } elseif ($project_location == 'Sabah') {
                                $word = 'S';
                            } else {
                                header('location: quotation.php?=State+Not+Exist');
                            }


                            $query = 'select * from quotation order by quot_no_inc desc';
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) == 0) {
                                echo '';
                            } else {
                                $row = mysqli_fetch_array($result);
                                $lastid = $row['quot_no'];
                                // echo $lastid;
                            }
                            if (empty($lastid)) {
                                $number = "SGS(" . $word . ")." . $year . "Q001";
                                $id = '001';
                            } else {
                                $idd = str_replace("SGS(" . $word . ").21Q", "", $lastid);
                                $idd = substr($lastid, 10);
                                // echo $idd;
                                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                                $number = "SGS(" . $word . ")." . $year . "Q" . $id;
                            }
                        }

                        ?>

                        <input type="hidden" name="quot_no_inc" value="<?= $id; ?>">
                        <input type="hidden" name="quot_app_date" value="<?= $project_app_date; ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date" class="col-form-label ">Project Reference</label>
                                <input class="form-control" type="text" name="quot_no" placeholder="" value="<?= $number; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="date" class="mt-3 col-form-label">Project Title: </label>
                            <input class="form-control" name="quot_title" type="text" placeholder="" required>
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
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Project duration:</label>
                                <input class="form-control" name="quot_proj_duration" type="text" placeholder="" required>
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
                                <select class="form-select" name="quot_client_type" aria-label="Default select example" required>
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
                                <select class="form-select" name="quot_client_status" aria-label="Default select example" required>
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

                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
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