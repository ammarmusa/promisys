<div class="modal fade" id="upload_doc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="approveLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveLabel">Upload document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="document_process.php" method="post" enctype='multipart/form-data'>
                <!-- <form action="test_post.php" method="post"> -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="proj_no" value="<?= $proj_no; ?>">
                            <label for="date" class="col-form-label">Remark: </label>
                            <input class="form-control" required type="text" name="remark" value="Supporting files.">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="date" class="col-form-label mt-3">Supporting files:</label>
                            <input name="upload[]" type="file" multiple="multiple" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_supp_doc" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>