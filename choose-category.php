<?php 
	if(!isset($_SESSION)) { 
        session_start(); 
    }
	if (!empty($_SESSION['username'])) {
	}
	else {
		header('Location: log-in.php');
	}
	include ('inc/db_con.php');
	include ('inc/account-info.php');
	$pageTitle="Choose Category";
	include ('inc/head.php');
?>

	<div class="row content-area">
		<h1>Browse Items</h1>

		<div class="col-xs-8 section">
			<h3>Please Select A Category</h3>
			<table class="table table-categories table-striped">
				<?php
					// include('inc/db_con.php');
					//select everything from the categories table
					$categoryButtons = mysqli_query($con, "SELECT * FROM categories ORDER BY category");
					//while there is a result, echo this out
					while ($row = mysqli_fetch_array($categoryButtons)) {
						$idNum = $row['id'];
						echo '<tr class="list" onclick="location.href=\'items.php?category=' . $row['id'] . '\'">';
							echo '<td>' . $row['category'] . '</td>';
							$getItems = mysqli_query($con, "SELECT * FROM items WHERE item_category='$idNum'");
							$numberOfItems = mysqli_num_rows($getItems);
							echo '<td><span class="badge">' . $numberOfItems . '</span></td>';
						echo '</tr>';
					}
				?>
			</table>
		</div>
		
	</div>

<?php include ('inc/footer.php'); ?>