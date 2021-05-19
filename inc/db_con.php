<?php
	$con=mysqli_connect("localhost", "root", "", "media_inventory");			
	if (mysqli_connect_errno())
	{	
		echo "<h3 style='color:red;'>An Error Occurred</h3>";	
	}
?>