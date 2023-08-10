<div class="modal fade" id="viewProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <h5><strong>PROJECT DETAILS - <?= $project; ?></strong></h5>
                <hr>
                <p><strong>Title: </strong><?= $title; ?></p>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Code: </strong><?= $code ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Quotation reference: </strong><?= $quot_no; ?> </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Person incharge: </strong><?= $proj_pic ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Site location: </strong><?= $site ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Duration: </strong> <?= $duration ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Scope of work: </strong><?= $scope ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Amount (RM): </strong><?= $amount ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Market segmentation: </strong><?= $market ?></p>
                    </div>
                </div>
                <br>
                <h5><strong>CLIENT DETAILS</strong></h5>
                <hr>
                <div class="row">
                    <p><strong>Company: </strong><?= $client_comp ?></p>
                    <div class="col-md-4">
                        <p><strong>PIC: </strong><?= $client_pic ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Email: </strong><?= $client_email ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Phone: </strong><?= $client_phone; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                        <!-- <p>Market segmentation: <strong><?= $rows['project_market_segmentation']; ?></strong></p> -->
                    </div>
                    <div class="col-md-4">
                        <!-- <p>Project duration: <strong><?= $rows['project_proj_duration']; ?></strong></p> -->
                    </div>
                    <div class="col-md-4">
                        <!-- <p>Project site location: <strong><?= $rows['project_site_location']; ?></strong></p> -->
                    </div>
                </div>
                <!-- <p>Amount (RM): <strong><?= $rows['project_amount']; ?></strong></p> -->
                <br>
                <hr>
                <div class="row">

                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
</div>