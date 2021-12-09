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
	$pageTitle="Address Book";
	include ('inc/head.php');
?>

	<div class="row content-area">
		<h1>Address Book</h1>

		<div style="margin-bottom:25px;" class="col-xs-11 section hideOnclick">
			<p class="dismiss"><a href="#" onclick="dismiss()">Dismiss</a></p>
			<p>Results are listed in alphebetical order by Last Name.</p>
		</div>

			<button class="btn-custom" onclick="addContact()">Add New Contact</button>

		<div style="margin-top:25px;" class="col-xs-11 section">
			<h2>Your Contacts</h2>
			<table class="table table-contact table-striped">
				<tr>
					<th>First Name:</th>
					<th>Last Name:</th>
					<th>City:</th>
					<th>Phone:</th>
					<th>Email:</th>
					<th class="check" style="text-align:center;">Borrowed Items?</th>
				</tr>
				
							<?php 
								include ('inc/db_con.php');
								$result = mysqli_query($con, "SELECT * FROM contacts ORDER BY lname ASC");
								while ($row = mysqli_fetch_array($result)) {
									echo '<tr class="list" onclick="location.href=\'contact.php?id=' . $row['id'] . '\'">';
										echo '<td>' . $row['fname'] . '</td>';
										echo '<td>' . $row['lname'] . '</td>';
										echo '<td>' . $row['city'] . '</td>';
										echo '<td>' . $row['phone'] . '</td>';
										echo '<td>' . $row['email'] . '</td>';
											echo '<td class="check">';
												if ($row['borrowed']>0) {
													echo '<i class="fa fa-check-square"></i>';
												}
											echo '</td>';
									echo '</tr>';
								}
							?>
				
			</table>
		</div>
		
	</div>




<div class="addContact">
	<div class="close2" onclick="closeAddContact()"><i class="fa fa-times-circle"></i></div>
	<div class="container">
		<h1 style="margin-top:40px;">Add New Contact</h1>
		<hr/>
		<form action="handlers/add-contact.php" method="POST">
			<div class="form-group">
				<label>First Name:</label>
				<input class="form-control" type="text" name="fname" />
			</div>
			<div class="form-group">
				<label>Last Name:</label>
				<input class="form-control" type="text" name="lname" />
			</div>
			<div class="form-group">
				<label>Phone Number:</label>
				<input class="form-control" type="text" name="phone" />
			</div>
			<div class="form-group">
				<label>Email Address:</label>
				<input class="form-control" type="text" name="email" />
			</div>
			<div class="form-group">
				<label>House Number:</label>
				<input class="form-control" type="text" name="house_number" />
			</div>
			<div class="form-group">
				<label>Town:</label>
				<input class="form-control" type="text" name="town" />
			</div>
			<div class="form-group">
				<label>City:</label>
				<input class="form-control" type="text" name="city" />
			</div>
			<div class="form-group">
				<label>Post Code:</label>
				<input class="form-control" type="text" name="post_code" />
			</div>
			<div class="form-group">
				<label>Notes:</label>
				<textarea class="form-control" style="height:125px;" name="notes"></textarea>
			</div>
			<input class="btn btn-lg btn-primary" type="submit" name="submit" value="Add Contact" />
		</form>
	</div>
</div>


<?php include ('inc/footer.php'); ?>
