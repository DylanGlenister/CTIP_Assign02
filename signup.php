<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
	<meta name="author" content="Dylan Glenister">
	<meta name="description" content="the Signup page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, Signup">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<!-- HEADER -->
<?php
	$title = "Signup";
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
			<br>
			<label for='confpass'>Confirm password: </label>
			<input type='text' name='confpass' id='confpass' value=''>
			<br>";
		echo "<p>Username is 'admin', password is 'admin'</p>";
		$passmatch = isset($_GET["passmatch"]);
		if ($passmatch && $passmatch == "false") {
			echo "Passwords must match!";
		}
		$userexists = isset($_GET["userexists"]);
		if ($userexists && $userexists == "true") {
			echo "The user already exists!";
		}
		echo "<br>
			<input type='submit' value='Signup'>
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
				if (isset($_POST["confpass"])) $confpass = sanitise_input($_POST["confpass"]);

				// If the passwords don't match, bring user back
				if ($password != $confpass) {
					header("location: signup.php?passmatch=false");
				}

				$query = "INSERT INTO $account_table (username, password) VALUES ('$username', '$password')";
				$result = mysqli_query($conn, $query);
				if ($result) {
					echo "<p>Account created!</p>";
				} else {
					echo "<p>Failed to create user</p>";
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
