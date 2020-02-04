<?php
	include_once 'header.php';
	/*
	if (isset($_GET['signup'])) {
		if ($_GET['signup'] == 'empty') {
			echo "<h3>Please Fill Out All Fields</h3>";
		} elseif ($_GET['signup'] == 'email') {
			echo "<h3>Please enter a valid email</h3>"
		} elseif ($_GET['signup'] == 'exists') {
			echo "<h3>This username or email already exists.  Please choose a different username/email or login to your account.</h3>"
		}
	}
	*/
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Register</h2>
	</div>
	<form class="signup-form" method="post" action="inc/signup-inc.php">
		<input type="text" name="firstname" placeholder="First Name">
		<input type="text" name="lastname" placeholder="Last Name">
		<input type="text" name="email" placeholder="E-mail">
		<input type="password" name="pwd" placeholder="Password">
		<button type="submit" name="submit">Register</button>
	</form>
</section>

<?php
	include_once 'footer.php'
?>
