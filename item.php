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
	$pageTitle="Items";
	include ('inc/head.php');
?>
<?php 
//need to find the category this item belongs to so we can decide what to display
	$item = $_GET['id'];

	$result = mysqli_query($con, "SELECT * FROM items WHERE id='$item'");
	while ($row = mysqli_fetch_array($result)) {
		$category = $row['item_category'];
	}

?>
	<div class="row content-area">

		<div class="col-xs-11">
			<?php 
				if($category==1||$category==2||$category==3) {
					include('inc/results/single-game-info.php');
				}
				if($category==4||$category==5) {
					include('inc/results/single-movie-info.php');
				}
				if($category==6) {
					include('inc/results/single-music-info.php');
				}
				if($category==7) {
					include('inc/results/single-book-info.php');
				}
				if($category>7) {
					include('inc/results/single-other-info.php');
				}
			?>

		</div>
		
	</div>

<!--modals for edit, delte, and check in-->
<div class="deleteItem">
<h3>Delete <?php echo $title; ?></h3>
	<hr/>
	<p>Are you sure you want to delete this item?</p>
	<a class="btn btn-danger" style="margin-right:20px;" href="handlers/delete-item.php?id=<?php echo $item; ?>"><b>Delete</b></a>
	<a class="btn btn-primary" href="#" onclick="closeDeleteItem()"><b>Nevermind</b></a>
</div>

<div class="loanItem">
<img class="close" src="images/close.png" alt="Close" onclick="closeLoanItem()" />
<h3>Loan <?php echo $title; ?></h3>
	<hr/>
	<form action="handlers/loan-item.php" method="POST">
		<div class="form-group">
			<label>Who are you loaning this item to?</label>
			<input type="hidden" name="itemID" value="<?php echo $item; ?>" />
			<select class="form-control" name="borrowed_by" required>
				<option value="">Choose Contact</option>
				<?php 
					$result = mysqli_query($con, "SELECT * FROM contacts ORDER BY lname ASC");
					while ($row = mysqli_fetch_array($result)) {
						echo '<option value="' . $row['id'] . '">' . $row['lname'] . ', ' . $row['fname'] . '</option>';
					}
				?>
			</select>
		</div>
		<input class="btn btn-primary" type="submit" name="submit" value="Mark As Borrowed" />
	</form>
</div>



<div class="checkIn">
<img class="close" src="images/close.png" alt="Close" onclick="closeCheckIn()" />
<h3>Check <?php echo $title; ?> Back In</h3>
	<hr/>
	<p style="margin-bottom:20px;">Would you like to mark <?php echo $title; ?> as received?</p>
	<a class="btn btn-primary" style="margin-right:15px;" href="handlers/check-in.php?id=<?php echo $item; ?>">Check In</a>
	<a class="btn btn-warning" href="#" onclick="closeCheckIn()">Nevermind</a>
</div>



<div class="location-modal">
	<img class="close" src="images/close.png" alt="Close" onclick="closeLocationModal()" />
	<h3>Edit Location:</h3>
	<hr/>
	<form action="handlers/change-location.php" method="POST">
		<div class="form-group">
			<label>Location:</label>
			<input type="hidden" name="id" value="<?php echo $item; ?>" />
			<textarea class="form-control" name="location"><?php echo $location; ?></textarea>
		</div>
		<input type="submit" class="btn btn-primary" name="submit" value="Update Location" />
	</form>
</div>

<?php include ('inc/footer.php'); ?>