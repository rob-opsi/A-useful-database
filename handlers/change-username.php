<?php

	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_POST['submit'])) {
    	$currentPassword = addslashes($_POST['currentPassword']);
    	$userName = addslashes($_POST['currentUsername']);

    	if ($currentPassword&&$userName) {
    		include ('../inc/db_con.php');
			$loggedIn = $_SESSION['username'];
			$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$loggedIn'");
			while ($row = mysqli_fetch_array($result)) {
				$dbPassword = $row['password'];
			}
			if ($currentPassword===$dbPassword) {
				mysqli_query($con,"UPDATE users SET username='$userName' WHERE username = '$loggedIn'");
				$_SESSION['username']=$userName;
				echo '<script> alert("Your Username Has Been Updated!"); </script>';
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