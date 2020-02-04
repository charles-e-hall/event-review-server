<?php

	include_once 'header.php';

?>

<section class="main-container">
	<div class="main-wrapper">
		<?php
			if (isset($_SESSION['u_name'])) {
				echo "<h2>WELCOME BACK</h2>";
			} else {
				echo "<h2>Thank you for registering.</h2>";
			}
		?>

		
	</div>
</section>

<?php
	include_once 'footer.php'
?>