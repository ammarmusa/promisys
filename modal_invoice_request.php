<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request invoice form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="project_deliver_process.php" method="post">
                    <div id="show_form">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="tot" value="<?= $tot ?>">
                        <input type="hidden" name="total" value="<?= $total ?>">
                        <div class="col-md-12 mb-3">
                            <label>Project Title</label>
                            <input type="text" name="pd_title" value="<?= $title ?>" class="form-control mt-2" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Project Code</label>
                            <input type="text" name="pd_code" value="<?= $code ?>" class="form-control mt-2" readonly>
                        </div>
                        <!-- <div class="col-md-12 mb-3">
                            <label>Remark</label>
                            <input type="text" name="pd_remark" class="form-control mt-2" required>
                        </div> -->
                        <div class="col-md-12 mb-3">
                            <label>Fee Amount (RM)</label>
                            <input type="text" name="pd_amount" class="form-control mt-2" pattern="^\d+(?:\.\d{1,2})?$" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>