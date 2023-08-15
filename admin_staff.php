<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>
    <?php if ($_SESSION['role'] == 'admin' && $_SESSION['special'] == 'true' || $_SESSION['role'] == 'superuser') { ?>
        <div class="row mt-3">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Staff List
                        <!-- Button trigger modal -->
                        <a href="staff_add.php" class="btn btn-sm btn-dark float-end">
                            Add Staff
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- <a href="project_add.php" class="btn btn-sm btn-primary">Add Quotation</a> -->

                        <div class="data_table">
                            <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Staff No.</th>
                                        <th>Name</th>
                                        <th>Initial</th>
                                        <th>Branch</th>
                                        <th>Dept.</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $retrieve_staff = mysqli_query($conn, "SELECT * FROM staff WHERE staff_type='Staff'");
                                ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($retrieve_staff)) {
                                        $staff = $rows['staff_number'];
                                        $id = $rows['id'];
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $rows['staff_number'] ?></td>
                                            <td><?= $rows['staff_name'] ?></td>
                                            <td><?= $rows['staff_initial'] ?></td>
                                            <td><?= $rows['branch'] ?></td>
                                            <td><?= $rows['staff_department'] ?></td>
                                            <td><?= $rows['staff_type'] ?></td>
                                            <td>
                                                <?php
                                                $sql_2 = "SELECT * FROM users WHERE staff_no = '$staff'";
                                                $res_2 = mysqli_query($conn, $sql_2);
                                                if (mysqli_num_rows($res_2) == 0) {
                                                    echo "<span class='badge bg-warning text-dark'>Not registered</span>";
                                                } else {
                                                    echo "<span class='badge bg-success'>Registered</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <input type="hidden" id="staff_id" value="<?= $id ?>">
                                                    <a href="admin_view_staff.php?id=<?= $id ?>" class="badge bg-dark" style="margin-right:10px"><i class="bi bi-eye"></i></a>
                                                    <a class="badge bg-danger delete_staff"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <div class="row">

                            <h5>Contract Partner<a href="add_contract_partner.php" class="btn btn-sm btn-dark float-end">
                                    Add New Partner
                                </a></h5>
                        </div>

                        <div class="data_table mt-3">
                            <table id="myTable_2" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Project Ref.</th>
                                        <th>Contract Partner</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $retrieve_partner = mysqli_query($conn, "SELECT * FROM contract_partner");
                                ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($cp = mysqli_fetch_assoc($retrieve_partner)) {
                                        $date_1 = date("d/m/Y", strtotime($cp['cp_start']));
                                        $date_2 = date("d/m/Y", strtotime($cp['cp_end']));
                                        $amount = number_format($cp['cp_fee'], 2);
                                        $ids = $cp['cp_id'];
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $cp['cp_proj_no'] ?></td>
                                            <td><?= $cp['cp_name'] ?></td>
                                            <td><?= $date_1 ?></td>
                                            <td><?= $date_2 ?></td>
                                            <td>RM <?= $amount ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <input type="hidden" id="cp_id" value="<?= $ids ?>">
                                                    <a href="contract_partner_view.php?ids=<?= $ids ?>" class="badge bg-dark" style="margin-right:10px"><i class="bi bi-eye"></i></a>
                                                    <a class="badge bg-danger delete_cp"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var table = $('#myTable_2').DataTable({
                    responsive: true,
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                })

                table.button().container().appendTo('#myTable_2_wrapper .col-md-6:eq(0)')

                $('.delete_staff').click(function(e) {
                    e.preventDefault();
                    // console.log("clicked")
                    var staff_id = $(this).closest("td").find('#staff_id').val();
                    // var staff_id = document.querySelector("#staff_id").value
                    console.log(staff_id)

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
                                url: "staff_process.php",
                                data: {
                                    "staff_delete": 1,
                                    "staff_id": staff_id,
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

                $('.delete_cp').click(function(e) {
                    e.preventDefault();
                    // console.log("clicked")
                    var cp_id = $(this).closest("td").find('#cp_id').val();
                    // var cp_id = document.querySelector("#cp_id").value
                    console.log(cp_id)

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
                                url: "contract_partner_process.php",
                                data: {
                                    "cp_delete": 1,
                                    "cp_id": cp_id,
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