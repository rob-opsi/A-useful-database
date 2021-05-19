<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }

    if(isset($_POST['submit'])) {
    	if(!empty($_POST['genre_name'])) {
    		include ('../inc/db_con.php');
    		$genre_name = addslashes($_POST['genre_name']);
    		$sql = "INSERT INTO movie_genre (id, genre_name) 
                VALUES ('', '$genre_name')";

                if (!mysqli_query($con,$sql))
                {
                    die('Error: ' . mysqli_error($con));
                }
                echo '<script> alert("Genre Has Been Added!"); </script>';
                echo '<script> window.location.href = "../genre.php?genre=Movie"; </script>';
    	}
    }
?>