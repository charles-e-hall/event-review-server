<?php

if (isset($_POST['submit'])) {
	session_start();
	include_once 'db-inc.php';
	$email = mysqli_real_escape_string($_POST['email']);
	$pwd = mysqli_real_escape_string($_POST['pwd']);

	$email = $_POST['email'];
	$pwd = $_POST['pwd'];

	

	if (empty($email) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE email='$email';";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($pwd, $row['passwd']);
				if ($pwdCheck == false) {
					$_SESSION['u_name'] = $row['username'];
					$_SESSION['u_firstname'] = $row['first_name'];
					$_SESSION['u_email'] = $row['email'];
					$username = $_SESSION['u_name'];
					$sql = "INSERT INTO logins (username, login_datetime, success) VALUES ('$username', NOW(), 'N');";
					mysqli_query($conn, $sql);
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($pwdCheck == true) {
					
					$_SESSION['u_name'] = $row['username'];
					$_SESSION['u_firstname'] = $row['first_name'];
					$_SESSION['u_email'] = $row['email'];
					$username = $_SESSION['u_name'];
					$sql = "INSERT INTO logins (username, login_datetime, success) VALUES ('$username', NOW(), 'Y');";
					mysqli_query($conn, $sql);
					header("Location: ../dashboard.php?login=success");
				}
			}
		}
	}

} else {
	header("Location: ../index.php?login=error");
}