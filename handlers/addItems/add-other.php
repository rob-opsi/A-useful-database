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
		$location = addslashes($_POST['location']);

		if(empty($location)) {
			$location = 'NA';
		}

		if($categoryID&&$item_name) {
			include ('../../inc/db_con.php');
             $sql = "INSERT INTO items (id, item_name, item_category, genre, type, album, track, artist, location, borrowed, author, isbn) 
                VALUES ('', '$item_name', '$categoryID', '$genre', '$type', '', '', '', '$location', '0', '', '')";

                if (!mysqli_query($con,$sql))
                {
                    die('Error: ' . mysqli_error($con));
                }
                echo '<script> alert("Item Has Been Added!"); </script>';
                echo '<script> window.location.href = "../../add-item.php"; </script>';
		}
		else {
			echo '<script> alert("You Must Enter an Item Name!"); </script>';
			echo '<script> window.location.href = "../../add-item.php"; </script>';
		}
	}
?>