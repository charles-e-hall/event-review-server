<?php
	include_once 'header.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Apply</h2>
	</div>
	<form class="signup-form" method="post" action="inc/signup-inc.php">
		<input type="text" name="firstname" placeholder="First Name">
		<input type="text" name="lastname" placeholder="Last Name">
		<input type="text" name="address" placeholder="Street Address">
		<input type="text" name="city" placeholder="City">
		<input type="text" name="state" placeholder="State">
		<input type="text" name="zipcode" placeholder="Zip Code">
		<input type="text" name="email" placeholder="E-mail">
		<input type="password" name="pwd" placeholder="Password">
		<input type="checkbox" name="agree_to_terms"><label for="agree_to_terms">I Agree to the Terms</label>
		<button type="submit" name="submit">Apply</button>
	</form>
</section>

<?php
	include_once 'footer.php'
?>
