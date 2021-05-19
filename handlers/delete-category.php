<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }

    if(isset($_GET['id'])) {
    	$category = $_GET['id'];

    	include ('../inc/db_con.php');

    	$getCategoryName = mysqli_query($con, "SELECT * FROM categories WHERE id='$category'");
    	while ($row = mysqli_fetch_array($getCategoryName)) {
    		$categoryName = $row['category'];
    	}

    	if ($category<8) {
    		echo '<script> alert("Can Not Delete ' . $categoryName . ' category!"); </script>';
			echo '<script> window.location.href = "../categories.php"; </script>';
    	}
    	else {
    		$result = mysqli_query($con, "SELECT * FROM items WHERE item_category = '$category'");
    		$numberOfRows = mysqli_num_rows($result);
    		if($numberOfRows==0) {
    			mysqli_query($con,"DELETE FROM categories WHERE id='$category'");
                echo '<script> alert("Category Has Been Deleted!"); </script>';
                echo '<script> window.location.href = "../categories.php"; </script>';
    		}
    		else {
    			echo '<script> alert("This category currently has items associated with it. Can not delete!"); </script>';
    			echo '<script> window.location.href = "../categories.php"; </script>';
    		}

    	}

    }

?>