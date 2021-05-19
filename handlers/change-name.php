<?php

	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_POST['submit'])) {
    	$currentPassword = addslashes($_POST['currentPassword']);
    	$displayName = addslashes($_POST['currentName']);

    	if ($currentPassword&&$displayName) {
    		include ('../inc/db_con.php');
			$loggedIn = $_SESSION['username'];
			$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$loggedIn'");
			while ($row = mysqli_fetch_array($result)) {
				$dbPassword = $row['password'];
			}
			if ($currentPassword===$dbPassword) {
				mysqli_query($con,"UPDATE users SET name='$displayName' WHERE username = '$loggedIn'");
				echo '<script> alert("Your Display Name Has Been Updated!"); </script>';
				echo '<script> window.location.href = "../index.php"; </script>';
			}
			else {
				echo '<script> alert("Your Entered An Incorrect Password!"); </script>';
				echo '<script> window.location.href = "../index.php"; </script>';
			}
    	}
    	else {
    		echo '<script> alert("You Must Enter All Fields!"); </script>';
			echo '<script> window.location.href = "../index.php"; </script>';
    	}
    }
?>