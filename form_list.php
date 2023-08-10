<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $branch = $_SESSION['branch'];
    // print_r($_SESSION);
?>
    <?php if ($_SESSION['role'] == 'admin') { ?>
        <!-- For Admin -->
        <div class="row mt-3">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Form list
                        
                            <?php
                            if($_SESSION['special']  == "true"){
                            ?>
                               <button class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#uploadForm">
                            + Upload</button>
                            <?php
                            } else {
                            ?>
                                
                            <?php
                            }
                            ?>

                        <!-- Modal -->
                        <div class="modal fade" id="uploadForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="document_process.php" method="post" enctype='multipart/form-data'>
                                <div class="modal-body">
                                    <input type="text" name="doc_version" required class="form-control" placeholder="Version">
                                    <label for="date" class="col-form-label mt-3">Supporting files:</label>
                                    <input name="upload[]" type="file" multiple="multiple" required class="form-control" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="upload_form" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="data_table">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Form name</th>
                                            <th>Version</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT * FROM documents WHERE doc_remark = 'Form list'";
                                    $res = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($res) > 0) { ?>
                                        <tbody>
                                            <?php

                                            $i = 1;
                                            while ($rows = mysqli_fetch_assoc($res)) {
                                                // $date = date("d/m/Y", strtotime($rows['s_award_date']));
                                                // $project_no = $rows['s_proj_no'];
                                                // $quot_no = $rows['s_quot_no'];

                                                // $quot_client = $rows['quot_client'];
                                                // $quot_title = $rows['quot_title'];
                                                // $total = $rows['quot_amount'];

                                            ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $rows['doc_name'] ?></td>
                                                    <td><?= $rows['doc_version'] ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-center find_form_id">
                                                            <?php
                                                            if($_SESSION['special']  == "true"){
                                                            ?>
                                                                <input type="hidden" class="form_id" value="<?= $rows['doc_id'] ?>">
                                                                <a href="<?= $rows['doc_path']; ?>"><span class='badge bg-dark'><i class="bi bi-eye"></i></span></a>
                                                                <a class="delete_form" title="Delete" style="margin-left: 10px">
                                                                    <span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="<?= $rows['doc_path']; ?>"><span class='badge bg-dark'><i class="bi bi-eye"></i></span></a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                            } ?>

                                        </tbody>
                                </table>
                            <?php } ?>
                            </div>
                        </div> <!--data_table-->
                    </div>

                </div>
            </div>
        </div>

        <script>
            $('.delete_form').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var form_id = $(this).closest(".find_form_id").find('.form_id').val();
                console.log(form_id)

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "document_process.php",
                            data: {
                                "delete_form": 1,
                                "form_id": form_id,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    '',
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                })
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Failed to delete',
                                    '',
                                    'warning'
                                ).then((result) => {
                                    location.reload();
                                })
                            }
                        })
                    }
                })
            })
        </script>

    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>