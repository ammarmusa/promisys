<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['id'] ?? null;
?>

    <div class="row mt-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Securement
                    <?php
                    // $retrieve_data = mysqli_query($conn, "SELECT * FROM securement WHERE s_id='$id'");
                    // while ($rows = mysqli_fetch_assoc($retrieve_data)) {
                    //     $project = $rows['project_no'];
                    //     $amount = number_format($rows['project_amount'], 2);
                    //     $amount_2 = number_format($rows['project_amount_tax'], 2);
                    $retrieve_data = mysqli_query($conn, "SELECT * FROM securement WHERE s_id='$id'");
                    while ($rows = mysqli_fetch_assoc($retrieve_data)) {
                        $quot_no = $rows['s_quot_no'];
                        $quot = mysqli_query($conn, "SELECT * FROM quotation WHERE quot_no = '$quot_no'");
                        while ($q = mysqli_fetch_assoc($quot)) {
                            $title = $q['quot_title'];
                            $market = $q['quot_market_segmentation'];
                            $site = $q['quot_site_location'];
                            $scope = $q['quot_work_scope'];
                            $client_type = $q['quot_client_type'];
                            $client_status = $q['quot_client_status'];
                            $client_comp = $q['quot_client'];
                            $client_pic = $q['quot_client_pic'];
                            $client_phone = $q['quot_client_phone'];
                            $client_email = $q['quot_client_email'];
                            $duration = $q['quot_proj_duration'];
                            $amount = number_format($q['quot_amount'], 2);
                            $amount_tax = number_format($q['quot_amount_tax'], 2);
                        }
                    ?>
                    <?php
                    $proj_no = $rows['s_proj_no'];
                    $check_data = mysqli_query($conn, "SELECT * FROM action WHERE action_proj_no = '$proj_no' AND action_for = 'project'");
                    if(mysqli_num_rows($check_data) == 0) {
                        $status_data = 'No data';
                    } else {
                        $status_data = 'Has data';
                    }

                    $check_proj_deliver = mysqli_query($conn, "SELECT pd_proj_no FROM project_deliver WHERE pd_proj_no = '$proj_no'");
                    if(mysqli_num_rows($check_proj_deliver) == 0) {
                        $status_pd = 'No data';
                    } else {
                        $status_pd = 'Has data';
                    }

                    $check_schedule = mysqli_query($conn, "SELECT ps_proj_no FROM project_schedule WHERE ps_proj_no = '$proj_no'");
                    if(mysqli_num_rows($check_schedule) == 0) {
                        $status_ps = 'No data';
                    } else {
                        $status_ps = 'Has data';
                    }

                    $check_doc = mysqli_query($conn, "SELECT doc_proj_no FROM documents WHERE doc_proj_no = '$proj_no'");
                    if(mysqli_num_rows($check_doc) == 0) {
                        $status_doc = 'No data';
                    } else {
                        $status_doc = 'Has data';
                    }
                    ?>

                    <?php
                    if($status_data === 'Has data' || $status_pd === 'Has data' || $status_ps === 'Has data' || $status_doc ==='Has data') {
                        ?>
                    <a href="" class="btn btn-sm btn-secondary float-end" title="Delete" style="margin-right: 10px">
                                                <i class="bi bi-trash"></i></a>
                        <?php
                    } else {
                        ?>
                    <input type="hidden" name="securement_no" id="securement_no" value="<?= $id ?>">
                                            <a href="" class="btn btn-sm btn-danger float-end delete_securement" title="Delete" style="margin-right: 10px">
                                                <i class="bi bi-trash"></i></a>
                        <?php
                    }
                    ?>
                        <a href="securement_update.php?id=<?= $id ?>" class="btn btn-sm btn-primary float-end" title="Edit" style="margin-right: 10px">
                            <i class="bi bi-pencil-square"></i></a>
                        <a href="javascript:history.go(-1)" title="Back" class="btn btn-sm btn-warning float-end" style="margin-right: 10px">
                            <i class="bi bi-arrow-left-square"></i></a>
                </div>
                <div class="card-body">
                    <h5><strong>PROJECT DETAILS - <?= $rows['s_proj_no']; ?></strong></h5>
                    <hr>
                    <p><strong>Title: </strong><?= $title ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Code: </strong><?= $rows['s_proj_code']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Quotation reference: </strong><?= $quot_no ?> </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Person incharge: </strong><?= $rows['s_proj_pic']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Site location: </strong><?= $site; ?></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Duration: </strong> <?= $duration ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Scope of work: </strong><?= $scope ?></p>
                        </div>

                        <div class="col-md-4">
                            <p><strong>Market segmentation: </strong><?= $market ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Amount Inc Tax: </strong>RM <?= $amount ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Amount Exc Tax: </strong>RM <?= $amount_tax ?></p>
                        </div>
                    </div>
                    <br>
                    <h5><strong>CLIENT DETAILS</strong></h5>
                    <hr>
                    <div class="row">
                        <p><strong>Company: </strong><?= $client_comp ?></p>
                        <div class="col-md-4">
                            <p><strong>PIC: </strong><?= $client_pic ?></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Email: </strong><?= $client_email ?></p>

                        </div>
                        <div class="col-md-4">
                            <p><strong>Phone: </strong><?= $client_phone ?></p>
                        </div>
                    </div>
                    <br>
                    <hr>
                </div>
            <?php
                    }
            ?>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.delete_securement').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var securement_no = document.getElementById("securement_no").value;
                console.log(securement_no)

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
                            url: "securement_delete.php",
                            data: {
                                "securement_delete": 1,
                                "securement_no": securement_no,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    '',
                                    'success'
                                ).then((result) => {
                                    window.location.href = "securement.php";
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
        })
    </script>

<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>