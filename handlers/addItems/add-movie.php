<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }
	if (!empty($_SESSION['username'])) {
	}
	else {
		header('Location: ../../log-in.php');
	}
	if(isset($_POST['submit'])) {
		$categoryID = $_POST['item_category'];
		$item_name = addslashes($_POST['item_name']);
		$genre = $_POST['genre'];
		$location = addslashes($_POST['location']);

		if(empty($location)) {
			$location = 'NA';
		}

		if($categoryID&&$item_name&&$genre) {
			include ('../../inc/db_con.php');
             $sql = "INSERT INTO items (id, item_name, item_category, genre, type, album, track, artist, location, borrowed, author, isbn) 
                VALUES ('', '$item_name', '$categoryID', '$genre', '$type', '', '', '', '$location', '0', '', '')";

                if (!mysqli_query($con,$sql))
                {
                    die('Error: ' . mysqli_error($con));
                }
                if($item_name=='Pulp Fiction') {
                	echo '<script> alert("Great taste in movies! Pulp Fiction is the BEST movie of all time! It has been added."); </script>';
                	echo '<script> window.location.href = "../../add-item.php"; </script>';
                }
                if ($item_name=='A Clockwork Orange') {
                	echo '<script> alert("I never did really get this movie. It has been added though. I don\'t judge."); </script>';
                	echo '<script> window.location.href = "../../add-item.php"; </script>';
                }
               
                echo '<script> alert("Movie Has Been Added!"); </script>';
                echo '<script> window.location.href = "../../add-item.php"; </script>';
		}
		else {
			echo '<script> alert("You Must Enter Name and Genre!"); </script>';
			echo '<script> window.location.href = "../../add-item.php"; </script>';
		}
	}
?>