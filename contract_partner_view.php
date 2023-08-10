<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['ids'];
?>
    <?php if ($_SESSION['role'] == 'admin' && $_SESSION['special'] == 'true') { ?>
        <div class="row mt-3">
            <?php
            $retrieve_staff = mysqli_query($conn, "SELECT * FROM contract_partner WHERE cp_id='$id'");
            while ($rows = mysqli_fetch_assoc($retrieve_staff)) {
                $project = $rows['cp_proj_no'];
                $date_1 = date("d/m/Y", strtotime($rows['cp_start']));
                $date_2 = date("d/m/Y", strtotime($rows['cp_end']));
                $amount = number_format($rows['cp_fee'], 2);
            ?>
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Contract Partner
                            <?php
                            $sql_2 = "SELECT quot_no, quot_title, s_proj_no, s_proj_code, s_quot_no
                            FROM quotation
                            INNER JOIN securement
                            ON quotation.quot_no = securement.s_quot_no";
                            $res_2 = mysqli_query($conn, $sql_2);
                            while ($rows_2 = mysqli_fetch_assoc($res_2)){
                                $title = $rows_2['quot_title'];
                                $code = $rows_2['s_proj_code'];
                            }
                            ?>
                            <button class="btn btn-sm btn-dark float-end" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateCp">
                                Update</button>

                            <a href="javascript:history.go(-1)" class="btn btn-sm btn-warning float-end" style="margin-right: 10px">
                                <i class="bi bi-arrow-left-square"></i></a>

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="updateCp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="contract_partner_process.php" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Project reference *</label>
                                    <select class="form-select" disabled name="cp_proj_no" aria-label="Default select example" id="select_box" required>
                                            <option value="<?= $project ?>"> <?= $project ?></option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <label class="col-form-label">Our reference</label>
                                    <input type="text" name="cp_ref_no" value="<?= $rows['cp_ref_no'] ?>" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Contract partner *</label>
                                    <input type="text" name="cp_name" value="<?= $rows['cp_name'] ?>" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="date" class="col-form-label">Start work *</label>
                                    <input type="date" name="cp_start" value="<?= $rows['cp_start'] ?>" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="date" class="col-form-label">Finish work *</label>
                                    <input type="date" name="cp_end" value="<?= $rows['cp_end'] ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Contract fee (RM)*</label>
                                    <input type="text" name="cp_fee" value="<?= $rows['cp_fee'] ?>" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Terms & Mode of Payment *</label>
                                    <textarea name="cp_term" class="form-control" cols="30" rows="5" required><?= $rows['cp_term'] ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label class="col-form-label">Miscellaneous</label>
                                <div class="col-md-4">
                                    <input type="text" name="cp_lad" class="form-control" value="<?= $rows['cp_lad'] ?>" placeholder="LAD">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="cp_vas" class="form-control" value="<?= $rows['cp_vas'] ?>" placeholder="VAS">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="cp_others" class="form-control" value="<?= $rows['cp_others'] ?>" placeholder="Others">
                                </div>
                            </div>
                       
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_contract_partner" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Your Ref No :</h6> <?= $project ?>
                                </div>
                                <div class="col-md-4">
                                    <h6>Our Ref No :</h6> <?= $rows['cp_ref_no'] ?>
                                </div>
                                <div class="col-md-4">
                                    <h6>Contract Partner :</h6> <?= $rows['cp_name'] ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h6>Duration :</h6> <?= $date_1 ?> ~ <?= $date_2 ?>
                                </div>
                                <div class="col-md-6">
                                    <h6>Fee :</h6> RM <?= $amount ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                <h6>Term & Mode of Payment :</h6>
                                    <p><?= $rows['cp_term'] ?></p>
                                </div>                                   
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6>Miscellaneous :</h6>
                                    LAD : <?= $rows['cp_lad'] ?><br>
                                    VAS : <?= $rows['cp_vas'] ?><br>
                                    Others : <?= $rows['cp_others'] ?><br>
                                </div>
                            </div>
                        <?php
                    }
                        ?>
                        </div>
                    </div>
                </div>
        </div>
        <script src="datatable.js"></script>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>