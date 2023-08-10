<div class="modal fade" id="addDocument" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Select a document to upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="document_process.php" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="file" name="file" required>
                    <input class="form-control mt-3" type="text" name="doc_remark" placeholder="Remark" required>
                    <select name="doc_type" class="form-control mt-3" id="cars">
                        <option value="" selected>Please select a type</option>
                        <option value="Data">Data</option>
                        <option value="Final Submission">Final Submission</option>
                        <option value="ISO Document">ISO Document</option>
                        <option value="Letter">Letter</option>
                        <option value="Quotation">Quotation</option>
                        <option value="Supporting Document">Supporting Document</option>
                    </select>
                    <input type="hidden" name="project_no" value="<?= $id; ?>">
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="project_no" value="<?= $project ?>">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="upload_doc" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>