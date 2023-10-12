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
