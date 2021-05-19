<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_POST['submit'])) {
    	$contactID = $_POST['contactID'];
    	include ('../inc/db_con.php');
    	mysqli_query($con,"DELETE FROM contacts WHERE id='$contactID'");
    	echo '<script> alert("Contact Has Been Deleted!"); </script>';
		echo '<script> window.location.href = "../contacts.php"; </script>';
    }
?>