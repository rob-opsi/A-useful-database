<?php
	$item = $_GET['id'];

	$result = mysqli_query($con, "SELECT * FROM items WHERE id='$item'");
	while ($row = mysqli_fetch_array($result)) {
		$title = $row['item_name'];
		$item_category = $row['item_category'];
		$genreNumber = $row['genre'];
		$typeNumber = $row['type'];
		$location = $row['location'];
		$borrowed = $row['borrowed'];
		$isbn = $row['isbn'];
		$author = $row['author'];
		$loanedOut = false;
	}
	$getCategoryName = mysqli_query($con, "SELECT * FROM categories WHERE id='$item_category'");
	while ($row = mysqli_fetch_array($getCategoryName)) {
		$category = $row['category'];
	}
	$getCategory = mysqli_query($con, "SELECT * FROM book_genre WHERE id='$genreNumber'");
	while ($row = mysqli_fetch_array($getCategory)) {
		$genreName = $row['genre_name'];
	}
	$getType = mysqli_query($con, "SELECT * FROM game_type WHERE id='$typeNumber'");
	while ($row = mysqli_fetch_array($getType)) {
		$typeName = $row['type_name'];
	}
	if($borrowed>0) {
		$loanedOut = true;
		$getLoanedToNumber = mysqli_query($con, "SELECT * FROM borrowed WHERE title='$item'");
		while ($row = mysqli_fetch_array($getLoanedToNumber)) {
			$loanedToNumber = $row['borrowed_by'];
			$dateBorrowed = $row['date_borrowed'];
		}

		$getLoanedToName = mysqli_query($con, "SELECT * FROM contacts WHERE id='$loanedToNumber'");
		while ($row = mysqli_fetch_array($getLoanedToName)) {
			$ltfname = $row['fname'];
			$ltlname = $row['lname'];
			$loanedTo = $ltfname . ' ' . $ltlname; 
		}
	}
?>
<h1 style="margin-left:15px;"><?php echo $title; ?></h1>

<div class="col-xs-7">
<?php 
	if($loanedOut==true) {
		echo '<div class="section" style="color:white; background-color:red; border-radius:5px; text-align:center; font-size:130%;">';
			echo '<i class="fa fa-ban" style="float:left; font-size:150%;"></i><p style="padding:0px;">This item is currently loaned out!</p>';
		echo '</div>';
	}
?>
	<table class="table" style="margin-top:15px;">
		<tr>
			<td class="lg-bold">Author:</td>
			<td class="lg"><?php echo $author; ?></td>
			<td></td>
		</tr>
		<tr>
			<td class="lg-bold">ISBN:</td>
			<td class="lg"><?php echo $isbn; ?></td>
			<td></td>
		</tr>
		<tr>
			<td class="lg-bold">Genre:</td>
			<td class="lg"><?php echo $genreName; ?></td>
			<td></td>
		</tr>
		<tr>
			<td class="lg-bold">Type:</td>
			<td class="lg"><?php echo $typeName; ?></td>
			<td></td>
		</tr>
		<tr>
			<td class="lg-bold">Location:</td>
			<td class="lg"><?php echo $location; ?></td>
			<td><a href="#" onclick="locationModal()">Edit</a></td>
		</tr>
	</table>
	<?php 
		if($loanedOut==true) {
			echo '<div class="section" style="margin-bottom:25px;"><p>You loaned this item to ' . $loanedTo . ' on ' . $dateBorrowed . '.</p></div>';
		}
	?>

<!--if the item isn't on loan, display a delete button-->
<?php
	if($loanedOut==false) {
		echo '<button class="btn btn-danger" onclick="deleteItem()"><i class="fa fa-times"></i> Delete</button>';
		echo '<button class="btn btn-success" style="margin-left:20px;" onclick="loanItem()"><i class="fa fa-external-link"></i>  Loan This Item</button>';
	}
	else {
		echo '<button class="btn btn-success" onclick="checkIn()"><i class="fa fa-cart-plus"></i> Check Item Back In</button>';
	}
?>

<button class="btn btn-default" style="float:right;" onclick="location.href='items.php?category=<?php echo $item_category; ?>'"><i class="fa fa-backward"></i>  Other <?php echo $category; ?></button>
</div>
