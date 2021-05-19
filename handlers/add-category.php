<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_POST['submit'])) {

    	if(!empty($_POST['newCategoryName'])) {
    		include ('../inc/db_con.php');
    		$category = addslashes($_POST['newCategoryName']);
    		$sql = "INSERT INTO categories (id, category) 
                VALUES ('', '$category')";
            if (!mysqli_query($con,$sql)) {
            	die('Error: ' . mysqli_error($con));
            }
            if($category=='porn'||$category=='Porn'||$category=='PORN') {
                echo '<script> alert("Don\'t worry! Your secret is safe with me. Porn category created."); </script>';
                echo '<script> window.location.href = "../categories.php"; </script>';
            }
            echo '<script> alert("Category Added!"); </script>';
            echo '<script> window.location.href = "../categories.php"; </script>';
    	}
    	else {
    		echo '<script> alert("You Must Enter A Category Name!"); </script>';
            echo '<script> window.location.href = "../categories.php"; </script>';
    	}
    }
?>