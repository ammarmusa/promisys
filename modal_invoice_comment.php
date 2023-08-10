<div class="modal fade" id="invoiceComment<?= $rows_2['pd_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Invoice: <?= $pd_invoice_no ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <form action="action_process.php" method="post">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="ids" value="<?= $ids ?>">
                            <input type="hidden" name="pd_invoice_no" value="<?= $pd_invoice_no ?>">
                            <input type="hidden" name="proj_no" value="<?= $proj_no ?>">
                            <input type="text" class="form-control" name="comment" id="" required placeholder="Add status">
                            <button type="submit" name="add_comm_invoice" class="btn btn-success">Add Status</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body" style="font-size:90%">
                                <div class="data_table">
                                    <table id="myTable_2" class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>User</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $action = "SELECT * FROM action WHERE action_proj_no = '$proj_no' AND action_for = '$pd_invoice_no'";
                                        $act_res = mysqli_query($conn, $action);
                                        ?>
                                        <tbody>
                                            <?php
                                            $a = 1;
                                            while ($ar = mysqli_fetch_assoc($act_res)) {
                                                $comment_date = date("d/m/Y", strtotime($ar['action_date']));
                                            ?>
                                                <tr>
                                                    <td><?= $a ?></td>
                                                    <td><?= $comment_date ?></td>
                                                    <td><?= $ar['action_body'] ?></td>
                                                    <td><?= $ar['action_by'] ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-center find_id">
                                                            <input type="hidden" class="action_id" value="<?= $ar['action_id'] ?>">
                                                            <!-- <a href="client_update.php?id=<?= $ar['action_id']; ?>" class="" title="Edit" style="margin-right: 10px">
                                                                <span class="badge bg-primary"><i class="bi bi-pencil-square"></i></span></a> -->
                                                            <a class="delete_action" title="Delete" style="margin-right: 10px">
                                                                <span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $a++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Add Client</button>
            </div> -->
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Add Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span><i class="bi bi-pen me-2"></i></span> Fill in client's information
                            </div>
                            <div class="card-body">
                                <input type="text" value="<?= $ar['action_body'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#client" data-bs-toggle="modal" data-bs-dismiss="modal">Client List</button>
            </div>
        </div>
    </div>
</div> -->
<!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a> -->