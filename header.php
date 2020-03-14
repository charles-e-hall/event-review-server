<?php
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Kodifi.ai</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Kodifi</a></li>
			</ul>
			<div class="nav-login">
				<form method="post" action="inc/login-inc.php">
					<input type="text" name="email" placeholder="E-mail">
					<input type="password" name="pwd" placeholder="Password">
					<button type="submit" name="submit">Login</button>
					<a href="signup.php">Register</a>
				</form>

			</div>
		</div>
	</nav>
</header>