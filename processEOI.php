<!DOCTYPE html>
<html lang="en">
<head>
	<title>Process EOI</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Form Data Extraction Test</h1>
<?php
	// Recieves all the form fields
	include("formfields.php");

	// Validate all the inputs
	$errMsg = "";
	// Job reference number
	if (!preg_match("/[\w\d]{5}$/", $jobrefnum)) {
		$errMsg .= "<p>Job reference number must be exactly 5 alphanumeric characters.</p>";
	}

	// First name
	if ($first_name == "") {
		$errMsg .= "<p>You must enter your first name.</p>";
	} else if (!preg_match("/[A-Za-z\s]{1,20}$/", $first_name)) {
		$errMsg .= "<p>Only alpha characters allowed in your first name, to a max of 20.</p>";
	}

	// Surname
	if ($surname == "") {
		$errMsg .= "<p>You must enter your last name.</p>";
	} else if (!preg_match("/[A-Za-z\s]{1,20}$/", $surname)) {
		$errMsg .= "<p>Only alpha characters allowed in your surname, to a max of 20.</p>";
	}

	// Date of birth
	if ($dob == "") {
		$errMsg .= "<p>You must set a date of birth.</p>";
	}

	// Gender
	if ($gender == "") {
		$errMsg .= "<p>You must set a gender.</p>";
	}

	// Street address
	if ($address == "") {
		$errMsg .= "<p>You must enter your street address.</p>";
	} else if (!preg_match("/*{1,40}$/", $address)) {
		$errMsg .= "<p>A maximum of 40 characters are allowed in your street address.</p>";
	}

	// Suburb/town
	if ($town == "") {
		$errMsg .= "<p>You must enter your suburb/town.</p>";
	} else if (!preg_match("/*{1,40}$/", $town)) {
		$errMsg .= "<p>A maximum of 40 characters are allowed in your suburb/town.</p>";
	}

	// State

	// Postcode - TODO check if matches state
	if ($postcode == "") {
		$errMsg .= "<p>You must enter your postcode.</p>";
	} else if (!preg_match("/\d{4}$/", $postcode)) {
		$errMsg .= "<p>Postcode must be exact 4 digits and match state.</p>";
	}

	// Email address
	if ($email) {
		$errMsg .= "<p>You must enter your email address.</p>";
	} else if (!preg_match("/$/", $email)) {
		$errMsg .= "<p>Your email address must be a valid format.</p>";
	}

	// Phone number
	if ($phonenum) {
		$errMsg .= "<p>You must enter your phone number.</p>";
	} else if (!preg_match("/[\d\s]{8,12}$/", $phonenum)) {
		$errMsg .= "<p>Your phone number must be between 8 and 12 digits or spaces.</p>";
	}

	if ($errMsg != "") {
		echo "$errMsg";
	} else {
		// Send to database
	}
?>
</body>
</html>
