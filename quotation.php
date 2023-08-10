<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $branch = $_SESSION['branch'];
?>
    <?php if ($_SESSION['role'] == 'admin') { ?>
        <div class="row">
            <div class="col-md-12 mb-3 mt-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Quotation list

                        <!-- Button trigger modal -->
                        <a href="quotation_add.php" class="btn btn-sm btn-dark float-end">
                            Add Quotation
                        </a>
                        <button type="button" class="btn btn-sm btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#client" style="margin-right:10px">
                            Clients
                        </button>

                    </div>

                    <div class="card-body">
                    <form action="quotation.php" method="post">
                        <div class="row mb-3">
                        
                            <div class="col-sm-2">
                                <select class="form-select" name="year" required>
                                    <option value='' selected>Year</option>
                                    <?php
                                        $get_year = mysqli_query($conn, "SELECT DISTINCT YEAR(quot_app_date) AS year FROM quotation");
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
        
                        <!-- <a href="project_add.php" class="btn btn-sm btn-primary">Add Quotation</a> -->
                        <!-- Modal Add Quotation-->

                        <!-- Modal Client-->
                        <?php
                        include "modal_client.php";
                        ?>

                        <?php
                        // $sql_by_year = "select * from quotation where year(quot_app_date) = 2020";
                        ?>

                        <?php
                            if(isset($_POST['select_year'])){
                                $year = $_POST['year'];
                        ?>
                            <div class="data_table">
                        
                        <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Reference</th>
                                    <th>Title</th>
                                    <th>Amount Inc Tax</th>
                                    <th>Amount Exc Tax</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "SELECT * FROM quotation WHERE quot_branch= '$branch' AND YEAR(quot_app_date) = '$year'";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) { ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($res)) {
                                        $proj_no = $rows['quot_no'];
                                        $amount = '0';
                                        $amount_2 = '0';
                                        $amount = number_format($rows['quot_amount'], 2);
                                        $amount_2 = number_format($rows['quot_amount_tax'], 2);
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $rows['quot_no'] ?></td>
                                            <td>
                                                <?php
                                                if (strlen($rows['quot_title']) < 50) {
                                                    echo $rows['quot_title'];
                                                } else {
                                                    echo "<span title='".$rows['quot_title']."'>".substr($rows['quot_title'], 0, 100) ."...</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>RM <?= $amount ?></td>
                                            <td>RM <?= $amount_2 ?></td>

                                            <td>
                                                <?php
                                                $sql_2 = "SELECT * FROM action WHERE action_proj_no = '$proj_no' AND action_for = 'quotation'";
                                                $res_2 = mysqli_query($conn, $sql_2);
                                                if (mysqli_num_rows($res_2) == 0) {
                                                    echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                                } else {
                                                    $check = mysqli_query($conn, "SELECT quot_status FROM quotation WHERE quot_no = '$proj_no'");
                                                    while ($fetch = mysqli_fetch_assoc($check)) {
                                                        if ($fetch['quot_status'] == 'approved') {
                                                            echo "<span class='badge bg-success'>Success</span>";
                                                        } else if ($fetch['quot_status'] == 'rejected') {
                                                            echo "<span class='badge bg-danger'>Failed</span>";
                                                        } else {
                                                            echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- <a href="" title="Delete" style="color:red"><i class="bi bi-trash"></i></a> -->
                                                    <a href="quotation_view.php?id=<?= $rows['quot_id']; ?>" title="View"><span class='badge bg-dark'><i class="bi bi-eye"></i></span></a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php $i++;
                                    } ?>
                                    <?php } ?>
                                </tbody>
                        </table>
                    </div> <!--End of data_table-->  
                        <?php
                            } else {
                            
                            $year = date("Y");
                        ?>
                        <div class="data_table">
                        
                        <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Reference</th>
                                    <th>Title</th>
                                    <th>Amount Inc Tax</th>
                                    <th>Amount Exc Tax</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "SELECT * FROM quotation WHERE quot_branch= '$branch' AND YEAR(quot_app_date) = '$year'";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) { ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($rows = mysqli_fetch_assoc($res)) {
                                        $proj_no = $rows['quot_no'];
                                        $amount = '0';
                                        $amount_2 = '0';
                                        $amount = number_format($rows['quot_amount'], 2);
                                        $amount_2 = number_format($rows['quot_amount_tax'], 2);
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $rows['quot_no'] ?></td>
                                            <td>
                                                <?php
                                                if (strlen($rows['quot_title']) < 100) {
                                                    echo $rows['quot_title'];
                                                } else {
                                                    echo substr($rows['quot_title'], 0, 100) . "...";
                                                }
                                                ?>
                                            </td>
                                            <td>RM <?= $amount ?></td>
                                            <td>RM <?= $amount_2 ?></td>

                                            <td>
                                                <?php
                                                $sql_2 = "SELECT * FROM action WHERE action_proj_no = '$proj_no' AND action_for = 'quotation'";
                                                $res_2 = mysqli_query($conn, $sql_2);
                                                if (mysqli_num_rows($res_2) == 0) {
                                                    echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                                } else {
                                                    $check = mysqli_query($conn, "SELECT quot_status FROM quotation WHERE quot_no = '$proj_no'");
                                                    while ($fetch = mysqli_fetch_assoc($check)) {
                                                        if ($fetch['quot_status'] == 'approved') {
                                                            echo "<span class='badge bg-success'>Success</span>";
                                                        } else if ($fetch['quot_status'] == 'rejected') {
                                                            echo "<span class='badge bg-danger'>Failed</span>";
                                                        } else {
                                                            echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- <a href="" title="Delete" style="color:red"><i class="bi bi-trash"></i></a> -->
                                                    <a href="quotation_view.php?id=<?= $rows['quot_id']; ?>" title="View"><span class='badge bg-dark'><i class="bi bi-eye"></i></span></a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php $i++;
                                    } ?>
                                    <?php } ?>
                                </tbody>
                        </table>
                    </div> <!--End of data_table-->
                        <?php
                    }
                    ?>  

                    </div> <!-- End of Card Body -->
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

                $('.delete_client').click(function(e) {
                    e.preventDefault();
                    // console.log("clicked")
                    var client_id = $(this).closest("tr").find('.client_id').val();
                    console.log(client_id)

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
                                url: "client_process.php",
                                data: {
                                    "delete_client_set": 1,
                                    "client_id": client_id,
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Client deleted',
                                        '',
                                        'success'
                                    ).then((result) => {
                                        location.reload();
                                    })
                                },
                                error: function(response) {
                                    Swal.fire(
                                        'Client failed to delete',
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
            });
        </script>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>