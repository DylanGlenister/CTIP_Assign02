<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mocha - PHP Enhancements</title>
	<meta charset="utf-8">
	<meta name="author" content="Dylan Glenister">
	<meta name="description" content="The php enhancements page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, php, enhancements">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
<?php
		$title = "PHP Enhancements";
		include ("header.inc");
		include ("menu.inc");
		?>
	<main>
		<!-- Accounts -->
		<section>
			<h2>Accounts</h2>
			<p>You can make an admin account at <a href="./signup.php">signup.php</a> and then login at <a href="./login.php">login.php</a> to manage EOIs.</p>
		</section>
		<br>
		<!-- Sorting EOIs -->
		<section>
			<h2>Sorting EOIs</h2>
			<p>Information</p>
		</section>
		<!-- Resubmission Checking -->
		<section>
			<h2>Resubmission Checking</h2>
			<p>For the resubmission checking enhancement, we wanted to make sure no one was able to apply for the same position multiple times</p>
			<p>The way I chose to do it was to search the MySQL database for the job reference number and the email they submitted
				and it simply checks to see if anything comes back in the search. If there is something returned then it means there are copies and they are attempting to re-apply
				for the same position. If there is a match it simply goes into an ErrMsg which tells the user that they have already applied for this position.
				It is a simple enhancement but it stops people from bombarding the apply page and the database with duplicates. 
			</p>
		</section>
	</main>
	<?php
		$author = "Author: Dylan Glenister";
		include ("footer.inc");
		?>
</body>
</html>
