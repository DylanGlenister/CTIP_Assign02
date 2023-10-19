<!DOCTYPE html>
<html lang="en">
<head>
	<title>Process EOI</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Form Data Extraction Test</h1>
<?php
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
		echo "<p>";
		echo "jobrefnum: $jobrefnum<br>";
		echo "first_name: $first_name<br>";
		echo "surname: $surname<br>";
		echo "dob: $dob<br>";
		echo "gender: $gender<br>";
		echo "address: $address<br>";
		echo "town: $town<br>";
		echo "state: $state<br>";
		echo "postcode: $postcode<br>";
		echo "email: $email<br>";
		echo "phonenum: $phonenum<br>";
		echo "skil";
		print_array($skills);
		echo "otherskills: $otherskills";
		echo "</p>";

		// Send to database
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

		# Create the table if it does not exist
		$table_exists = mysqli_query($conn, "SELECT 1 FROM $sql_table LIMIT 1");
		if (!$table_exists) {
			$make_table = "CREATE TABLE `$sql_db`.`$sql_table` (`id` INT NOT NULL AUTO_INCREMENT , `jobrefnum` CHAR(5) NOT NULL , `first_name` VARCHAR(20) NOT NULL , `surname` VARCHAR(20) NOT NULL , `dob` DATE NOT NULL , `gender` VARCHAR(7) NOT NULL , `address` VARCHAR(40) NOT NULL , `town` VARCHAR(40) NOT NULL , `state` CHAR(3) NOT NULL , `postcode` CHAR(4) NOT NULL , `email` VARCHAR(40) NOT NULL , `phonenum` VARCHAR(12) NOT NULL , `skills` VARCHAR(108) NULL , `otherskills` TEXT NULL , `status` ENUM('new','current','final') NOT NULL DEFAULT 'new', PRIMARY KEY (`id`)) ENGINE = InnoDB;";
			mysqli_query($conn, $make_table);
			echo "<p>Table did not exist and was created</p>";
		}

		if (!$conn) {
			echo "<p>Database connection failure</p>";
		} else {
			$skillstr = array_to_string($skills);
			$query = "INSERT INTO $sql_table (jobrefnum, first_name, surname, dob, gender, address, town, state, postcode, email, phonenum, skills, otherskills) VALUES ('$jobrefnum', '$first_name', '$surname', '$dob' ,'$gender', '$address', '$town', '$state', '$postcode', '$email', '$phonenum', '$skillstr', '$otherskills')";
			echo "<p>Query: $query</p>";
			echo "<p>Skillstr: $skillstr</p>";
			$result = mysqli_query($conn, $query);
			mysqli_close($conn);
		}
	}
?>
</body>
</html>
