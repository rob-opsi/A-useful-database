<!DOCTYPE html>
<html lang="en">
<head>
<!--favicon-->
	<link rel="icon" type="image/png" href="images/favicon.png" />


<!--title-->
	<title>Title</title>

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

	<div class="log-in-box">
		<img class="logo" src="images/logo.png" alt="Samuel Thornhill" />
		<h3>Please Log In To Continue</h3>

		<form action="handlers/log-in.php" method="POST">
			<div class="form-group">
				<label for="Username">Username:</label>
				<input class="form-control" type="text" name="username" />
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input class="form-control" type="password" name="password" />
			</div>
			<input class="btn btn-primary" type="submit" name="submit" value="Log In" />
		</form>
	</div>

</div>
</body>
</html>