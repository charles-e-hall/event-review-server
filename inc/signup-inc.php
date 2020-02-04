<?php

if (isset($_POST['submit'])) {
	
	include_once 'db-inc.php';

	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$username = $firstname." ".$lastname;
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?signup=email");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE username='$username';";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			header("Location: ../signup.php?signup=exists");
			exit();
		}
	}


/*
	$sql = "INSERT INTO users (first_name, last_name, email, username, acct_create_date, passwd) VALUES ($firstname, $lastname, $email, $username, NOW(), $pwd)";
*/
	$sql = "INSERT INTO users (first_name, last_name, email, username, acct_create_date, passwd) VALUES ('$firstname', '$lastname', '$email', '$username', NOW(), '$hashedPwd');";

	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . mysqli_error($conn);
	} else {
		echo "Success";
	}

	#$result = mysqli_query($conn, $sql);

	header("Location: ../welcome.php");


} else {
	header("Location: ../signup.php");
	exit();
}

