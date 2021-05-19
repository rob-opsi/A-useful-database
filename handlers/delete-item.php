<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_GET['id'])) {
    	$itemID = $_GET['id'];
    	include ('../inc/db_con.php');
    	mysqli_query($con,"DELETE FROM items WHERE id='$itemID'");
    	echo '<script> alert("Item Successfully Deleted!"); </script>';
        echo '<script> window.location.href = "../index.php"; </script>';
    }
    else {
    	echo '<script> alert("An Error Occurred!"); </script>';
        echo '<script> window.location.href = "../index.php"; </script>';
    }
?>