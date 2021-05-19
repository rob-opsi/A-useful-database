<?php
	$loggedIn = $_SESSION['username'];
	$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$loggedIn'");
	while ($row = mysqli_fetch_array($result)) {
		$name = $row['name'];
		$id = $row['id'];
		$un = $row['username'];
		$password = $row['password'];
	}
?>