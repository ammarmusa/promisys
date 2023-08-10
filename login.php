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
            <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
                <div class="container">
                    <div class="row gx-lg-5 align-items-center">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <img src="assets/images/logo.png" alt="" srcset="" style="height: 100px; width: 380px">
                            <h1 class="my-5 display-3 fw-bold ls-tight">
                                WELCOME TO <br />
                                <span class="text-primary" style="font-size: 50%">Project Management System (PROMISYS)</span>
                            </h1>
                            
                        </div>

                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="card">
                                <div class="card-body py-5 px-md-5">
                                    <form action="php/check-login.php" method="post">
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row">
                                            <h1>Login</h1>
                                        </div>
                                        <hr>
                                        <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $_GET['error'] ?>
                                            </div>
                                        <?php } ?>
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Staff No.</label>
                                            <input type="text" name="staff_no" id="staff_no" class="form-control" required />

                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required />

                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Login
                                        </button>
                                        <p>Forgot password? Reset <a href="reset_password.php">here.</a></p>
                                    </form>
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