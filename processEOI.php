<!DOCTYPE html>
<html lang="en">
<head>
	<title>Process EOI</title>
	<meta name="author" content="Dylan Glenister">
	<meta name="description" content="The processEOI page for mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, processEOI">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<!-- HEADER -->
<?php
		$title = "Application Confirmation";
		include ("header.inc");
	// NAV
		include ("menu.inc");
	// MAIN
	echo "<main id='eoi'>";

	function print_array($array) {
		$length = sizeof($array);
		foreach ($array as $i => $value) {
			if ($i == $length - 1) {
				echo "$value<br>";
			} else {
				echo "$value, ";
			}
		}
	}

	function array_to_string($array) {
		$length = sizeof($array);
		$result = "";
		foreach ($array as $i => $value) {
			if ($i == $length - 1) {
				$result .= $value;
			} else {
				$result .= "$value,";
			}
		}
		return $result;
	}

	// Recieves all the form fields
	include("formfields.php");
	//include("validate_input.php");
	include_once("settings.php");

	$errMsg = "";

	if ($errMsg != "") {
		echo "$errMsg";
	} else {
		// Open connection to database
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

		if (!$conn) {
			echo "<h2>Database connection failure</h2>";
		} else {
			// Create the table if it does not exist
			$table_exists = mysqli_query($conn, "SELECT 1 FROM $sql_table LIMIT 1");
			if (!$table_exists) {
				$make_table = "CREATE TABLE `$sql_db`.`$sql_table` (`id` INT NOT NULL AUTO_INCREMENT , `jobrefnum` CHAR(5) NOT NULL , `first_name` VARCHAR(20) NOT NULL , `surname` VARCHAR(20) NOT NULL , `dob` DATE NOT NULL , `gender` VARCHAR(7) NOT NULL , `address` VARCHAR(40) NOT NULL , `town` VARCHAR(40) NOT NULL , `state` CHAR(3) NOT NULL , `postcode` CHAR(4) NOT NULL , `email` VARCHAR(40) NOT NULL , `phonenum` VARCHAR(12) NOT NULL , `skills` VARCHAR(108) NULL , `otherskills` TEXT NULL , `status` ENUM('new','current','final') NOT NULL DEFAULT 'new', PRIMARY KEY (`id`)) ENGINE = InnoDB;";
				$make_table = mysqli_query($conn, $make_table);
				if (!$make_table) {
					echo "<p>Table does not exist, failed to make table</p>";
				} else {
					echo "<p>Table did not exist and was created</p>";
				}
			}

			// Insert the new data into the table
			$skillstr = array_to_string($skills);
			$query = "INSERT INTO $sql_table (jobrefnum, first_name, surname, dob, gender, address, town, state, postcode, email, phonenum, skills, otherskills) VALUES ('$jobrefnum', '$first_name', '$surname', '$dob' ,'$gender', '$address', '$town', '$state', '$postcode', '$email', '$phonenum', '$skillstr', '$otherskills')";
			//echo "<p>Query: $query</p>";
			//echo "<p>Skillstr: $skillstr</p>";
			$result = mysqli_query($conn, $query);

			if (!$result) {
				echo "<h3>The sql query failed to submit for some reason.\n$query</h3>";
			} else {
				// Somehow we need to get the id number
				$id = mysqli_insert_id($conn);
				echo "<h4>Your application has been successfully submitted!</h4>";
				echo "<p>Your unique application id is: $id</p>";
			}
			mysqli_close($conn);
		}

		// Display to the user the data they entered
		echo "<table><thead><tr><th colspan='2'>Your entered data:</th></tr></thead><tbody>";
		echo "<tr><td>jobrefnum:</td><td>$jobrefnum</td></tr>";
		echo "<tr><td>first_name:</td><td>$first_name</td></tr>";
		echo "<tr><td>surname:</td><td>$surname</td></tr>";
		echo "<tr><td>dob:</td><td>$dob</td></tr>";
		echo "<tr><td>gender:</td><td>$gender</td></tr>";
		echo "<tr><td>address:</td><td>$address</td></tr>";
		echo "<tr><td>town:</td><td>$town</td></tr>";
		echo "<tr><td>state:</td><td>$state</td></tr>";
		echo "<tr><td>postcode:</td><td>$postcode</td></tr>";
		echo "<tr><td>email:</td><td>$email</td></tr>";
		echo "<tr><td>phonenum:</td><td>$phonenum</td></tr>";
		echo "<tr><td>skills:</td><td>";
		print_array($skills);
		echo "</td></tr>";
		echo "<tr><td>otherskills:</td><td>$otherskills</td></tr>";
		echo "</tbody></table>";
	}
	echo "</main>";
	// FOOTER
		$author = "Author: Dylan Glenister";
		include ("footer.inc");
?>
</body>
</html>
