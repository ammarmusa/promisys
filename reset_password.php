<?php
session_start();
include "alert.php";
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
    <!DOCTYPE html>
    <link rel="shortcut icon" href="assets/images/setia_icon.png" type="image/x-icon">
    <html>

    <head>
        <title>Promisys Login</title>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Section: Design Block -->
        <section class="">
            <!-- Jumbotron -->
            <div class="px-4 py-5 px-md-5 text-lg-start" style="background-color: hsl(0, 0%, 96%)">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="card">
                                <div class="card-body py-5 px-md-5">
                                    <?php
                                    $key = $_GET['key'] ?? null;
                                    $token = $_GET['token'] ?? null;
                                    if ($key != null && $token != null) {
                                        include "db_conn.php";
                                        $staff_no = $_GET['key'];
                                        $token = $_GET['token'];
                                        $query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM `users` WHERE `reset_link_token`='" . $token . "' and `staff_no`='" . $staff_no . "';"
                                        );
                                        $curDate = date("Y-m-d H:i:s");
                                        if (mysqli_num_rows($query) > 0) {
                                            $row = mysqli_fetch_array($query);
                                            $email = $row['email'];
                                            if ($row['exp_date'] >= $curDate) { ?>
                                                <form action="reset_password_process.php" method="post">
                                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                    <input type="hidden" name="reset_link_token" value="<?php echo $token; ?>">
                                                    <div class="form-group mb-3">
                                                        <label for="exampleInputEmail1">Password</label>
                                                        <input type="password" id="password" name='password' class="form-control" onkeyup='check();'>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="exampleInputEmail1">Confirm Password</label>
                                                        <input type="password" id="cpassword" name='cpassword' class="form-control" onkeyup='check();'>
                                                        <span id='message'></span>
                                                    </div>
                                                    <input type="submit" name="set_new_password" class="btn btn-primary">
                                                </form>
                                            <?php }
                                        } else { ?>
                                            <p>This forget password link has been expired</p>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <form action="reset_password_process.php" method="post">
                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row">
                                                <h1>Reset password</h1>
                                            </div>
                                            <hr>
                                            <?php if (isset($_GET['error'])) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?= $_GET['error'] ?>
                                                </div>
                                            <?php } ?>
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <label class="form-label">Please enter staff No.</label>
                                                <input type="text" name="staff_no" id="staff_no" class="form-control" required />

                                            </div>

                                            <!-- Submit button -->
                                            <button name="password-reset-token" type="submit" class="btn btn-primary btn-block mb-4">
                                                Reset password
                                            </button>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
        </section>
        <!-- Section: Design Block -->

        <script>
            var check = function() {
                if (document.getElementById('password').value ==
                    document.getElementById('cpassword').value) {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'matching';
                } else {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'not matching';
                }
            }
        </script>
    </body>

    </html>
<?php } else {
    header("Location: index.php");
} ?>