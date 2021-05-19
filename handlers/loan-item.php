<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_POST['submit'])) {
    	$itemID = $_POST['itemID'];
    	$borrowed_by = $_POST['borrowed_by'];
    	$date_borrowed = date("Y-m-d");

    	if($itemID&&$borrowed_by) {
    		include('../inc/db_con.php');
    		$sql = "INSERT INTO borrowed (id, title, borrowed_by, date_borrowed) 
                VALUES ('', '$itemID', '$borrowed_by', '$date_borrowed')";

                if (!mysqli_query($con,$sql))
                {
                    die('Error: borrowed table' . mysqli_error($con));
                }
            mysqli_query($con,"UPDATE items SET borrowed=1 WHERE id='$itemID'");
            mysqli_query($con,"UPDATE contacts SET borrowed=1 WHERE id='$borrowed_by'");
            echo '<script> alert("Item Has Been Loaned Out!"); </script>';
			echo '<script> window.location.href = "../item.php?id=' . $itemID . '"; </script>';
    	}

    	//need to make a record in borrowed table
    	//need to mark item as borrowed in items table
    	//need to show in contacts table that they have an item borrowed
    }
?>