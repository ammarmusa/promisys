<form action="quotation_add.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a quotation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <label for="date" class="col-1 col-form-label">Date</label>
                        <input type="date" name="quot_app_date" class="form-control" required>
                    </div>
                    <div class="">
                        <label for="date" class="col-form-label mt-3">State of Project</label>
                        <select class="form-select" name="project_location" aria-label="Default select example" required>
                            <option selected value="">Open this select menu</option>
                            <option value="Johor">Johor</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Pulau Pinang">Pulau Pinang</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Perak">Perak</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>