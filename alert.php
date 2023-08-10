<script src="assets/sweetalert2.js"></script>

<?php if (isset($_SESSION['message']) && $_SESSION['status_code'] != '') {
    echo "<script>
    Swal.fire(
    '" . $_SESSION['message'] . "',
    '',
    '" . $_SESSION['status_code'] . "'
    )</script>";
    unset($_SESSION['message']);
}
