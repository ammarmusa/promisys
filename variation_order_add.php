<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>

    <div class="row">
        <div class="mb-3 mt-3">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Add Variation Order
                </div>
                <div class="card-body">
                    <form action="quotation_process.php" method="post" class="" enctype='multipart/form-data'>
                        <input type="hidden" name="quot_type" value="VARIATION ORDER">
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

                                    <?php
                                    $data = 'json_market_segmentation.json';
                                    $json = json_decode(file_get_contents($data), true);
                                    foreach ($json as $foo) {
                                    ?>
                                        <option value="<?= $foo['value'] ?>"><?= $foo['name'] ?></option>
                                    <?php
                                    }
                                    ?>

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
                                    <?php
                                    $data2 = 'json_work_scope.json';
                                    $json2 = json_decode(file_get_contents($data2), true);
                                    foreach ($json2 as $foo2) {
                                    ?>
                                        <option value="<?= $foo2['value'] ?>"><?= $foo2['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="date" class="col-form-label mt-3">Project duration:</label>
                                <input class="form-control" step="1.00" name="quot_proj_duration" type="number" placeholder="" required>
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

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="new_client" id="new_client" onclick="validate()">
                            <label class="form-check-label" for="new_client">Add New Client</label>
                        </div>

                        <div id="add_new_client" style="display: none;">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Company Name</label>
                                    <input class="form-control" name="client_comp_name" type="text">
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Address</label>
                                    <input class="form-control" name="client_address" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Person Incharge</label>
                                    <input class="form-control" name="client_pic" type="text">
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Contact Number</label>
                                    <input class="form-control" name="client_phone" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Fax</label>
                                    <input class="form-control" name="client_fax" type="text">
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label mt-3">Email</label>
                                    <input class="form-control" name="client_email" type="email">
                                </div>
                            </div>
                            <hr>
                        </div>


                        <div class="row">
                            <div class="col-md-6" id="client_list">
                                <label for="date" class="col-form-label mt-3">Client:</label>
                                <select class="form-select" id="quot_client" name="quot_client" aria-label="Default select example">
                                    <option selected value="">Open this select menu</option>
                                    <!-- <?php
                                            $client_result = mysqli_query($conn, "SELECT * FROM clients");
                                            while ($client = mysqli_fetch_assoc($client_result)) {
                                                $client_id = $client['client_id'];
                                                $client_name = $client['client_comp_name'];
                                            ?>
                                        <option value="<?= $client_id ?>"><?= $client_name ?></option>
                                    <?php
                                            }
                                    ?> -->

                                    <?php
                                    $query = "SELECT client_id, client_comp_name FROM clients ORDER BY client_comp_name ASC";
                                    $client_result = $conn->query($query);
                                    foreach ($client_result as $client) {
                                    ?>
                                        <option value="<?= $client["client_id"] ?>"> <?= $client["client_comp_name"] ?></option>
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
                            <div class="col-md-6">
                                <label for="date" class="col-form-label mt-3">Submission deadline:</label>
                                <input type="date" name="quot_sub_deadline" class="form-control">
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
                            <button type="submit" class="btn btn-primary" name="add_quotation" id="submit">Submit</button>
                            <a href="quotation.php" class="btn btn-danger">
                                Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var select_box_element = document.querySelector('#quot_client');

        dselect(select_box_element, {
            search: true
        });

        function validate() {
            if (document.getElementById('new_client').checked) {
                var from = jQuery('select[name=quot_client]');
                from.attr('disabled', 'disabled');
                document.getElementById("add_new_client").style.display = "block"
                document.getElementById("client_list").style.display = "none"
            } else {
                var from = jQuery('select[name=quot_client]');
                from.removeAttr("disabled");
                document.getElementById("add_new_client").style.display = "none"
                document.getElementById("client_list").style.display = "block"
            }
        }
    </script>


<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>