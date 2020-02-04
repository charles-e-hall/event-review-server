<?php
	session_start();

	if (!isset($_SESSION['u_name'])) {
		session_unset();
		session_destroy();
		header("Location: index.php");
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>ANSI, Inc.</title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<header>
	<div class="page-header">
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
			</ul>
			<div class="nav-login">
				<a href="account.php"><?php echo $_SESSION['u_firstname']; ?></a>
				<form method="post" action="inc/logout-inc.php">
					<button type="submit" name="submit">Logout</button>
				</form>

			</div>
		</div>
	</nav>
	</div>
</header>