<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
?>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM clients where client_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
    ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-pen me-2"></i></span> Update client's information
                            <a href="quotation.php" title="Back" class="btn btn-sm btn-warning float-end" title="Back">
                                <i class="bi bi-arrow-left-square"></i></a>
                        </div>
                        <div class="card-body">
                            <form action="client_process.php" method="post">
                                <input type="hidden" name="client_id" value="<?= $id ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date" class="col-form-label mt-3">Company Name</label>
                                        <input class="form-control" name="client_comp_name" value="<?= $rows['client_comp_name']; ?>" type="text" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date" class="col-form-label mt-3">Address</label>
                                        <input class="form-control" name="client_address" value="<?= $rows['client_address']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date" class="col-form-label mt-3">Person Incharge</label>
                                        <input class="form-control" name="client_pic" value="<?= $rows['client_pic']; ?>" type="text" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date" class="col-form-label mt-3">Contact Number</label>
                                        <input class="form-control" name="client_phone" value="<?= $rows['client_phone']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date" class="col-form-label mt-3">Fax</label>
                                        <input class="form-control" name="client_fax" value="<?= $rows['client_fax']; ?>" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date" class="col-form-label mt-3">Email</label>
                                        <input class="form-control" name="client_email" value="<?= $rows['client_email']; ?>" type="email">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="update_client" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>


<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>