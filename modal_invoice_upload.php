<div class="modal fade" id="modal<?= $rows_2['pd_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="invoice_process.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="ids" value="<?= $rows_2['pd_id'] ?>">
                        <label for="date" class="col-form-label mt-3">Amount paid (RM)</label>
                        <input class="form-control" readonly type="text" name="paid_amount" value="<?= $rows_2['pd_amount'] ?>">
                    </div>

                    <div class="col-md-12">
                        <label for="date" class="col-form-label mt-3">Invoice No.</label>
                        <input class="form-control" type="text" name="pd_invoice_no" placeholder="">
                        <input type="hidden" name="pd_proj_no" value="<?= $rows_2['pd_proj_no'] ?>">
                    </div>
                    <div class="custom-file col-md-12">
                        <label for="date" class="col-form-label mt-3">Invoice</label>
                        <input id="pdf" type="file" name="pdf" value="" accept="application/pdf" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="upload_invoice" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>