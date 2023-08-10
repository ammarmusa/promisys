<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['id'];
    $ids = $_GET['ids'];
?>
    <?php
    $data = "SELECT * FROM project_schedule WHERE ps_id = '$ids'";
    $result = mysqli_query($conn, $data);
    while ($rows = mysqli_fetch_assoc($result)) {
    ?>

        <div class="row">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Edit Schedule
                        <a href="javascript:history.go(-1)" title="Back" class="btn btn-sm btn-warning float-end" title="Back">
                            <i class="bi bi-arrow-left-square"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="project_schedule_process.php" method="post" class="">
                            <input type="hidden" name="project" value="<?= $project ?>">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="ids" value="<?= $ids ?>">
                            <div class="col-md mb-2">
                                <label for="recipient-name" class="col-form-label">Work type:</label>
                                <select class="form-select" name="ps_type" aria-label="Default select example" disabled>
                                    <option selected value="">Select</option>
                                    <option value="On-Site" <?= $rows['ps_type'] == 'On-Site' ? ' selected="selected"' : ''; ?>>On-Site</option>
                                    <option value="Technical" <?= $rows['ps_type'] == 'Technical' ? ' selected="selected"' : ''; ?>>Technical</option>
                                    <option value="Process" <?= $rows['ps_type'] == 'Process' ? ' selected="selected"' : ''; ?>>Process</option>
                                </select>
                            </div>
                            <input type="hidden" name="ps_proj_no" value="<?= $project ?>">
                            <div class="col-md mb-2">
                                <label for="recipient-name" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="ps_title" value="<?= $rows['ps_title'] ?>" type="text" required><?= $rows['ps_title'] ?></textarea>
                            </div>

                            <div class="col-md mb-2">
                                <label for="recipient-name" class="col-form-label">PIC:</label>
                                <select class="form-select" name="ps_pic" aria-label="Default select example" id="select_box" required>
                                    <option selected value="">Open this select menu</option>
                                    <option value="">Select Staff</option>
                                    <?php
                                    $query = "
                             SELECT staff_initial, staff_name FROM staff
                             ORDER BY staff_name ASC
                         ";

                                    $result = $conn->query($query);
                                    foreach ($result as $row) { ?>
                                        <option value="<?= $row["staff_initial"] ?>" <?= $row['staff_initial'] == $rows['ps_pic'] ? 'selected="selected"' : '' ?>><?= $row["staff_initial"] ?>-<?= $row["staff_name"] ?></option>;
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label">Start work:</label>
                                    <input type="date" name="ps_start" class="form-control" value="<?= $rows['ps_start'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label">Finish work:</label>
                                    <input type="date" name="ps_end" class="form-control" value="<?= $rows['ps_end'] ?>" required>
                                </div>
                            </div>

                            <?php
                            if ($rows['ps_remark'] == '') {
                            ?>
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <button type="sybmit" class="btn btn-primary" name="update_data">Update data</button>
                            <?php
                            } else {
                            ?>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="date" class="col-form-label">Actual start work:</label>
                                        <input type="date" name="ps_start_act" class="form-control" value="<?= $rows['ps_start_act'] ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date" class="col-form-label">Actual finish work:</label>
                                        <input type="date" name="ps_end_act" class="form-control" value="<?= $rows['ps_end_act'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md mb-4">
                                    <label for="recipient-name" class="col-form-label">Remark:</label>
                                    <textarea class="form-control" name="ps_remark" value="<?= $rows['ps_remark'] ?>" type="text" required><?= $rows['ps_remark'] ?></textarea>
                                </div>
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <button type="sybmit" class="btn btn-primary" name="update_data_act">Update data</button>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <script>
        var select_box_element = document.querySelector('#select_box');

        dselect(select_box_element, {
            search: true
        });
    </script>

<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>