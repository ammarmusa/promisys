<div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="project_schedule_process.php" method="post">
                    <div class="col-md mb-2">
                        <label for="recipient-name" class="col-form-label">Work type:</label>
                        <select class="form-select" name="ps_type" aria-label="Default select example" required>
                            <option selected value="">Select</option>
                            <option value="On-Site">On-Site</option>
                            <option value="Technical">Technical</option>
                            <option value="Process">Process</option>
                        </select>
                    </div>
                    <input type="hidden" name="proj_no" value="<?= $project ?>">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="col-md mb-2">
                        <label for="recipient-name" class="col-form-label">Description:</label>
                        <textarea class="form-control" name="ps_title" type="text" required></textarea>
                    </div>

                    <div class="col-md mb-2">
                        <label for="recipient-name" class="col-form-label">PIC:</label>
                        <select class="form-select" name="ps_pic" aria-label="Default select example" id="select_box" required>
                            <option value="">Select Staff</option>
                            <?php
                            $query = "
                             SELECT staff_type, staff_initial, staff_name FROM staff
                             ORDER BY staff_name ASC
                         ";

                            $result = $conn->query($query);
                            foreach ($result as $row) {
                                if ($row['staff_type'] == "Staff") {
                                    $type = 'Staff';
                                } else if ($row['staff_type'] == "Intern") {
                                    $type = 'Intern';
                                } else if ($row['staff_type'] == "Contract") {
                                    $type = 'Contract';
                                }
                                // echo '<option value="' . $row["staff_initial"] . '">' . $row["staff_initial"] . '-' . $row["staff_name"] . '</option>';
                            ?>
                                <option value="<?= $row["staff_initial"] ?>">(<?= $type ?>) <?= $row["staff_initial"] ?> - <?= $row["staff_name"] ?></option>
                            <?php
                            }
                            ?>
                             <?php
                                $get_cp = mysqli_query($conn, "SELECT cp_proj_no, cp_name FROM contract_partner WHERE cp_proj_no = '$project'");
                                while($gcp = mysqli_fetch_assoc($get_cp)){
                                ?>
                                <option value="<?= $gcp['cp_name'] ?>">(C.Partner) <?= $gcp['cp_name'] ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="date" class="col-form-label">Start work:</label>
                            <input type="date" name="ps_start" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="col-form-label">Finish work:</label>
                            <input type="date" name="ps_end" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="sybmit" class="btn btn-primary" name="add_data">Add data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>