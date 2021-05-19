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

<div class="row content-area">
	<div class="col-xs-8">
		<h1>Search Results</h1>
		<hr/>
		<table class="table table-items">
			<tr>
				<th>Title</th>
				<th>Category</th>
				<th>Location</th>
			</tr>
			<?php 
				if(isset($_POST['term'])) {
					$term = addslashes($_POST['term']);

					$results = mysqli_query($con, "SELECT * FROM items WHERE item_name LIKE '%" . $term . "%'");
					$totalItems = mysqli_num_rows($results);
					while ($row = mysqli_fetch_array($results)) {
						$id = $row['id'];
						$item_name = $row['item_name'];
						$location = $row['location'];
						$categoryID = $row['item_category'];

						echo '<tr class="list" onclick="location.href=\'item.php?id=' . $id . '\'">';
							echo '<td>' . $item_name . '</td>';
							

						$getCategory = mysqli_query($con, "SELECT * FROM categories WHERE id='$categoryID'");
						while ($row = mysqli_fetch_array($getCategory)) {
							$category = $row['category'];
							echo '<td>' . $category . '</td>';
						}
							echo '<td>' . $location . '</td>';
						echo '</tr>';
					}
					if($totalItems==0) {
						echo '<tr>';
							echo '<td colspan="3" style="text-align:center; height:150px; line-height:150px; font-weight:bold; color:red; font-size:150%;">Sorry, No Results Were Found</td>';
						echo '</tr>';
					}


				}
				else {
					echo '<script> window.location.href = "index.php"; </script>';
				}
			?>
		</table>
	</div>
</div>


<?php include ('inc/footer.php'); ?>