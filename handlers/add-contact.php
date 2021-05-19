<?php
	
	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_POST['submit'])) {
    	$fname = addslashes($_POST['fname']);
    	$lname = addslashes($_POST['lname']);
    	$email = addslashes($_POST['email']);
    	$phone = addslashes($_POST['phone']);
    	$house_number = addslashes($_POST['house_number']);
    	$town = addslashes($_POST['town']);
    	$city = addslashes($_POST['city']);
    	$post_code = addslashes($_POST['post_code']);
    	$notes = addslashes($_POST['notes']);

        if(empty($house_number)) {
            $house_number = "Not Provided";
        }
        if(empty($town)) {
            $town = "Not Provided";
        }
        if(empty($email)) {
            $email = "Not Provided";
        }
        if(empty($phone)) {
            $phone = "Not Provided";
        }
        if(empty($city)) {
            $city = "Not Provided";
        }

        if($fname&&$lname) {
        	include ('../inc/db_con.php');
            $sql = "INSERT INTO contacts (id, fname, lname, email, phone, house_number, town, city, post_code, borrowed, notes) 
                VALUES ('', '$fname', '$lname', '$email', '$phone', '$house_number', '$town', '$city', '$post_code', '0', '$notes')";

                if (!mysqli_query($con,$sql))
                {
                    die('Error: ' . mysqli_error($con));
                }
                $count = mysqli_query($con, "SELECT * FROM contacts");
                $totalContacts = mysqli_num_rows($count);
                if($totalContacts==25) {
                    echo '<script> alert("Congratulations! You\'ve just added your 25th contact! You seem to be getting the hang of this."); </script>';
                    echo '<script> window.location.href = "../contacts.php"; </script>';
                }
                if($fname=='Heather'||$fname=='Beth'||$fname=='Bethany'||$fname=='Sue'||$fname=='Rachael'||$fname=='Angie'||$fname=='Kate') {
                    echo '<script> alert("Look at you, adding chicks! Contact added."); </script>';
                    echo '<script> window.location.href = "../contacts.php"; </script>';
                }
                echo '<script> alert("Contact Has Been Added!"); </script>';
                echo '<script> window.location.href = "../contacts.php"; </script>';
        }
        else {
            echo '<script> alert("You Must Enter A First and Last Name!"); </script>';
            echo '<script> window.location.href = "../contacts.php"; </script>';
        }
    }
?>