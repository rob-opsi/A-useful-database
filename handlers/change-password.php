<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }
	if(isset($_POST['submit'])) {
		$currentPassword = addslashes($_POST['currentPassword']);
		$newPassword = addslashes($_POST['newPassword']);
		$confirmNewPassword = addslashes($_POST['confirmNewPassword']);

		if($currentPassword&&$newPassword&&$confirmNewPassword) {
			include ('../inc/db_con.php');
			$loggedIn = $_SESSION['username'];
			$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$loggedIn'");
			while ($row = mysqli_fetch_array($result)) {
				$dbPassword = $row['password'];
			}
			if ($currentPassword===$dbPassword) {

				if ($newPassword==$confirmNewPassword) {
					mysqli_query($con,"UPDATE users SET password='$newPassword' WHERE username = '$loggedIn'");
					echo '<script> alert("Your Password Has Been Updated!"); </script>';
					echo '<script> window.location.href = "../index.php"; </script>';
				}
				else {
					echo '<script> alert("Your Passwords Did Not Match!"); </script>';
					echo '<script> window.location.href = "../index.php"; </script>';
				}
			}
			else {
				echo '<script> alert("Your Password Was Incorrect!"); </script>';
				echo '<script> window.location.href = "../index.php"; </script>';
			}
		}
		else {
			echo '<script> alert("You Must Enter All Fields!"); </script>';
			echo '<script> window.location.href = "../index.php"; </script>';
		}
	}
?>