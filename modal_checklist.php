<div class="modal fade" id="viewChecklist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $check_cl = mysqli_query($conn, "SELECT s_checklist FROM securement WHERE s_proj_no ='$project' AND s_checklist != ''");
                if (mysqli_num_rows($check_cl) == 0) {
                ?>
                    <div class="row">
                        <div class="mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <span><i class="bi bi-table me-2"></i></span> Add Checkbox
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" name="body" id="body" class="form-control">
                                            <span id="error" style="display: none; color:red"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary" id="add_data">Add data</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <form action="checklist_process.php" method="post">
                                            <div class="data_table">
                                                <input type="hidden" name="project" value="<?= $project ?>">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <table id="myTable_4" class="table table-striped table-bordered" class="display" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                                            <th>No.</th>
                                                            <th>Description</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $sql = "SELECT * FROM checklist";
                                                    $res = mysqli_query($conn, $sql); ?>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        while ($rows = mysqli_fetch_assoc($res)) {
                                                        ?>
                                                            <tr>
                                                                <td><input class="form-check-input" type="checkbox" value="<?= $rows['checklist_id']; ?>" id="<?= $rows['checklist_id']; ?>" name="checkbox[]"></td>
                                                                <td><?= $i; ?></td>
                                                                <td><?= $rows['checklist_body'] ?></td>
                                                                <td>
                                                                    <div class="d-flex justify-content-center">
                                                                        <!-- <a href="" title="Delete" style="color:red"><i class="bi bi-trash"></i></a> -->
                                                                        <input type="hidden" name="checklist_id" class="checklist_id" value="<?= $rows['checklist_id'] ?>">
                                                                        <a href="" class="delete_checklist"><i class="bi bi-trash" style="color:red"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php $i++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                                <button type="submit" name="add_checklist" class="btn btn-primary mt-3">Add Checklist to Project</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="row">
                        <div class="mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <span><i class="bi bi-table me-2"></i></span> Checklist
                                </div>
                                <div class="card-body">
                                    <form action="checklist_process.php" method="post">
                                        <?php
                                        $get = mysqli_query($conn, "SELECT s_checklist FROM securement WHERE s_proj_no = '$project'");
                                        while ($cl = mysqli_fetch_assoc($get)) {
                                            $checklist = $cl['s_checklist'];
                                        }
                                        $exp = explode(",", $checklist);
                                        foreach ($exp as $value) {
                                            $new = explode("=", $value);
                                            // echo "$new[0] $new[1] <input type='checkbox'/> <br>";
                                            if ($new[1] == 0) {
                                                $checked = '';
                                            } else {
                                                $checked = 'checked';
                                            }
                                            $sql = "SELECT checklist_body FROM checklist WHERE checklist_id = '$new[0]'";
                                            $result = mysqli_query($conn, $sql);
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $body = $rows['checklist_body'];
                                                // echo $body;
                                        ?>
                                                <ul class="list-group mb-2">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <?= $body ?>
                                                        <input type="hidden" name="project" value="<?= $project ?>">
                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                        <span><input type="checkbox" <?= $checked ?> name="isCheck[]" id="" value="<?= $new[0] ?>"></span>
                                                        <input type="hidden" name="check_id[]" value="<?= $new[0] ?>" id="">
                                                        <!-- <input type="hidden" name="check_value[]" value="<?= $new[1] ?>" id=""> -->
                                                    </li>
                                                </ul>
                                        <?php
                                            }
                                            // echo $body;
                                        }
                                        ?>

                                        <button class="btn btn-primary mt-2" type="submit" name="update_checklist">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>