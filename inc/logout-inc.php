<?php

include_once 'db-inc.php';
session_start();
$username = $_SESSION['u_name'];

$sql = "INSERT INTO logouts (username, logout_datetime) VALUES ('$username', NOW());";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {
	session_unset();
	session_destroy();
	header("Location: ../index.php?logout=true");
}