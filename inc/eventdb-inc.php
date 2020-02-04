
<?php

$dbServername = "eeg.cpivbi1tmjzn.us-east-2.rds.amazonaws.com";
$dbPort = 3306;
$dbUsername = "charlie";
$dbPassword = "Standard01";
$dbName = "events";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName, $dbPort);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

#echo "This is a test echo";

?>