<?php
	
	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_POST['submit'])) {
    	$contactID = $_POST['id'];
    	$fname = addslashes($_POST['fname']);
    	$lname = addslashes($_POST['lname']);
    	$email = addslashes($_POST['email']);
    	$phone = addslashes($_POST['phone']);
    	$house_number = addslashes($_POST['house_number']);
    	$town = addslashes($_POST['town']);
    	$city = addslashes($_POST['city']);
    	$post_code = addslashes($_POST['post_code']);
    	$notes = addslashes($_POST['notes']);

    	include ('../inc/db_con.php');
    	
		mysqli_query($con,"UPDATE contacts SET fname='$fname', lname='$lname', email='$email', phone='$phone', house_number='$house_number', town='$town', city='$city', post_code='$post_code', notes='$notes' WHERE id = '$contactID'");

		echo '<script> alert("Record Has Been Updated!"); </script>';
		echo '<script> window.location.href = "../contact.php?id=' . $contactID . '"; </script>';
		
    }
?>