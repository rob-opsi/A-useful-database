<!DOCTYPE html>
<html lang="en">
<head>
<!--favicon-->
	<link rel="icon" type="image/png" href="images/favicon.png" />


<!--title-->
	<title><?php echo $pageTitle; ?></title>

<!--meta tags-->
	<meta name="developer" content="JD Simpkins - jdsimpkins1981@gmail.com" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Stylesheets-->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/main.css" />

<!--Fonts-->
	<link rel="stylesheet" href="css/font-awesome.min.css" />
<!--javascript-->
	<script src="js/jquery-1.11.2.min.js"></script><!--jquery-->
	<script src="js/bootstrap.min.js"></script><!--bootstrap-->


</head>
<body>

<div class="container-fluid">
	<header>
		<p class="log-out"><img style="max-height:30px; margin-right:10px;" src="images/logo.png" alt="Samuel Thornhill" />Hi, <?php echo $name; ?>! &nbsp; &nbsp; &nbsp; <a href="handlers/log-out.php">Log Out</a></p>

		<div class="row">
			<div class="col-xs-3">
				<p style="">
					<form action="search-results.php" method="POST">
						<div class="input-group">
							<input type="text" class="form-control" name="term" placeholder="Search For..." />
							<span class="input-group-btn">
								<button class="btn btn-default" style="margin-top:-20px;" type="submit" name="submit"><i class="fa fa-search" style="font-weight:bold; padding-left:5px; padding-right:5px; font-size:125%;"></i></button>
							</span>
						</div>
					</form>
				</p>
			</div>
		</div>

		<!-- <p class="welcome" style="float:left"><?php echo $name; ?>'s Media Inventory</p> -->
	</header>
	

	<div class="navigation">
		<ul>
			<li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
			<li><a href="contacts.php"><i class="fa fa-book"></i> Address Book</a></li>
			<li><a href="choose-category.php"><i class="fa fa-eye"></i> Browse Items</a></li>
			<li><a href="add-item.php"><i class="fa fa-plus-square"></i> Add Items</a></li>
			<li><a href="borrowed.php"><i class="fa fa-exchange"></i> Borrowed Items</a></li>
			<li><a href="categories.php"><i class="fa fa-tags"></i> Categories</a></li>
			<li><a href="genre.php?genre=Game"><i class="fa fa-gamepad"></i> Game Genres</a></li>
			<li><a href="genre.php?genre=Movie"><i class="fa fa-video-camera"></i> Movie Genres</a></li>
			<li><a href="genre.php?genre=Music"><i class="fa fa-volume-up"></i> Music Genres</a></li>
			<li><a href="genre.php?genre=Book"><i class="fa fa-book"></i> Book Genres</a></li>
			<li><a style="color:red;" href="handlers/log-out.php"><i style="color:red;" class="fa fa-user-times"></i> Log out</a></li>
		</ul>
	</div>