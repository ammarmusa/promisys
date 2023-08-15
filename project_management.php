<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
    $id = $_GET['id'] ?? null;
?>
    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') { ?>
        <?php
        $sql = "SELECT * FROM manage WHERE manage_id='$id'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $project = $rows['manage_proj_no'];
                // $quo = $rows['quot_no'];
            }

            $retrieve_data = mysqli_query($conn, "SELECT * FROM securement WHERE s_proj_no='$project'");
            while ($y = mysqli_fetch_assoc($retrieve_data)) {
                $code = $y['s_proj_code'];
                $quot_no = $y['s_quot_no'];
                $proj_pic = $y['s_proj_pic'];
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
            }
        ?>
            <!-- Checklist modal -->
            <?php
            include 'modal_checklist.php';
            ?>

            <div class="row mt-3">
                <div class="mb-3">
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            <span><a href="" data-bs-toggle="modal" data-bs-target="#viewProject"><span class="btn btn-sm btn-default text-light"><i class="bi bi-eye me-2"></i></span></a></span><strong><?= $project; ?></strong> - <?= $code; ?>
                            <a href="management.php" title="Back" class="btn btn-sm btn-warning float-end" title="Edit" style="margin-right: 10px">
                                <i class="bi bi-arrow-left-square"></i></a>
                            <a title="Checklist" data-bs-toggle="modal" data-bs-target="#viewChecklist" class="btn btn-sm btn-light float-end" title="Edit" style="margin-right: 10px">
                                <i class="bi bi-list-check"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></a></span><strong>Status</strong>
                            <button class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#addStatus" title="Add Data" style="margin-right: 10px">
                                <i class="bi bi-plus"></i>Status</button>

                        </div>

                        <!-- Add Status Modal -->
                        <?php
                        include 'modal_pm_add_status.php';
                        ?>

                        <div class="card-body">
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
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $action = mysqli_query($conn, "SELECT * FROM action WHERE action_proj_no = '$project' AND action_for = 'project' ORDER BY action_id DESC");
                                        while ($rows_act = mysqli_fetch_assoc($action)) {
                                            $action_date = date("d/m/Y", strtotime($rows_act['action_date']));
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $action_date ?></td>
                                                <td><?= $rows_act['action_body'] ?></td>
                                                <td><?= $rows_act['action_by'] ?></td>
                                                <td>
                                                    <div class="find_action_id d-flex justify-content-center">
                                                        <input type="hidden" class="action_id" name="action_id" id="action_id" value="<?= $rows_act['action_id'] ?>">
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#editStatus<?= $rows_act['action_id'] ?>" class="" title="Edit" style="margin-right: 10px">
                                                            <span class="badge bg-primary"><i class="bi bi-pencil-square"></i></span></a>
                                                        <?php
                                                        include 'modal_pm_action_edit.php';
                                                        ?>
                                                        <a href="" class="delete_action" title="Delete" style="margin-right: 10px">
                                                            <span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End of Row-->

            <!-- DOCUMENTS -->
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></a></span><strong>Documents</strong>
                            <button class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#addDocument" title="Add Data" style="margin-right: 10px">
                                <i class="bi bi-plus"></i>Document</button>
                            <input type="hidden" value="<?= $project ?>" id="doc_proj_no">
                        </div>

                        <!-- Add Document Modal -->
                        <?php
                        include 'modal_pm_add_document.php';
                        ?>

                        <?php
                        $sql_data = "SELECT doc_id FROM documents WHERE doc_proj_no = '$project' AND doc_folder = 'Data'";
                        $res_data = mysqli_query($conn, $sql_data);
                        $row_count_data = mysqli_num_rows($res_data);

                        $sql_fs = "SELECT doc_id FROM documents WHERE doc_proj_no = '$project' AND doc_folder = 'Final Submission'";
                        $res_fs = mysqli_query($conn, $sql_fs);
                        $row_count_fs = mysqli_num_rows($res_fs);

                        $sql_iso = "SELECT doc_id FROM documents WHERE doc_proj_no = '$project' AND doc_folder = 'ISO Document'";
                        $res_iso = mysqli_query($conn, $sql_iso);
                        $row_count_iso = mysqli_num_rows($res_iso);

                        $sql_ltr = "SELECT doc_id FROM documents WHERE doc_proj_no = '$project' AND doc_folder = 'Letter'";
                        $res_ltr = mysqli_query($conn, $sql_ltr);
                        $row_count_ltr = mysqli_num_rows($res_ltr);

                        $sql_quot = "SELECT doc_id FROM documents WHERE doc_proj_no = '$project' AND doc_folder = 'Quotation'";
                        $res_quot = mysqli_query($conn, $sql_quot);
                        $row_count_quot = mysqli_num_rows($res_quot);

                        $sql_sd = "SELECT doc_id FROM documents WHERE doc_proj_no = '$project' AND doc_folder = 'Supporting Document'";
                        $res_sd = mysqli_query($conn, $sql_sd);
                        $row_count_sd = mysqli_num_rows($res_sd);
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2" style="font-size:70%">
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                        <div class="card-body" onclick="data()">
                                            <h6 class="card-title">Data</h6>
                                            <p class="card-text"><?= $row_count_data ?> document</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="font-size:70%">
                                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                        <div class="card-body" onclick="fs()">
                                            <h6 class="card-title">Final Submission</h6>
                                            <p class="card-text"><?= $row_count_fs ?> document</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="font-size:70%">
                                    <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
                                        <div class="card-body" onclick="iso()">
                                            <h6 class="card-title">ISO Document</h6>
                                            <p class="card-text"><?= $row_count_iso ?> document</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="font-size:70%">
                                    <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
                                        <div class="card-body" onclick="ltr()">
                                            <h6 class="card-title">Letter</h6>
                                            <p class="card-text"><?= $row_count_ltr ?> document</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="font-size:70%">
                                    <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                                        <div class="card-body" onclick="quot()">
                                            <h6 class="card-title">Quotation</h6>
                                            <p class="card-text"><?= $row_count_quot ?> document</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="font-size:70%">
                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-body" onclick="sd()">
                                            <h6 class="card-title">Supp. Document</h6>
                                            <p class="card-text"><?= $row_count_sd ?> document</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="data_table document_table">
                                <table id="myTable_3" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Doc Type</th>
                                            <th>Date</th>
                                            <th>Remark</th>
                                            <th>File Name</th>
                                            <th>User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $doc = mysqli_query($conn, "SELECT * FROM documents WHERE doc_proj_no = '$project'");
                                        while ($rows_doc = mysqli_fetch_assoc($doc)) {
                                            $doc_date = date("d/m/Y", strtotime($rows_doc['doc_date']));
                                        ?>
                                            <tr>
                                                <td><?= $rows_doc['doc_folder'] ?></td>
                                                <td><?= $doc_date ?></td>
                                                <td><?= $rows_doc['doc_remark'] ?></td>
                                                <td><?= $rows_doc['doc_name'] ?></td>
                                                <td><?= $rows_doc['doc_upload_by'] ?></td>
                                                <td>
                                                    <div class="find_doc_id d-flex justify-content-center">
                                                        <input type="hidden" class="doc_id" name="doc_id" id="doc_id" value="<?= $rows_doc['doc_id'] ?>">
                                                        <?php
                                                        $extension = explode('.', $rows_doc['doc_name']);
                                                        if ($extension[1] == 'kml' || $extension[1] == 'kmz') {
                                                        ?>
                                                            <a href="load_kml.php?file=<?= $rows_doc['doc_path'] ?>" title="View Data" target="_blank" style="margin-right: 10px">
                                                                <span class="badge bg-primary"><i class="bi bi-globe-asia-australia"></i></span></a>
                                                        <?php
                                                        }
                                                        ?>
                                                        <a href="<?= $rows_doc['doc_path'] ?>" title="Download" style="margin-right: 10px">
                                                            <span class="badge bg-success"><i class="bi bi-download"></i></span></a>
                                                        <!-- <a href="" data-bs-toggle="modal" data-bs-target="#editStatus<?= $rows_act['action_id'] ?>" class="" title="Edit" style="margin-right: 10px">
                                                                <span class="badge bg-primary"><i class="bi bi-pencil-square"></i></span></a> -->
                                                        <?php
                                                        include 'modal_pm_action_edit.php';
                                                        ?>
                                                        <a href="" class="delete_doc" title="Delete" style="margin-right: 10px">
                                                            <span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End of Row-->

            <!-- PLANNING -->
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i><strong>Resource Planning</strong></span>

                            <button class="btn btn-sm btn-dark float-end" data-bs-toggle="modal" data-bs-target="#addData" title="Add Data" style="margin-right: 10px">
                                <i class="bi bi-plus"></i>Data</button>
                            <!-- <a href="document_view.php?project=<?= $rows['project_no']; ?>" class="btn btn-sm btn-dark float-end" title="Documents" style="margin-right: 10px">
                                    <i class="bi bi-file-earmark"></i></a> -->

                        </div>

                        <!--View Project Modal -->
                        <?php
                        include 'modal_pm_view_project.php';
                        ?>


                        <!--Add Data Modal -->
                        <?php
                        include 'modal_pm_add_data.php';
                        ?>

                        <div class="card-body" style="font-size:90%">
                            <div class="data_table">
                                <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>PIC</th>
                                            <th>Work</th>
                                            <th>Plan</th>
                                            <th>Actual</th>
                                            <th>Interval</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $res_ps = mysqli_query($conn, "SELECT * FROM project_schedule WHERE ps_proj_no='$project'");
                                    if (mysqli_num_rows($res_ps) > 0) { ?>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($rows_ps = mysqli_fetch_assoc($res_ps)) {
                                                $start = date("d/m/y", strtotime($rows_ps['ps_start']));
                                                $end = date("d/m/y", strtotime($rows_ps['ps_end']));
                                                $d1 = new DateTime($rows_ps['ps_start']);
                                                $d2 = new DateTime($rows_ps['ps_end']);
                                                // $interval = $d2->diff($d1)->format('%a days');

                                                //    Test
                                                // otherwise the  end date is excluded (bug?)
                                                $d2->modify('+1 day');

                                                $interval = $d2->diff($d1);

                                                // total days
                                                $days = $interval->days;

                                                // create an iterateable period of date (P1D equates to 1 day)
                                                $period = new DatePeriod($d1, new DateInterval('P1D'), $d2);

                                                // best stored as array, so you can add more than one
                                                $holidays = array('2012-09-07');

                                                foreach ($period as $dt) {
                                                    $curr = $dt->format('D');

                                                    // substract if Saturday or Sunday
                                                    if ($curr == 'Sat' || $curr == 'Sun') {
                                                        $days--;
                                                    }

                                                    // (optional) for the updated question
                                                    elseif (in_array($dt->format('Y-m-d'), $holidays)) {
                                                        $days--;
                                                    }
                                                }

                                                $plan = "<span style='color:green'>{$start}</span><br><span style='color:blue'>{$end}</span><br>({$days} Days)";
                                                $remark = "Remark: " . $rows_ps['ps_remark'];
                                            ?>
                                                <tr>
                                                    <td><?= $rows_ps['ps_type']; ?></td>
                                                    <td><?= $rows_ps['ps_pic'] ?></td>
                                                    <td><?= $rows_ps['ps_title']; ?><br><small><?= $remark; ?></small></td>
                                                    <td><?= $plan ?></td>
                                                    <td><?php

                                                        $displacement = '-';
                                                        if ($rows_ps['ps_remark'] == '') {
                                                        ?>
                                                            <button class="badge rounded-pill bg-sucess text-dark" data-bs-toggle="modal" data-bs-target="#addActual<?= $rows_ps['ps_id'] ?>">+ Actual</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="addActual<?= $rows_ps['ps_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Add Actual Schedule</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="project_schedule_process.php" method="post">
                                                                            <div class="modal-body" style="font-size:100%">
                                                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                                                <input type="hidden" name="project" value="<?= $project ?>">
                                                                                <input type="hidden" name="onsite_id" id="onsite_id" value="<?= $rows_ps['ps_id'] ?>">
                                                                                <div class="row mb-2">
                                                                                    <div class="col-md-6">
                                                                                        <label for="date" class="col-form-label">Start work:</label>
                                                                                        <input type="date" name="ps_start_act" class="form-control" value="<?= $rows_ps['ps_start'] ?>" required>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="date" class="col-form-label">Finish work:</label>
                                                                                        <input type="date" name="ps_end_act" class="form-control" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md mb-2">
                                                                                    <label for="recipient-name" class="col-form-label">Remark:</label>
                                                                                    <textarea class="form-control" name="ps_remark" type="text" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" name="onsite_actual">Add actual data</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php

                                                        } else {
                                                            $start_act = date("d/m/y", strtotime($rows_ps['ps_start_act']));
                                                            $end_act = date("d/m/y", strtotime($rows_ps['ps_end_act']));
                                                            $d1_act = new DateTime($rows_ps['ps_start_act']);
                                                            $d2_act = new DateTime($rows_ps['ps_end_act']);
                                                            // $interval_act = $d2_act->diff($d1_act)->format('%a days');

                                                            //    Test
                                                            // otherwise the  end date is excluded (bug?)
                                                            $d2_act->modify('+1 day');

                                                            $interval_act = $d2_act->diff($d1_act);

                                                            // total days
                                                            $days_act = $interval_act->days;

                                                            // create an iterateable period of date (P1D equates to 1 day)
                                                            $period_act = new DatePeriod($d1_act, new DateInterval('P1D'), $d2_act);

                                                            // best stored as array, so you can add more than one
                                                            $holidays = array('2012-09-07');

                                                            foreach ($period_act as $dt_act) {
                                                                $curr = $dt_act->format('D');

                                                                // substract if Saturday or Sunday
                                                                if ($curr == 'Sat' || $curr == 'Sun') {
                                                                    $days_act--;
                                                                }

                                                                // (optional) for the updated question
                                                                elseif (in_array($dt_act->format('Y-m-d'), $holidays)) {
                                                                    $days_act--;
                                                                }
                                                            }
                                                            // End test

                                                            $actual = "<span style='color:green'>{$start_act}</span><br><span style='color:blue'>{$end_act}</span><br>({$days_act} Days)";
                                                            $displacement = date_diff($d2_act, $d2)->format("%R%a");
                                                        ?>
                                                            <?= $actual ?>

                                                        <?php
                                                        }
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <span><?= $displacement ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="find_id d-flex justify-content-center">
                                                            <input type="hidden" class="delete_schedule" name="delete_schedule" id="delete_schedule" value="<?= $rows_ps['ps_id'] ?>">
                                                            <a href="project_management_edit.php?id=<?= $id ?>&ids=<?= $rows_ps['ps_id'] ?>" class="" title="Edit" style="margin-right: 10px">
                                                                <span class="badge bg-primary"><i class="bi bi-pencil-square"></i></span></a>
                                                            <a href="" class="delete_schedule" title="Delete" style="margin-right: 10px">
                                                                <span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
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
                    <?php
                } ?>
                    </div>

                </div> <!-- END OF ROW -->

            <?php } else { ?>
                <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
            <?php } ?>
            <script>
                function data() {
                    var value = "Data"
                    var doc_proj_no = document.getElementById('doc_proj_no').value
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: {
                            request: value,
                            proj_no: doc_proj_no,
                        },
                        beforeSend: function() {
                            $(".document_table").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".document_table").html(data);
                        }
                    })
                }

                function fs() {
                    var value = "Final Submission"
                    var doc_proj_no = document.getElementById('doc_proj_no').value
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: {
                            request: value,
                            proj_no: doc_proj_no,
                        },
                        beforeSend: function() {
                            $(".document_table").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".document_table").html(data);
                        }
                    })
                }

                function iso() {
                    var value = "ISO Document"
                    var doc_proj_no = document.getElementById('doc_proj_no').value
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: {
                            request: value,
                            proj_no: doc_proj_no,
                        },
                        beforeSend: function() {
                            $(".document_table").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".document_table").html(data);
                        }
                    })
                }

                function ltr() {
                    var value = "Letter"
                    var doc_proj_no = document.getElementById('doc_proj_no').value
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: {
                            request: value,
                            proj_no: doc_proj_no,
                        },
                        beforeSend: function() {
                            $(".document_table").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".document_table").html(data);
                        }
                    })
                }

                function quot() {
                    var value = "Quotation"
                    var doc_proj_no = document.getElementById('doc_proj_no').value
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: {
                            request: value,
                            proj_no: doc_proj_no,
                        },
                        beforeSend: function() {
                            $(".document_table").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".document_table").html(data);
                        }
                    })
                }

                function sd() {
                    var value = "Supporting Document"
                    var doc_proj_no = document.getElementById('doc_proj_no').value
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: {
                            request: value,
                            proj_no: doc_proj_no,
                        },
                        beforeSend: function() {
                            $(".document_table").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".document_table").html(data);
                        }
                    })
                }

                $(document).ready(function() {

                    var select_box_element = document.querySelector('#select_box');

                    dselect(select_box_element, {
                        search: true
                    });

                    var table = $('#myTable_2').DataTable({
                        responsive: true,
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    })

                    table.button().container().appendTo('#myTable_2_wrapper .col-md-6:eq(0)')

                    var table = $('#myTable_3').DataTable({
                        responsive: true,
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    })

                    table.button().container().appendTo('#myTable_3_wrapper .col-md-6:eq(0)')

                    $('.delete_schedule').click(function(e) {
                        e.preventDefault();
                        // console.log("clicked")
                        var delete_id = $(this).closest(".find_id").find('.delete_schedule').val();
                        console.log(delete_id)

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
                                    url: "project_schedule_process.php",
                                    data: {
                                        "schedule_delete": 1,
                                        "delete_id": delete_id,
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

                    $('.delete_action').click(function(e) {
                        e.preventDefault();
                        // console.log("clicked")
                        var delete_act_id = $(this).closest(".find_action_id").find('.action_id').val();
                        console.log(delete_act_id)

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
                                        "delete_ps_remark": 1,
                                        "delete_id": delete_act_id,
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

                    $('.delete_doc').click(function(e) {
                        e.preventDefault();
                        // console.log("clicked")
                        var doc_id = $(this).closest(".find_doc_id").find('.doc_id').val();
                        console.log(doc_id)

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
                                        "delete_doc": 1,
                                        "doc_id": doc_id,
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

                    var table = $('#myTable_4').DataTable({
                        responsive: true,
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                        paging: false
                    })

                    table.button().container().appendTo('#myTable_4_wrapper .col-md-6:eq(0)')

                    // Handle click on "Select all" control
                    $('#example-select-all').on('click', function() {
                        // Get all rows with search applied
                        var rows = table.rows({
                            'search': 'applied'
                        }).nodes();
                        // Check/uncheck checkboxes for all rows in the table
                        $('input[type="checkbox"]', rows).prop('checked', this.checked);
                    });

                    $('.delete_checklist').click(function(e) {
                        e.preventDefault();
                        // console.log("clicked")
                        var checklist_id = $(this).closest("td").find('.checklist_id').val();
                        console.log(checklist_id)

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
                                    url: "checklist_process.php",
                                    data: {
                                        "checklist_delete": 1,
                                        "checklist_id": checklist_id,
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

                    $("#add_data").click(function(e) {
                        e.preventDefault();
                        //add this line to prevent reload
                        var body = $("#body").val();
                        if (body == "") {
                            $("#error").fadeIn().text("Description required.");
                            $("input#body").focus();
                            return false;
                        }

                        $.ajax({
                            type: "post",
                            url: "checklist_process.php",
                            data: "body=" + body + "&add_data=add_data",
                            success: function() {
                                document.getElementById("body").value = '';
                                location.reload();
                            }
                        });
                    });
                })
            </script>
        <?php
        include "include_footer.php";
    } else {
        header("Location: login.php");
    } ?>