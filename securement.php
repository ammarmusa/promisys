<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $branch = $_SESSION['branch'];
?>
    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') { ?>
        <!-- For Admin -->
        <div class="row mt-3">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Secured Project
                        <!-- <a href="javascript:history.go(-1)" class="btn btn-sm btn-warning float-end" style="margin-right: 10px">
                            << Back</a> -->
                    </div>
                    <div class="card-body">

                        <form action="securement.php" method="post">
                            <div class="row mb-3">

                                <div class="col-sm-2">
                                    <select class="form-select" name="year" required>
                                        <option value='' selected>Year</option>
                                        <?php
                                        $get_year = mysqli_query($conn, "SELECT DISTINCT YEAR(s_award_date) AS year FROM securement");
                                        while ($a = mysqli_fetch_assoc($get_year)) {
                                            echo "<option>" . $a['year'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary" name="select_year">Submit</button>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['select_year'])) {
                            $year = $_POST['year'];
                        } else {
                            $year = date("Y");
                        }
                        ?>

                        <div class="data_table">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Reference</th>
                                            <th>Award Date</th>
                                            <th>PIC</th>
                                            <th>Client</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT quot_no, quot_branch, quot_client, quot_amount, quot_title, s_award_date, s_proj_no, s_quot_no, s_id, s_proj_code, s_proj_pic, s_status
                                    FROM quotation
                                    INNER JOIN securement
                                    ON quotation.quot_no = securement.s_quot_no WHERE quot_branch = '$branch' AND YEAR(s_award_date)='$year'";
                                    $res = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($res) > 0) { ?>
                                        <tbody>
                                            <?php

                                            $i = 1;
                                            while ($rows = mysqli_fetch_assoc($res)) {
                                                $date = date("d/m/Y", strtotime($rows['s_award_date']));
                                                $project_no = $rows['s_proj_no'];
                                                $quot_no = $rows['s_quot_no'];

                                                $quot_client = $rows['quot_client'];
                                                $quot_title = $rows['quot_title'];
                                                $total = $rows['quot_amount'];

                                            ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $rows['s_proj_no'] ?></td>
                                                    <td><?= $date ?></td>
                                                    <td><?= $rows['s_proj_pic'] ?></td>
                                                    <td><?= $quot_client ?></td>
                                                    <td> <?php
                                                            if (strlen($quot_title) < 50) {
                                                                echo $quot_title;
                                                            } else {
                                                                echo substr($quot_title, 0, 50) . "...";
                                                            }
                                                            ?></td>
                                                    <td>
                                                        <?php
                                                        $tot = '0';
                                                        $check_total = mysqli_query($conn, "SELECT pd_amount FROM project_deliver WHERE pd_proj_no = '$project_no'");
                                                        while ($ct = mysqli_fetch_assoc($check_total)) {
                                                            // $total = $ct['pd_amount'];
                                                            // echo $ct['pd_amount_received'];
                                                            if ($ct['pd_amount'] == '') {
                                                                $tot = $tot + '0';
                                                            } else {
                                                                $tot = $tot + $ct['pd_amount'];
                                                            }
                                                        }
                                                        if ($tot < $total) {
                                                            // echo $tot . "<br>";
                                                            // echo $total;
                                                        ?>
                                                            <span class="badge bg-warning text-dark">On Going</span>
                                                        <?php
                                                        } else {
                                                            // echo $tot . "<br>";
                                                            // echo $total;
                                                        ?>
                                                            <span class='badge bg-success'>Delivered</span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center find_s_id">
                                                            <?php
                                                            if ($rows['s_proj_code'] == '') {
                                                            ?>
                                                                <input type="hidden" name="securement_id" class="securement_id" value="<?= $rows['s_id'] ?>">
                                                                <a href="securement_update.php?id=<?= $rows['s_id']; ?>"><span class='badge bg-secondary'><i class="bi bi-vector-pen"></i></span></a>
                                                                <a class="delete_securement" title="Delete" style="margin-left: 10px">
                                                                    <span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="securement_view.php?id=<?= $rows['s_id']; ?>"><span class='badge bg-dark'><i class="bi bi-eye"></i></span></a>
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
            $('.delete_securement').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var securement_id = $(this).closest(".find_s_id").find('.securement_id').val();
                console.log(securement_id)

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
                            url: "securement_process.php",
                            data: {
                                "securement_delete": 1,
                                "securement_id": securement_id,
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