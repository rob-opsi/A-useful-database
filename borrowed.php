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
	$pageTitle="Borrowed Items";
	include ('inc/head.php');
?>

	<div class="row content-area">
		<h1>Borrowed Items</h1>

		<div class="col-xs-11 section">
			<h3>Listed By Date</h3>
			<table class="table table-items table-striped">
				<tr>
					<th>Title</th>
					<th>Loaned To</th>
					<th>Date Borrowed</th>
				</tr>
		<?php
			$result = mysqli_query($con, "SELECT * FROM borrowed ORDER BY date_borrowed ASC");
			while ($row = mysqli_fetch_array($result)) {
				$titleNumber = $row['title'];
				$borrowedByNumber = $row['borrowed_by'];
				$date_borrowed = $row['date_borrowed'];

				$getTitle = mysqli_query($con, "SELECT * FROM items WHERE id='$titleNumber'");
				while ($row = mysqli_fetch_array($getTitle)) {
					$title = $row['item_name'];
				}
				$getName = mysqli_query($con, "SELECT * FROM contacts WHERE id='$borrowedByNumber'");
				while ($row = mysqli_fetch_array($getName)) {
					$bbfname = $row['fname'];
					$bblname = $row['lname'];
				}
				$bb = $bbfname . ' ' . $bblname;
				echo '<tr class="list" onclick="location.href=\'contact.php?id='.  $borrowedByNumber . '\'" title="View ' . $bb  . ' \'s Information">';
					echo '<td>' . $title . '</td>';
					echo '<td>' . $bb . '</td>';
					echo '<td>' . $date_borrowed . '</td>';
				echo '</tr>';
			}
		?>
			</table>
		</div>
		
	</div>

<?php include ('inc/footer.php'); ?>