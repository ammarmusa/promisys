<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['id'] ?? null;
    $proj_no = '';
    // echo $_SERVER["REQUEST_URI"];
    // echo $_SERVER['HTTP_REFERER'];
?>

    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') { ?>

        <?php
        $retrieve_data = mysqli_query($conn, "SELECT * FROM payments WHERE payment_id = '$id'");
        while ($rows = mysqli_fetch_assoc($retrieve_data)) {
            $proj_no = $rows['payment_proj_no'];
            $date = date("d/m/Y", strtotime($rows['payment_date']));
            $total = $rows['payment_tot_amt'];
            $amount_2 = number_format($rows['payment_tot_amt'], 2);
        }

        $quot = mysqli_query($conn, "SELECT * from securement WHERE s_proj_no = '$proj_no'");
        while ($q = mysqli_fetch_assoc($quot)) {
            $quot_no = $q['s_quot_no'];
            $code = $q['s_proj_code'];
        }

        $quot_details = mysqli_query($conn, "SELECT * FROM quotation WHERE quot_no = '$quot_no'");
        while ($qd = mysqli_fetch_assoc($quot_details)) {
            $client = $qd['quot_client'];
            $title = $qd['quot_title'];
        }
        ?>


        <div class="row mt-3">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Request invoice
                    </button> -->
                        <a href="project_delivery.php" class="btn btn-sm btn-warning float-end">
                            <i class="bi bi-arrow-left-square"></i></a>
                        <span><i class="bi bi-table me-2"></i></span> Payment Information
                    </div>

                    <div class="card-body">
                        <?php
                        // $sql = "SELECT * FROM payments WHERE payment_proj_no='$proj_no'";
                        // $res = mysqli_query($conn, $sql);
                        // if (mysqli_num_rows($res) > 0) {
                        //     while ($rows = mysqli_fetch_assoc($res)) {
                        //         $date = date("d/m/Y", strtotime($rows['payment_date']));
                        //         $total = $rows['payment_tot_amt'];
                        //         $amount_2 = number_format($rows['payment_tot_amt'], 2);
                        // $amount_3 = number_format($rows['payment_tot_amt'], 2)
                        ?>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Project Number: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $proj_no ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Quotation Number: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $quot_no ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Fee Amount: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="RM <?= $amount_2; ?>">
                            </div>
                        </div>
                        <!-- <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Fee Amount After Tax: </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="RM <?= $amount_3; ?>">
                                </div>
                            </div> -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Client: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $client ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Issued On: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $date; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Invoice

                        <?php
                        $tot = '0';
                        $check_total = mysqli_query($conn, "SELECT pd_amount FROM project_deliver WHERE pd_proj_no = '$proj_no'");
                        while ($ct = mysqli_fetch_assoc($check_total)) {
                            // echo $ct['pd_amount_received'];
                            if ($ct['pd_amount'] == '') {
                                $tot = $tot + '0';
                            } else {
                                $tot = $tot + $ct['pd_amount'];
                            }
                        }
                        if ($tot < $total) {
                        ?>
                            <button type="button" class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Request invoice
                            </button>
                        <?php
                        } else {
                        ?>
                            <button disabled type="button" class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Request invoice
                            </button>
                        <?php
                        }
                        ?>
                        <!-- Modal -->
                        <?php
                        include "modal_invoice_request.php";
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="data_table">
                            <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Invoice No.</th>
                                        <th>Date Created</th>
                                        <th>Amount</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $total_paid = '0';
                                $sql_2 = "SELECT * FROM project_deliver WHERE pd_proj_no = '$proj_no'";
                                $res_2 = mysqli_query($conn, $sql_2);
                                if (mysqli_num_rows($res_2) > 0) { ?>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($rows_2 = mysqli_fetch_assoc($res_2)) {
                                            $date = $rows_2['pd_date'];
                                            $newDate = date("d/m/Y", strtotime($date));
                                            $paid = $rows_2['pd_amount'];
                                            $amount = number_format($rows_2['pd_amount'], 2);
                                            $pd_id = $rows_2['pd_id'];
                                            $status = $rows_2['status'];
                                            $pd_invoice_no = $rows_2['pd_invoice_no'];
                                        ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <?php
                                                    if ($rows_2['pd_invoice_no'] != '') {
                                                        echo $rows_2['pd_invoice_no'];
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $newDate ?></td>
                                                <td>RM <?= $amount ?>
                                                    <?php
                                                    $diff = $total - $paid;
                                                    $total_paid = $total_paid + $paid;
                                                    $balance = number_format($diff, 2);
                                                    if ($total_paid < $total) {
                                                        echo "<br><small style='color:blue'>Invoice total amt: RM " . number_format($total_paid, 2) . "</small>";
                                                    } else if ($total_paid == $total) {
                                                        echo "<br><small style='color:green'>Invoice total amt: RM " . number_format($total_paid, 2) . "</small>";
                                                    } else {
                                                        echo "<br><small style='color:red'>Invoice total amt: RM " . number_format($total_paid, 2) . "</small>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($rows_2['pd_invoice'] == '') {
                                                        echo "<span class='badge bg-warning text-dark'>Pending for invoice</span>";
                                                    } else {
                                                        if ($status == 'unpaid') {
                                                            echo "<span class='badge bg-danger'>Pending for payment</span>";
                                                        } else {
                                                            echo "<span class='badge bg-success'>Paid</span><br><small>Received on: " . date("d/m/Y", strtotime($rows_2['pd_receive_date'])) . "</small>";
                                                        }
                                                        echo "";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <?php
                                                        if ($rows_2['pd_invoice'] == '') {
                                                        ?>
                                                            <input type="hidden" class="invoice_id" value="<?= $rows_2['pd_id'] ?>">
                                                            <?php
                                                            if ($_SESSION['special'] == 'true') {
                                                            ?>
                                                                <a data-bs-toggle='modal' data-bs-target='#modal<?= $rows_2['pd_id'] ?>' style='margin-right:10px'><span class='badge bg-primary'><i class='bi bi-upload'></i></span></a>
                                                            <?php
                                                            } else {
                                                                echo '';
                                                            }
                                                            ?>

                                                            <!-- Modal -->
                                                            <?php
                                                            include "modal_invoice_upload.php";
                                                            ?>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href='project/<?= $proj_no ?>/invoice/<?= $rows_2['pd_invoice'] ?>'><span class='badge bg-dark' style='margin-right:10px'><i class='bi bi-eye'></i></span></a>
                                                            <input type='hidden' class='invoice_id' value='<?= $rows_2['pd_id'] ?>'>
                                                            <?php
                                                            if ($status == "unpaid") {
                                                            ?>

                                                                <a style='margin-right:10px' class="update_invoice" title="Complete" data-bs-toggle='modal' data-bs-target='#receive<?= $rows_2['pd_id'] ?>'><span class='badge bg-success'><i class="bi bi-clipboard2-check"></i></span></a>
                                                                <!-- MODAL -->
                                                                <?php
                                                                include "modal_invoice_receive.php";
                                                                ?>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <!-- <a href="" title="Complete"><span class='badge bg-success' disabled><i class="bi bi-clipboard2-check"></i></span></a> -->
                                                            <?php
                                                            }
                                                            ?>
                                                        <?php
                                                        }
                                                        ?>
                                                        <a data-bs-toggle='modal' data-bs-target='#invoiceComment<?= $rows_2['pd_id'] ?>' style='margin-right:10px'><span class='badge bg-warning '><i class="bi bi-chat-left-text"></i></span></a>

                                                        <!-- MODAL ADD COMMENT -->
                                                        <?php
                                                        include "modal_invoice_comment.php";
                                                        ?>

                                                        <a><span class='badge bg-danger delete_invoice'><i class='bi bi-trash'></i></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>

    <script>
        $(document).ready(function() {
            var table = $('#myTable_2').DataTable({
                responsive: true,
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            })

            table.button().container().appendTo('#myTable_2_wrapper .col-md-6:eq(0)')

            $('.delete_invoice').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var invoice_id = $(this).closest("tr").find('.invoice_id').val();
                console.log(invoice_id)
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
                            url: "invoice_process.php",
                            data: {
                                "delete_invoice_set": 1,
                                "invoice_id": invoice_id,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Invoice deleted',
                                    '',
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                })
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Invoice failed to delete',
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

            $('.delete_action').click(function(e) {
                e.preventDefault();
                // console.log("clicked")
                var action_id = $(this).closest(".find_id").find('.action_id').val();
                console.log(action_id)
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
                            url: "action_process.php",
                            data: {
                                "delete_action_invoice": 1,
                                "action_id": action_id,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Action deleted!',
                                    '',
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                })
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Action failed to delete!',
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