<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $branch = $_SESSION['branch'];
?>
    <?php if ($_SESSION['role'] == 'admin') { ?>
        <!-- For Admin -->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Payment Collection
                        <!-- <a href="javascript:history.go(-1)" class="btn btn-sm btn-warning float-end" style="margin-right: 10px">
                            << Back</a> -->
                    </div>
                    <div class="card-body">

                    <form action="project_delivery.php" method="post">
                        <div class="row mb-3">
                        
                            <div class="col-sm-2">
                                <select class="form-select" name="year" required>
                                    <option value='' selected>Year</option>
                                    <?php
                                        $get_year = mysqli_query($conn, "SELECT DISTINCT YEAR(s_award_date) AS year FROM securement");
                                        while($a = mysqli_fetch_assoc($get_year)){
                                            echo "<option>".$a['year']."</option>";
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
                    if(isset($_POST['select_year'])) {
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
                                        <th>Project No.</th>
                                        <th>Project Code</th>
                                        <th>Amount</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php

                                ?>
                                <tbody>
                                    <?php
                                    $proj_no = '';
                                    $i = 1;
                                    if ($_SESSION['special'] != 'true') {
                                        $sql_payment = "SELECT s_proj_no, s_proj_code, s_award_date, s_quot_no, quot_no, quot_branch FROM securement INNER JOIN quotation ON securement.s_quot_no = quotation.quot_no WHERE quot_branch = '$branch' AND YEAR(s_award_date) = '$year'";
                                    } else {
                                        $sql_payment = "SELECT s_proj_no, s_proj_code, s_award_date FROM securement WHERE YEAR(s_award_date) = '$year'";
                                    }
                                    $payment = mysqli_query($conn, $sql_payment);
                                    while ($pay_rows = mysqli_fetch_assoc($payment)) {
                                        $proj_no = $pay_rows['s_proj_no'];
                                        // echo $proj_no . "<br>";
                                        $sql = "SELECT * FROM payments WHERE payment_proj_no = '$proj_no'";
                                        $res = mysqli_query($conn, $sql);
                                        while ($rows = mysqli_fetch_assoc($res)) {
                                            $proj_no = $rows['payment_proj_no'];
                                            $total = $rows['payment_tot_amt'];
                                            $amount = number_format($rows['payment_tot_amt'], 2);
                                    ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $rows['payment_proj_no'] ?></td>
                                                <td><?= $pay_rows['s_proj_code'] ?></td>
                                                <td>RM <?= $amount ?></td>
                                                <td><?= $rows['payment_client'] ?></td>
                                                <td>
                                                    <?php
                                                    $tot = '0';
                                                    $check_total = mysqli_query($conn, "SELECT pd_amount_received FROM project_deliver WHERE pd_proj_no = '$proj_no'");
                                                    while ($ct = mysqli_fetch_assoc($check_total)) {
                                                        // echo $ct['pd_amount_received'];
                                                        if ($ct['pd_amount_received'] == '') {
                                                            $tot = $tot + '0';
                                                        } else {
                                                            $tot = $tot + $ct['pd_amount_received'];
                                                        }
                                                    }
                                                    if ($tot < $total) {
                                                        $tot_show = number_format($tot, 2);
                                                    ?>
                                                        <span class='badge bg-danger' title="RM <?= $tot_show ?> / RM <?= $amount ?>">Incomplete</span>
                                                    <?php
                                                    } else {
                                                        $tot_show = number_format($tot, 2);
                                                    ?>
                                                        <span class='badge bg-success' title="RM <?= $tot_show ?> / RM <?= $amount ?>">Completed</span>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="invoice_view.php?id=<?= $rows['payment_id'] ?>"><span class='badge bg-dark'><i class="bi bi-eye"></i></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php $i++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>