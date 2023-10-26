<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta name="author" content="Dylan Glenister">
	<meta name="description" content="The login page for managers for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, login">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<!-- HEADER -->
<?php
	$title = "Login";
	include ("header.inc");
	// NAV
	include ("menu.inc");
	// MAIN
	echo "<main>";

	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$self = htmlspecialchars($_SERVER["PHP_SELF"]);
		echo "
		<form method='post' action='$self'>
		<fieldset>
		<legend>Login</legend>
		<label for='username'>Username: </label>
		<input type='text' name='username' id='username' value=''>
			<br>
			<label for='password'>Password: </label>
			<input type='text' name='password' id='password' value=''>
			<br><br>
			<input type='submit' value='Login'>
			<input type='reset' value='clear'>
			</fieldset>
			</form>";
	} else {
		include("settings.php");
		// Open connection to database
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

		if (!$conn) {
			echo "<h2>Database connection failure</h2>";
		} else {
			// Create the table if it does not exist
			$table_exists = mysqli_query($conn, "SELECT 1 FROM $account_table LIMIT 1");
			if (!$table_exists) {
				$make_table = "CREATE TABLE `$sql_db`. `$account_table` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(40) NOT NULL , `password` VARCHAR(64) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
				$make_table = mysqli_query($conn, $make_table);
				if (!$make_table) {
					echo "<p>Table does not exist, failed to make table</p>";
				} else {
					echo "<p>Table did not exist and was created</p>";
				}
			}

			if ($table_exists || $make_table) {
				if (isset($_POST["username"])) $username = sanitise_input($_POST["username"]);
				if (isset($_POST["password"])) $password = sanitise_input($_POST["password"]);

				$check = "SELECT * FROM $account_table WHERE username = '$username'";
				$result = mysqli_query($conn, $check);
				if ($result) {
					$userdata = mysqli_fetch_assoc($result);
					$userpass = $userdata['password'];
					echo "'$password' == '$userpass'";
					if ($password == $userpass) {
						header("location: manage.php?verified=yes");
					}
				} else {
					echo "<p>Failed connection</p>";
				}
			}

			mysqli_close($conn);
		}
	}

	echo "</main>";
	// FOOTER
		$author = "Author: Dylan Glenister";
		include ("footer.inc");
?>
</body>
</html>
