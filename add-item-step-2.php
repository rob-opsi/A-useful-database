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
			<p class="steps">Step 2 of 2</p>
			<?php
				$category = $_POST['category'];

				if($category==1||$category==2||$category==3) {
					include('inc/addItemWizard/game.php');
				}
				
				if($category==4||$category==5) {
					include('inc/addItemWizard/movie.php');
				}
				if($category==6) {
					include('inc/addItemWizard/music.php');
				}
				if($category>6) {
					include('inc/addItemWizard/book.php');
				}
				if($category>7) {
					include('inc/addItemWizard/other.php');
				}
			?>
		</div>
	</div>

<?php include ('inc/footer.php'); ?>