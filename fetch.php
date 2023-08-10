<?php

include 'db_conn.php';
if (isset($_POST['request'])) {
    $request = $_POST['request'];
    $proj_no = $_POST['proj_no'];

    $query = "SELECT * FROM documents WHERE doc_proj_no = '$proj_no' AND doc_folder = '$request'";
    $doc = mysqli_query($conn, $query);
    $count = mysqli_num_rows($doc);
}
?>

<table id="myTable_3" class="table table-striped table-bordered" style="width: 100%">

    <?php
    if ($count) {
    ?>
        <thead>
            <tr>
                <th>Doc Type</th>
                <th>Date</th>
                <th>Remark</th>
                <th>File Name</th>
                <th>User</th>
                <th>Action</th>
            </tr>
        <?php
    } else {
        echo "Sorry! no record found";
    }
        ?>
        </thead>
        <tbody>
            <?php
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