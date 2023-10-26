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
			<p>You can select which column is used to order the query table in the<a href="./manage.php">manage.php</a>page.
			When searching for the query, you select a header, from a drop down menu, that will order the entire table in relation to that column.
			A switch/case statement checks the selected option from the drop down and compares it to the name of each column.
			If they are equal then a query that orders the table by the corresponding column will be used.</p>
		</section>
		<!-- Resubmission Checking -->
		<section>
			<h2>Resubmission Checking</h2>
			<p>Information</p>
		</section>
	</main>
	<?php
		$author = "Author: Dylan Glenister";
		include ("footer.inc");
		?>
</body>
</html>
