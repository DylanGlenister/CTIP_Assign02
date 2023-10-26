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
			<p>The account is stored in the sql database in a separate table called admins. The password is stored as plaintext not for a lack of consideration for security but because the functions to implement hashing don't work on the version of php used on the mercury server (see: <a href="https://www.php.net/manual/en/function.password-hash.php">password_hash()</a>)</p>
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
		<br>
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
		$author = "Author: Dylan, Melusi, Sam";
		include ("footer.inc");
		?>
</body>
</html>
