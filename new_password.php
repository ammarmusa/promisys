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
                                        include "db.php";
                                        $email = $_GET['key'];
                                        $token = $_GET['token'];
                                        $query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM `users` WHERE `reset_link_token`='" . $token . "' and `email`='" . $email . "';"
                                        );
                                        $curDate = date("Y-m-d H:i:s");
                                        if (mysqli_num_rows($query) > 0) {
                                            $row = mysqli_fetch_array($query);
                                            if ($row['exp_date'] >= $curDate) { ?>
                                                <form action="update-forget-password.php" method="post">
                                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                    <input type="hidden" name="reset_link_token" value="<?php echo $token; ?>">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Password</label>
                                                        <input type="password" name='password' class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Confirm Password</label>
                                                        <input type="password" name='cpassword' class="form-control">
                                                    </div>
                                                    <input type="submit" name="new-password" class="btn btn-primary">
                                                </form>
                                            <?php }
                                        } else { ?>
                                            <p>This forget password link has been expired</p>
                                    <?php
                                        }
                                    } else {
                                        echo "Enter staff number page";
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
    </body>

    </html>
<?php } else {
    header("Location: index.php");
} ?>