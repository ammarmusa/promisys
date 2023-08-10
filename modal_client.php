<div class="modal fade" id="client" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Client List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body" style="font-size:90%">
                                <div class="data_table">
                                    <table id="myTable_2" class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>PIC</th>
                                                <th>Contact Number</th>
                                                <th>Fax</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql_2 = "SELECT * FROM clients";
                                        $res_2 = mysqli_query($conn, $sql_2);
                                        if (mysqli_num_rows($res_2) > 0) { ?>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($rows_2 = mysqli_fetch_assoc($res_2)) {

                                                ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $rows_2['client_comp_name'] ?></td>
                                                        <td><?= $rows_2['client_address'] ?></td>
                                                        <td><?= $rows_2['client_pic'] ?></td>
                                                        <td><?= $rows_2['client_phone'] ?></td>
                                                        <td><?= $rows_2['client_fax'] ?></td>
                                                        <td><?= $rows_2['client_email'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <input type="hidden" class="client_id" value="<?= $rows_2['client_id'] ?>">
                                                                <a href="client_update.php?id=<?= $rows_2['client_id']; ?>" class="" title="Edit" style="margin-right: 10px">
                                                                    <span class="badge bg-primary"><i class="bi bi-pencil-square"></i></span></a>
                                                                <a class="delete_client" title="Delete" style="margin-right: 10px">
                                                                    <span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>

                                            </tbody>
                                    </table>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Add Client</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Add Client</h5>
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
                                <form action="client_process.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="date" class="col-form-label mt-3">Company Name</label>
                                            <input class="form-control" name="client_comp_name" type="text" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date" class="col-form-label mt-3">Address</label>
                                            <input class="form-control" name="client_address" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="date" class="col-form-label mt-3">Person Incharge</label>
                                            <input class="form-control" name="client_pic" type="text" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date" class="col-form-label mt-3">Contact Number</label>
                                            <input class="form-control" name="client_phone" type="text" required>
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
                                    <div class="mt-5">
                                        <button type="submit" name="add_client" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
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
</div>
<!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a> -->