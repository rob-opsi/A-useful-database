<?php
	//make sure submit button has been pressed
	if(isset($_POST['submit'])) { 
		//store variables
		$username = addslashes($_POST['username']);
		$password = addslashes($_POST['password']);
		//make sure both the username and the password have been entered
		if ($username&&$password) {
			//connect to the database with this include
			include('../inc/db_con.php');
			//look at the usernames in the database
			$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
			//if username exists, do this
			if (mysqli_num_rows($result) > 0) {
				//select the row where username is present and store db usnername and password in variables
				while ($row = mysqli_fetch_array($result)) {
					$dbuser = $row['username'];
					$dbpassword = $row['password'];
				}
				//if form data is the same as db data, set session and log in
				if ($username==$dbuser&&$password==$dbpassword) {
					session_start();
					$_SESSION['username']=$username;
					header('Location: ../index.php');
				}
				//if form data is different from db data, echo this
				else {
					echo '<h1 style="text-align:center; margin-top:50px; color:red;">Invalid Username or Password</h1>';
					echo '<a style="margin-top:25px; text-align:center; display:block;" href="../log-in.php">Try Again</a>';
				}


			}
			//if username entered doesn't exist, echo this
			else {
				echo '<h1 style="text-align:center; margin-top:50px; color:red;">Invalid Username or Password</h1>';
				echo '<a style="margin-top:25px; text-align:center; display:block;" href="../log-in.php">Try Again</a>';
			}

		}
		//if username and password hasn't been entered, echo this
		else {
			echo '<h1 style="text-align:center; margin-top:50px; color:red;">You must enter a username and a password!</h1>';
			echo '<a style="margin-top:25px; text-align:center; display:block;" href="../log-in.php">Try Again</a>';
		}
	}
	//if submit button hasn't been pressed, redirect to the log in page
	else {
		header('Location: ../log-in.php');
	}

?>