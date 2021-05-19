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

	<div class="row content-area">
		<h1>Browse Items</h1>

		<div class="col-xs-11 section">
			<?php
				if($_GET['category']==1||$_GET['category']==2||$_GET['category']==3) {
					include('inc/results/show-games.php');
				}
				if($_GET['category']==4||$_GET['category']==5) {
					include('inc/results/show-movies.php');
				}
				if($_GET['category']==6) {
					include('inc/results/show-music.php');
				}
				if($_GET['category']>6) {
					include('inc/results/show-other.php');
				}
			?>
		</div>
		
	</div>

<?php include ('inc/footer.php'); ?>