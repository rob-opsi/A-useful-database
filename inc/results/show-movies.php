<?php
	$categoryNumber = $_GET['category'];
	$getCategoryName = mysqli_query($con, "SELECT * FROM categories WHERE id='$categoryNumber'");
	while ($row = mysqli_fetch_array($getCategoryName)) {
		$categoryName = $row['category'];
	}
?>

<h3>Your <?php echo $categoryName; ?>s</h3>
<table class="table table-items table-striped">
	<tr>
		<th>Title</th>
		<th>Genre</th>
		<th>Location</th>
	</tr>
	<?php 
		$result = mysqli_query($con, "SELECT * FROM items WHERE item_category='$categoryNumber' ORDER BY item_name ASC");
		while ($row = mysqli_fetch_array($result)) {
			$genreName = $row['genre'];//set variable to get genre name instead of number
			$typeName = $row['type'];
			$location = $row['location'];
			if($row['borrowed']>0) {

				echo '<tr style="font-weight:bold; color:red; background-color:#e1e1e1;" class="list" onclick="location.href=\'item.php?id=' . $row['id'] . '\'">';
					echo '<td>' . $row['item_name'] . '</td>';
					$getGenreName = mysqli_query($con, "SELECT * FROM movie_genre WHERE id='$genreName'");
					while ($row = mysqli_fetch_array($getGenreName)) {
						echo '<td>' . $row['genre_name'] . '</td>';
					}
					echo '<td>' . $location . '</td>';
					
				echo '</tr>';
			}
			else {
				echo '<tr class="list" onclick="location.href=\'item.php?id=' . $row['id'] . '\'">';
					echo '<td>' . $row['item_name'] . '</td>';
					$getGenreName = mysqli_query($con, "SELECT * FROM movie_genre WHERE id='$genreName'");
					while ($row = mysqli_fetch_array($getGenreName)) {
						echo '<td>' . $row['genre_name'] . '</td>';
					}
					
					echo '<td>' . $location . '</td>';
					
				echo '</tr>';
			}
		}
	?>
</table>