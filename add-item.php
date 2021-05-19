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
	$pageTitle="Add Item";
	include ('inc/head.php');
?>

	<div class="row content-area">

		<div class="col-xs-5">
			<p class="steps">Step 1 of 2</p>
			<h1>Add Item</h1>
			<h3>What category are we adding to?</h3>
			<form action="add-item-step-2.php" method="POST">
				<div class="form-group">
					<select class="form-control" name="category" required>
						<option value="">Choose One</option>
						<?php
							$categories = mysqli_query($con, "SELECT * FROM categories ORDER BY category");
							while ($row = mysqli_fetch_array($categories)) {
								echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
							}
						?>
					</select>
				</div>
				<button class="btn btn-success" type="submit" name="submit">Next <i class="fa fa-forward"></i></button>
			</form>
		</div>
	</div>

<?php include ('inc/footer.php'); ?>