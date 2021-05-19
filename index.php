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
	$pageTitle="Samuel Thornhill's Dashboard";
	include ('inc/head.php');
?>
<?php
	//get number of reconrds for items total
	$query2 = mysqli_query($con, "SELECT * FROM items");	
	$totalItems = mysqli_num_rows($query2);
	//get number of records for contacts
	$query3 = mysqli_query($con, "SELECT * FROM contacts");
	$totalContacts = mysqli_num_rows($query3);
	//get number of records for borrowed items
	$query4 = mysqli_query($con, "SELECT * FROM borrowed");
	$totalBorrowed = mysqli_num_rows($query4);
?>

	<div class="row content-area">
		<h1 style="margin-left:15px;">Dashboard Home</h1>
		<div class="col-sm-5">
			<div class="section">
				<h3>At A Glance</h3>
				<hr/>
				<p style="color:#666;">Items Logged <span class="dynamic"><a href="choose-category.php"><?php echo $totalItems; ?></a></span></p>
				<p style="color:#666;">Items Loaned <span class="dynamic"><a href="borrowed.php"><?php echo $totalBorrowed; ?></a></span></p>
				<p style="color:#666;">You have <span class="dynamic"><a href="contacts.php"><?php echo $totalContacts; ?></a></span> Contacts in your address book</p>
			</div>
			<div class="section" style="margin-top:25px;">
				<h3>Account Details</h3>
				<table class="table">
					<tr>
						<td><b>Name:</b></td>
						<td><?php echo $name; ?></td>
						<td><a href="#" onclick="changeName()">Edit</a></td>
					</tr>
					<tr>
						<td><b>Username:</b></td>
						<td><?php echo $un; ?></td>
						<td><a href="#" onclick="changeUsername()">Edit</a></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align:center; padding-top:25px;"><a href="#" onclick="changePassword()">Change Password</a></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-sm-5 col-sm-offset-1 section">
			<h3>Quick Contact</h3>
			<hr/>
			<form action="handlers/add-quick-contact.php" method="POST">
				<div class="form-group">
					<label for="First Name">First Name:*</label>
					<input class="form-control" type="text" name="fname"/>
				</div>
				<div class="form-group">
					<label for="Last Name">Last Name:*</label>
					<input class="form-control" type="text" name="lname"/>
				</div>
				<div class="form-group">
					<label for="Email">Email Address:</label>
					<input class="form-control" type="email" name="email"/>
				</div>
				<div class="form-group">
					<label for="Phone">Phone:</label>
					<input class="form-control" type="text" name="phone"/>
				</div>
				<input class="btn btn-primary" type="submit" name="submit" value="Add Contact" />
				<p class="disclaimer">*Note: You can add more details later</p>
			</form>
		</div>
	</div>



	<div class="changePassword">
	<img class="close" src="images/close.png" alt="Close" onclick="closePassword()" />
		<h3>Change Your Password</h3>
		<hr/>
		<form action="handlers/change-password.php" method="POST">
			<div class="form-group">
				<label>Current Passwrod:</label>
				<input class="form-control" name="currentPassword" type="password"/>
			</div>
			<div class="form-group">
				<label>New Password:</label>
				<input class="form-control" name="newPassword" type="password"/>
			</div>
			<div class="form-group">
				<label>Confirm New Passwrod:</label>
				<input class="form-control" name="confirmNewPassword" type="password"/>
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Change Password" />
		</form>
	</div>

	<div class="changeUsername">
	<img class="close" src="images/close.png" alt="Close" onclick="closeUsername()" />
		<h3>Edit Your Username</h3>
		<hr/>
		<form action="handlers/change-username.php" method="POST">
			<div class="form-group">
				<label>Username:</label>
				<input class="form-control" name="currentUsername" type="text" value="<?php echo $un; ?>" />
			</div>
			<div class="form-group">
				<label>Please Enter Your Password:</label>
				<input class="form-control" name="currentPassword" type="password" autocomplete="off" />
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Save Changes" />
		</form>
	</div>

	<div class="changeName">
	<img class="close" src="images/close.png" alt="Close" onclick="closeName()" />
		<h3>Edit Display Name</h3>
		<hr/>
		<form action="handlers/change-name.php" method="POST">
			<div class="form-group">
				<label>Name:</label>
				<input class="form-control" name="currentName" type="text" value="<?php echo $name; ?>" />
			</div>
			<div class="form-group">
				<label>Please Enter Your Password:</label>
				<input class="form-control" name="currentPassword" type="password" autocomplete="off" />
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Save Changes" />
		</form>
	</div>

<?php include ('inc/footer.php'); ?>