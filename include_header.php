<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/setia_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/datatable/datatables.min.css">
    <link rel="stylesheet" href="assets/style.css">

    <script src="assets/datatable/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="assets/dselect/dselect.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/datatable/datatables.min.js"></script>


    <title>SETIAGS</title>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark <?= $_SESSION['role'] === 'superuser' ? 'bg-warning' : 'bg-dark' ?> fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="index.php"><img src="assets/images/logo.png" alt="" srcset="" style="height: 40px; width: 150px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <form class="d-flex ms-auto my-3 my-lg-0">

                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="user_profile.php">Profile</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Notification</a></li> -->
                            <li>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <?php
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[2];
    ?>
    <div class="offcanvas offcanvas-start sidebar-nav <?= $_SESSION['role'] === 'superuser' ? 'bg-warning' : 'bg-dark' ?>" tabindex="-1" id="sidebar" style="font-size:1.1em">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav" style="font-size: 90%;">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            <p class="me-auto">Login as <?= $_SESSION['name']; ?> <br>Branch: <?= $_SESSION['branch']; ?></p>
                        </div>
                    </li>
                    <li>
                        <a href="index.php" class="nav-link px-3 <?php if ($first_part == "index.php") {
                                                                        echo "active";
                                                                    } else {
                                                                        echo "";
                                                                    } ?>">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <!-- <li>
                        <a href="clients.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Clients</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="quotation.php" class="nav-link px-3 <?php if ($first_part == "quotation.php" || $first_part == "quotation_view.php" || $first_part == "quotation_add.php" || $first_part == "quotation_edit.php") {
                                                                            echo "active";
                                                                        } else {
                                                                            echo "";
                                                                        } ?>">
                            <span class="me-2"><i class="bi bi-file-earmark-font"></i></span>
                            <span>Quotation</span>
                        </a>
                    </li>
                    <li>
                        <a href="securement.php" class="nav-link px-3 <?php if ($first_part == "securement.php" || $first_part == "securement_view.php" || $first_part == "securement_update.php") {
                                                                            echo "active";
                                                                        } else {
                                                                            echo "";
                                                                        } ?>">
                            <span class="me-2"><i class="bi bi-file-earmark-check"></i></span>
                            <span>Securement</span>
                        </a>
                    </li>

                    <li>
                        <a href="management.php" class="nav-link px-3 <?php if ($first_part == "management.php" || $first_part == "remark_create.php" || $first_part == "document_view.php" || $first_part == "project_management.php" || $first_part == "pm_remark.php") {
                                                                            echo "active";
                                                                        } else {
                                                                            echo "";
                                                                        } ?>">
                            <span class="me-2"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                            <span>Project Management</span>
                        </a>
                    </li>

                    <!-- <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
                            <span class="me-2"><i class="bi bi-layout-split"></i></span>
                            <span>Project Management</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse <?php if ($first_part == "calendar.php" || $first_part == "management.php" || $first_part == "remark_create.php" || $first_part == "document_view.php" || $first_part == "project_management.php" || $first_part == "pm_remark.php" || $first_part == "document_view.php") {
                                                    echo "show";
                                                } else {
                                                    echo "";
                                                } ?>" id="layouts">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="management.php" class="nav-link px-3 <?php if ($first_part == "management.php" || $first_part == "remark_create.php" || $first_part == "project_management.php" || $first_part == "pm_remark.php" || $first_part == "document_view.php") {
                                                                                        echo "active";
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?>">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Project List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                    <li>
                        <a href="project_delivery.php" class="nav-link px-3 <?php if ($first_part == "project_delivery.php" || $first_part == "invoice_view.php") {
                                                                                echo "active";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                            <span class="me-2"><i class="bi bi-cash-stack"></i></span>
                            <span>Payment Collection</span>
                        </a>
                    </li>

                    <li>
                        <a href="form_list.php" class="nav-link px-3 <?php if ($first_part == "form_list.php") {
                                                                            echo "active";
                                                                        } else {
                                                                            echo "";
                                                                        } ?>">
                            <span class="me-2"><i class="bi bi-file-earmark-pdf"></i></span>
                            <span>Form</span>
                        </a>
                    </li>

                    <li>
                        <a href="inquiry.php" class="nav-link px-3 <?php if ($first_part == "inquiry.php") {
                                                                        echo "active";
                                                                    } else {
                                                                        echo "";
                                                                    } ?>">
                            <span class="me-2"><i class="bi bi-gear"></i></span>
                            <span>Inquiry</span>
                        </a>
                    </li>

                    <?php
                    if ($_SESSION['special'] == 'true') {
                    ?>
                        <li>
                            <a href="admin_staff.php" class="nav-link px-3 <?php if ($first_part == "admin_staff.php" || $first_part == "admin_view_staff.php" || $first_part == "staff_add.php" || $first_part == "staff_edit.php" || $first_part == "add_contract_partner.php" || $first_part == "contract_partner_view.php") {
                                                                                echo "active";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                                <span class="me-2"><i class="bi bi-people"></i></span>
                                <span>Staff</span>
                            </a>
                        </li>
                        <li>
                            <a href="notification.php" class="nav-link px-3 <?php if ($first_part == "notification.php") {
                                                                                echo "active";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                                <span class="me-2"><i class="bi bi-bell"></i></span>
                                <span>Notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="system_log.php" class="nav-link px-3 <?php if ($first_part == "system_log.php") {
                                                                                echo "active";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                                <span class="me-2"><i class="bi bi-list-columns-reverse"></i></span>
                                <span>System Log</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['role'] === 'superuser') {
                    ?>
                        <li>
                            <a href="manage_user.php" class="nav-link px-3 <?php if ($first_part == "manage_user.php") {
                                                                                echo "active";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                                <span class="me-2"><i class="bi bi-people"></i></span>
                                <span>Manage User</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <!-- <li>
                        <a href="admin_staff.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Staffs</span>
                        </a>
                    </li> -->
                </ul>
            </nav>
        </div>
    </div>
    <!-- offcanvas -->
    <!-- Main -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">