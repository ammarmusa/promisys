<?php
session_start();
include "db_conn.php";
include "alert.php";
if (isset($_SESSION['username']) && isset($_SESSION['shortform']) == '') {
?>
    <!DOCTYPE html>
    <link rel="shortcut icon" href="assets/images/setia_icon.png" type="image/x-icon">
    <html>

    <head>
        <title>Finishing registration</title>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Section: Design Block -->
        <section>
            <div class="container d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <form action="complete_uf_process.php" method="post">
                            <div class="card">
                                <h5 class="card-header">Please complete this registeration form.</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Registration form for <?= $_SESSION['username'] ?></h5>
                                    <hr>
                                    <div class="row mb-3">
                                        <input type="hidden" name="staff_no" value="<?= $_SESSION['username'] ?>">
                                        <div class="col-md-4 mb-3">
                                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full name" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Staff title" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input inputmode="numeric" oninput="this.value = this.value.replace(/\D+/g, '')" name="ic_num" id="" class="form-control" placeholder="Ic number" required>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <input type="email" name="email" id="" class="form-control" placeholder="Email address" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="text" name="initial" id="initial" class="form-control" placeholder="Staff initial" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="department" id="department" class="form-control" placeholder="Department" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <input type="password" name="password" id="password" class="form-control" onkeyup='check();' placeholder="Password" required>
                                            <input type="checkbox" class="form_control mt-2" onclick="myFunction()">Show Password
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="cpassword" id="confirm_password" class="form-control" onkeyup='check();' placeholder="Confirm password" required>
                                            <span id='message'></span>

                                        </div>
                                    </div>
                                    <button type="submit" name="complete_register" id="complete_register" disabled class="btn btn-primary">Submit form</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
        <script>
            function myFunction() {
                var x = document.getElementById("password");
                var y = document.getElementById("confirm_password");
                if (x.type === "password" && y.type === "password") {
                    x.type = "text";
                    y.type = "text";
                } else {
                    x.type = "password";
                    y.type = "password";
                }
            }

            var check = function() {
                if (document.getElementById('password').value ==
                    document.getElementById('confirm_password').value) {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Password matched!';
                    document.getElementById('complete_register').removeAttribute('disabled');
                } else {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Password does not matched!';
                    document.getElementById('complete_register').setAttribute('disabled', 'disabled');
                }
            }
        </script>
    </body>

    </html>
<?php
} else {
    echo "Form is completed please relogin";
}
