<div class="modal fade" id="receive<?= $rows_2['pd_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Receive Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="invoice_process.php" method="post">
                    <div class="col-md-12">
                        <input type="hidden" name="ids" value="<?= $rows_2['pd_id'] ?>">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <label for="date" class="col-form-label mt-3">Amount paid (RM)</label>
                        <input class="form-control" readonly type="text" name="paid_amount" value="<?= $rows_2['pd_amount'] ?>" required>

                    </div>

                    <div class="col-md-12">
                        <label for="date" class="col-form-label mt-3">Invoice No.</label>
                        <input class="form-control" type="text" name="pd_invoice_no" value="<?= $rows_2['pd_invoice_no'] ?>" readonly>
                        <input type="hidden" name="pd_proj_no" value="<?= $rows_2['pd_proj_no'] ?>">
                    </div>

                    <div class="col-md-12">
                        <label for="date" class="col-form-label mt-3">Date received:</label>
                        <input type="date" name="pd_receive_date" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_invoice_set" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>