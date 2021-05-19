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


<?php
	if(isset($_GET['genre'])) {
		$genre = $_GET['genre'];
	}
	else {
		header("Location: index.php");
	}
?>


	<div class="row content-area">

		<h1 style="margin-left:15px;">Edit <?php echo $genre; ?> Genres</h1>

		<div class="col-xs-5">
			<table class="table">
				<?php
					if($genre=='Game') {
						$listGenres = mysqli_query($con, "SELECT * FROM game_genre ORDER BY genre_name");
						while ($row = mysqli_fetch_array($listGenres)) {
							echo '<tr>';
								echo '<td style="font-size:125%;">' . $row['genre_name'] . '</td>';
								echo '<td>';
									echo '<a href="handlers/delete-genre-game.php?id=' . $row['id'] . '"><i class="fa fa-times" style="font-size:150%;"></i></a>';
								echo '</td>';
							echo '</tr>';
						}						
					}
					if($genre=='Movie') {
						$listGenres = mysqli_query($con, "SELECT * FROM movie_genre ORDER BY genre_name");
						while ($row = mysqli_fetch_array($listGenres)) {
							echo '<tr>';
								echo '<td style="font-size:125%;">' . $row['genre_name'] . '</td>';
								echo '<td>';
									echo '<a href="handlers/delete-genre-movie.php?id=' . $row['id'] . '"><i class="fa fa-times" style="font-size:150%;"></i></a>';
								echo '</td>';
							echo '</tr>';
						}
					}
					if($genre=='Music') {
						$listGenres = mysqli_query($con, "SELECT * FROM music_genre ORDER BY genre_name");
						while ($row = mysqli_fetch_array($listGenres)) {
							echo '<tr>';
								echo '<td style="font-size:125%;">' . $row['genre_name'] . '</td>';
								echo '<td>';
									echo '<a href="handlers/delete-genre-music.php?id=' . $row['id'] . '"><i class="fa fa-times" style="font-size:150%;"></i></a>';
								echo '</td>';
							echo '</tr>';
						}
					}
					if($genre=='Book') {
						$listGenres = mysqli_query($con, "SELECT * FROM book_genre ORDER BY genre_name");
						while ($row = mysqli_fetch_array($listGenres)) {
							echo '<tr>';
								echo '<td style="font-size:125%;">' . $row['genre_name'] . '</td>';
								echo '<td>';
									echo '<a href="handlers/delete-genre-music.php?id=' . $row['id'] . '"><i class="fa fa-times" style="font-size:150%;"></i></a>';
								echo '</td>';
							echo '</tr>';
						}
					}
				?>
			</table>


		</div>
		<div class="col-xs-5 col-xs-offset-1">
			<div class="section">
				<h3>Add Genre</h3>
				<?php if($genre=='Game') { echo '<form action="handlers/add-genre-game.php" method="POST">'; } ?>
				<?php if($genre=='Movie') { echo '<form action="handlers/add-genre-movie.php" method="POST">'; } ?>
				<?php if($genre=='Music') { echo '<form action="handlers/add-genre-music.php" method="POST">'; } ?>
				<?php if($genre=='Book') { echo '<form action="handlers/add-book-music.php" method="POST">'; } ?>
					<div class="form-group">
						<label>Genre Name:</label>
						<input class="form-control" name="genre_name" required/>
					</div>
					<input class="btn btn-primary" name="submit" type="submit" value="Add Genre" />
				</form>
			</div>
		</div>
	</div>

<?php include ('inc/footer.php'); ?>