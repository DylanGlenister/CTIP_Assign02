<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mocha - Update Status</title>
	<meta charset="utf-8">
	<meta name="author" content="Melusi Ndebele">
	<meta name="description" content="The update EOI status page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, manage, EOI, Query, Update">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<?php
	$title = "Update EOI Status";
	include ("header.inc");
	require_once "settings.php";
	?>
	<main>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
			if(!$dbconn){
				echo "<h2>Database connection failure.</h2>";
			} else {
				$statusid = $_POST["status$_POST[id]"];
				$query = "UPDATE $sql_table SET status='$statusid' WHERE id='$_POST[id]'";
				$result = mysqli_query($dbconn, $query);
				if (!$result) {
					echo "<h2>There is a problem with" , $query, "</h2>";
				} else {
					echo "<h2>Status updated successfully.</h2>";
				}
				mysqli_close($dbconn);
			}
		} else {
			// Redirect if they shouldn't be here
			header("location: index.php");
		}
	?>
	<p>Return to <a href="./manage.php?verified=yes">manage EOI</a> page.</p>
	</main>
	<?php
		$author = "Melusi Ndebele";
		include ("footer.inc");
	?>
</body>
</html>
