<?php
session_start();
include "../db_conn.php";

if (isset($_POST['staff_no']) && isset($_POST['password'])) {

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$staff_no = test_input($_POST['staff_no']);
	$password = test_input($_POST['password']);

	if (empty($staff_no)) {
		header("Location: ../login.php?error=Staff number is Required");
	} else if (empty($password)) {
		header("Location: ../login.php?error=Password is Required");
	} else {

		// Hashing the password
		$password = md5($password);

		$sql = "SELECT * FROM users WHERE staff_no='$staff_no' AND password='$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			// Check if form is incomplete
			$row = mysqli_fetch_assoc($result);
			if ($row['shortform'] == '') {
				$_SESSION['username'] = $row['username'];
				header("Location: ../complete_user_form.php");
			} else {

				if ($row['password'] === $password) {
					if ($row['status'] === 'Active') {
						$_SESSION['staff_no'] = $row['staff_no'];
						$get_branch = mysqli_query($conn, "SELECT branch FROM staff WHERE staff_number = '$staff_no'");
						while ($gb = mysqli_fetch_assoc($get_branch)) {
							$_SESSION['branch'] = $gb['branch'];
						}
						$_SESSION['name'] = $row['name'];
						$_SESSION['id'] = $row['id'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['shortform'] = $row['shortform'];
						$_SESSION['special'] = $row['special'];
						$user = $row['staff_no'];

						if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') {
							// $log_title = "Logged in";
							// $log_status = "Success";
							// $log_sql = "INSERT INTO log (log_title, log_user, log_status) VALUES ('$log_title','$user','$log_status')";
							// $log_result = mysqli_query($conn, $log_sql);
							header("Location: ../login.php");
						} else {
							header("Location: ../staff_dashboard.php");
						}
					} else {
						header("Location: ../login.php?error=Your account has been blocked by admin.");
					}
				} else {
					header("Location: ../login.php?error=Incorect User name or password");
				}
			}
		} else {
			header("Location: ../login.php?error=Incorect User name or password 2");
		}
	}
} else {
	header("Location: ../index.php");
}
