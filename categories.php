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
	$pageTitle="Categories";
	include ('inc/head.php');
?>

	<div class="row content-area">
		<h1>Categories</h1>
		<div class="col-xs-5">
			<table class="table">
				<?php
					$result = mysqli_query($con, "SELECT * FROM categories ORDER BY category");
					while ($row = mysqli_fetch_array($result)) {
						echo '<tr>';
							echo '<td>' . $row['category'] . '</td>';
							echo '<td style="text-align:right;">';
									echo '<a href="handlers/delete-category.php?id=' . $row['id'] . '"><i class="fa fa-times" style="font-size:150%;"></i></a>';
							echo '</td>';
						echo '</tr>';
					}
				?>
			</table>
		</div>
		<div class="col-xs-5 col-xs-offset-1">
			<div class="section">
				<form action="handlers/add-category.php" method="POST">
					<h3>Add Category</h3>
					<div class="form-group">
						<label>Category Name:</label>
						<input class="form-control" type="text" name="newCategoryName" />
					</div>
					<input class="btn btn-primary" type="submit" name="submit" value="Add Category" />
				</form>
			</div>
		</div>
		
	</div>

<?php include ('inc/footer.php'); ?>