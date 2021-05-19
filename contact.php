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
	$contactID = $_GET['id'];

	$result = mysqli_query($con, "SELECT * FROM contacts WHERE id='$contactID'");
	while ($row = mysqli_fetch_array($result)) {
		$fname = $row['fname'];
		$lname = $row['lname'];
		$email = $row['email'];
		$phone = $row['phone'];
		$house_number = $row['house_number'];
		$town = $row['town'];
		$city = $row['city'];
		$post_code = $row['post_code'];
		$borrowed = $row['borrowed'];
		$notes = $row['notes'];
	}
?>

	<div class="row content-area">
		<h1><?php echo $fname . ' ' . $lname; ?></h1>

		<h3><?php echo $house_number; ?></h3>
		<h3><?php echo $town . ', ' . $city . ' ' . $post_code; ?></h3>

		<div class="col-xs-11 section">
			<div class="row">
				<div class="col-xs-5">
					<p><i class="fa faIcon fa-phone-square"></i> <span class="blue-text"><?php echo $phone; ?></span></p>
				</div>
				<div class="col-xs-6">
					<p><i class="fa faIcon fa-envelope"></i> <span class="blue-text"><?php echo $email; ?></span></p>
				</div>
			</div>
		</div>

		<?php 
			if ($notes!=null) {
				echo '<div class="col-xs-11 section">';
					echo '<h3>Notes:</h3>';
					echo '<p>' . $notes . '</p>';
				echo '</div>';
			}
		?>

		<?php
			if ($borrowed>0) {
			$selectBorrowed = mysqli_query($con, "SELECT * FROM borrowed WHERE borrowed_by='$contactID' ORDER BY date_borrowed ASC");

			echo '<div class="col-xs-11">';
			echo '<h3>Items Borrowed</h3>';
				echo '<table class="table table-items">';
					echo '<tr>';
						echo '<th>Item Name</th>';
						echo '<th>Date Borrowed</th>';
					echo '</tr>';
						while ($row = mysqli_fetch_array($selectBorrowed)) {
							$titleNumber = $row['title'];
							$date_borrowed = $row['date_borrowed'];
							echo '<tr class="list" onclick="location.href=\'item.php?id=' . $titleNumber . '\'">';
							$getTitleName = mysqli_query($con, "SELECT * FROM items WHERE id='$titleNumber'");
							while ($row = mysqli_fetch_array($getTitleName)) {
								echo '<td>' . $row['item_name'] . '</td>';
							}
								echo '<td>' . $date_borrowed . '</td>';
							echo '</tr>';
						}
				echo '</table>';
			echo '</div>';
			}
		?>


		<div style="margin-top:15px;" class="col-xs-11">
			<button class="btn btn-lg btn-primary" style="margin-right:25px;" onclick="editContact()"><i class="fa fa-gears"></i> Edit</button>
			<button class="btn btn-lg btn-danger" onclick="deleteContact()"><i class="fa fa-times"></i> Delete</button>
			<button class="btn btn-lg btn-default" style="float:right;" onclick="location.href='contacts.php'"><i class="fa fa-backward"></i> Back To Contacts</button>
		</div>
		
	</div>

<div class="deleteContact">
	<h3 style="color:red;">Delete <?php echo $fname . ' ' . $lname; ?></h3>
	<hr/>
	<?php 
		if($borrowed!=0) {
			echo '<p style="color:red; font-size:125%;">I\'m sorry. You can not delete a contact if they currently have items borrowed. You must first check the item back in to delete this contact.</p>';
			echo '<a href="#" class="btn btn-default" onclick="closeDeleteContact()">Close</a>';
		}
		else {
			echo '<p>Are you sure you want to permanently delete this contact?</p>';
			echo '<form action="handlers/delete-contact.php" method="POST">';
				echo '<a class="btn btn-primary" href="#" onclick="closeDeleteContact()">Nevermind</a>';
				echo '<input type="hidden" name="contactID" value="' . $contactID . '"/>';
				echo '<button style="float:left; margin-right:40px;" class="btn btn-danger" type="submit" name="submit">Yes, Delete</button>';
			echo '</form>';
		}
	?>
</div>


<div class="editContact">
	<div class="close2" onclick="closeEditContact()"><i class="fa fa-times-circle"></i></div>
	<div class="container">
		<h1 style="margin-top:40px;">Edit Contact Information</h1>
		<hr/>
		<form action="handlers/edit-contact.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $contactID; ?>" />
			<div class="form-group">
				<label>First Name:</label>
				<input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>" />
			</div>
			<div class="form-group">
				<label>Last Name:</label>
				<input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>" />
			</div>
			<div class="form-group">
				<label>Phone Number:</label>
				<input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" />
			</div>
			<div class="form-group">
				<label>Email Address:</label>
				<input class="form-control" type="text" name="email" value="<?php echo $email; ?>" />
			</div>
			<div class="form-group">
				<label>House Number:</label>
				<input class="form-control" type="text" name="house_number" value="<?php echo $house_number; ?>" />
			</div>
			<div class="form-group">
				<label>Town:</label>
				<input class="form-control" type="text" name="town" value="<?php echo $town; ?>" />
			</div>
			<div class="form-group">
				<label>City:</label>
				<input class="form-control" type="text" name="city" value="<?php echo $city; ?>" />
			</div>
			<div class="form-group">
				<label>Post Code:</label>
				<input class="form-control" type="text" name="post_code" value="<?php echo $post_code; ?>" />
			</div>
			<div class="form-group">
				<label>Notes:</label>
				<textarea class="form-control" style="height:125px;" name="notes"><?php echo $notes; ?></textarea>
			</div>
			<input class="btn btn-lg btn-primary" type="submit" name="submit" value="Update Record" />
		</form>
	</div>
</div>

<?php include ('inc/footer.php'); ?>