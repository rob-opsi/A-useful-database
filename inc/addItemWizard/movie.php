<?php
	$category = $_POST['category'];
	$getCategoryName = mysqli_query($con, "SELECT * FROM categories WHERE id='$category'");
	while ($row = mysqli_fetch_array($getCategoryName)) {
		$categoryName = $row['category'];
		$categoryID = $row['id'];
	}
?>
<h1>Add <?php echo $categoryName; ?></h1>

<form action="handlers/addItems/add-movie.php" method="POST">
	<input type="hidden" name="item_category" value="<?php echo $categoryID; ?>"/>
	<div class="form-group">
		<label>Title:</label>
		<input class="form-control" type="text" name="item_name" required/>
	</div>
	<div class="form-group">
		<label>Genre:</label>
		<select class="form-control" name="genre" required>
			<option value="">Choose A Genre</option>
			<?php 
				$movieGenres = mysqli_query($con, "SELECT * FROM movie_genre ORDER BY genre_name");
				//while there is a result, echo this out
				while ($row = mysqli_fetch_array($movieGenres)) {
					echo '<option value="' . $row['id'] . '">' . $row['genre_name'] . '</option>';
				}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Location:</label>
		<input class="form-control" name="location" type="text" />
	</div>
	<button class="btn btn-success" type="submit" name="submit">Add Movie <i class="fa fa-plus"></i></button>
</form>