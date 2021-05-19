<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_POST['submit'])) {
    	$id = $_POST['id'];
    	$location = addslashes($_POST['location']);

    	include ('../inc/db_con.php');
    	mysqli_query($con,"UPDATE items SET location='$location' WHERE id = '$id'");
		echo '<script> alert("Location Updated!"); </script>';
		echo '<script> window.location.href = "../item.php?id=' . $id . '"; </script>';
    }
?>