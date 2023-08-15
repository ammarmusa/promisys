<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $branch = $_SESSION['branch'];
?>
    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') { ?>
        <div class="row mt-3">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Project Management
                    </div>
                    <div class="card-body">

                        <form action="management.php" method="post">
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
                            <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Project Ref.</th>
                                        <th>Project Code</th>
                                        <th>Client</th>
                                        <th>Award Date</th>
                                        <th>PIC</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT quot_no, quot_branch, quot_client, quot_amount, quot_title, s_award_date, s_proj_no, s_quot_no, s_proj_pic, s_proj_code, s_proj_pic, s_status
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
                                            $proj_code = $rows['s_proj_code'];
                                            $client = $rows['quot_client'];
                                            $total = $rows['quot_amount'];
                                            $res_2 = mysqli_query($conn, "SELECT manage_id FROM manage WHERE manage_proj_no = '$project_no'");
                                            while ($rows_2 = mysqli_fetch_assoc($res_2)) {
                                                $manage_id = $rows_2['manage_id'];
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $project_no ?></td>
                                                <td><?= $proj_code ?></td>
                                                <td><?= $client ?></td>
                                                <td><?= $date ?></td>
                                                <td><?= $rows['s_proj_pic'] ?></td>
                                                <td>
                                                    <?php
                                                    $tot = '0';
                                                    $check_total = mysqli_query($conn, "SELECT pd_amount FROM project_deliver WHERE pd_proj_no = '$project_no'");
                                                    while ($ct = mysqli_fetch_assoc($check_total)) {
                                                        // $total = $total = $ct['pd_amount'];;
                                                        // echo $ct['pd_amount_received'];
                                                        if ($ct['pd_amount'] == '') {
                                                            $tot = $tot + '0';
                                                        } else {
                                                            $tot = $tot + $ct['pd_amount'];
                                                        }
                                                    }
                                                    if ($tot < $total) {
                                                    ?>
                                                        <span class="badge bg-warning text-dark">On Going</span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class='badge bg-success'>Delivered</span>
                                                    <?php
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center find_id">
                                                        <!-- <input type="hidden" name="project_id" id="project_id" class="project_id" value="<?= $rows_2['project_id'] ?>"> -->
                                                        <a href="project_management.php?id=<?= $manage_id ?>" style="margin-right:10px"><span class='badge bg-dark'><i class="bi bi-eye"></i></span></a>
                                                        <?php

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
                    </div>
                </div>
            </div>
        </div>

        <script>

        </script>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>