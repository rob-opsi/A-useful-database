<?php

	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_GET['id'])) {
    	$borrowed_title = $_GET['id'];
    	include('../inc/db_con.php');

    	//get borrowed by
    	$getBorrowedBy = mysqli_query($con, "SELECT * FROM borrowed WHERE title='$borrowed_title'");
    	while ($row = mysqli_fetch_array($getBorrowedBy)) {
    		$borrowed_by = $row['borrowed_by'];//this is the id of the contact
    	}

    	//update item as not borrowed
    	mysqli_query($con,"UPDATE items SET borrowed=0 WHERE id = '$borrowed_title'");

    	//delte borrowed record
    	mysqli_query($con,"DELETE FROM borrowed WHERE title='$borrowed_title'");

    	//check borrowed records to see if any more items are out
    	$check = mysqli_query($con, "SELECT * FROM borrowed WHERE borrowed_by='$borrowed_by'");
    	$itemsBorrowed = mysqli_num_rows($check);

    	if($itemsBorrowed==0) {
    		mysqli_query($con,"UPDATE contacts SET borrowed=0 WHERE id = '$borrowed_by'");
    	}
    	echo '<script> alert("Item Was Checked Back In Successfully!"); </script>';
		echo '<script> window.location.href = "../item.php?id=' . $borrowed_title . '"; </script>';
    }



//need to check borrowed and see if any more items are out to this person
	//if more are out, we are done
		//if no more are out, we need to update contacts as not borrowed

?>