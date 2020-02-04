<?php
	include_once 'login-header.php';
	include_once 'inc/eventdb-inc.php';

?>


<section class="main-container">
	<div class="main-wrapper">
		<h3>
			<?php
				if (!isset($_SESSION['u_name'])) {
					header("Location: index.php");
				} else {
					echo $_SESSION['u_firstname'].", Welcome to Your Dashboard";
				}
			?>
		</h3>
		
		
		<div class="table-wrapper-scroll-y">
			<h4>Your Events</h4>
		<?php
		$user = $_SESSION['u_name'];
		$user = str_replace(array("\r\n", "\n", "\r"), '', $user);
		$sql = "SELECT * FROM all_events WHERE owner_uname='$user';";
		$result = mysqli_query($conn, $sql);

		

		echo '<div class="container">
		<div class="table-responsive">
		<table class="table table-bordered table-striped" max-height:200px;>
			<thead>
			<tr>
				<td>Event ID</td>
				<td>Your Score</td>
				<td>Reviewers Scores</td>
				<td>Action</td>
			</tr>
			</thead>
			<tbody>';
			
			
			
			while ($row = mysqli_fetch_array($result)) {
				
				if ($row['validate_score'] != NULL && $row['confirm_score'] != NULL) {
					$confirm = "YES";
				} else {
					$confirm = "NO";
				}

				if (is_null($row['owner_score'])) {
					$score = "None";
				} else {
					$score = $row['owner_score'];
				}
				$event_id = $row['event_id'];
				
				echo "<tr><td>".$event_id."</td><td>".$score."</td><td>".$confirm."</td>";
				if ($score == "None") {
					$buttonName = "Review";
					echo '<td><form method="POST" action="review-event.php"><button type="submit" name="review" class="btn btn-danger">'.$buttonName.'</button><form>';
				} else {
					$buttonName = "Edit";
					echo '<td><form method="POST" action="review-event.php"><button type="submit" name="review" class="btn btn-info">'.$buttonName.'</button><form>';
				}
			}
			
			echo '</tbody>
				</table>
				</div>';

			?>
		</div>
		<br>
		<h4>Events to Confirm for Others</h4>
		<div class="scrollable">
		<?php
		$user = $_SESSION['u_name'];
		$user = str_replace(array("\r\n", "\n", "\r"), '', $user);
		$sql = "SELECT * FROM all_events WHERE validate_uname='$user' OR confirm_uname='$user';";
		$result = mysqli_query($conn, $sql);

		

		echo '<div class="container">
		<table class="table">
			<tr>
				<td>Event ID</td>
				<td>Owners Score</td>
				<td>Your Score</td>
				<td>Action</td>
			</tr>';
			
			
			
			while ($row = mysqli_fetch_array($result)) {

				$event_id = $row['event_id'];
				echo "<tr><td>".$event_id."</td>";
				if (is_null($row['owner_score'])) {
					$ownerScore = "None";
				} else {
					$ownerScore = $row['owner_score'];
				}
				echo "<td>".$ownerScore."</td>";

				if ($row['validate_uname'] == $user) {
					if ($row['validate_score'] == NULL) {
						$score = "None";
					} else {
						$score = $row['validate_score'];
					}
					echo "<td>".$score."</td>";
				} elseif ($row['confirm_uname'] == $user) {
					if (is_null($row['confirm_score'])) {
						$score = "None";
					} else {
						$score = $row['confirm_score'];
					}
					echo "<td>".$score."</td>";
				}
				
				
				echo '<td><form method="POST" action="review-event.php"><button type="submit" name="review" class="btn btn-danger">Review</button><form>';
			}
			
			echo '</table>';

			?>
		</div>
		</div>
	</div>
</section>


<?php
	include_once 'footer.php';
?>