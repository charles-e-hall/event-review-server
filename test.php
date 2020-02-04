<?php
	include_once 'login-header.php'

?>


<section class="main-container">
	<div class="main-wrapper">
		<h2>Test</h2>

		<table class="table">
			<tr>
				<td>First</td>
				<td>Second</td>
				<td>Third</td>
			</tr>
			<?php
			$test = array("FirstItem", "SecondItem", "ThirdItem");
			while ($row = $test) {
				echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
			}
			?>
		</table>

	</div>
</section>

<?php
	include_once 'footer.php'
?>
