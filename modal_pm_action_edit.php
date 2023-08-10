<div class="modal fade" id="editStatus<?= $rows_act['action_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="action_process.php" method="post">
                    <div id="show_form">
                        <div class="row">
                            <input type="hidden" name="ids" value="<?= $rows_act['action_id'] ?>">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="col-md-10">
                                <input type="text" name="action_body" value="<?= $rows_act['action_body'] ?>" class="form-control" placeholder="Description" required>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="edit_ps_remark" class="btn btn-block btn-dark">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>