<?php
// Validate all the Inputs
$errMsg = "";

if (!$DEBUG_LOCAL) {
	require_once ("settings.php");

	$conn = mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);

	if (!$conn) {
		$errMsg .= "<p>Database connection failure, cannot validate.</p>";
	} else {
		$Query = "SELECT * FROM eoi WHERE jobrefnum LIKE '$jobrefnum' AND email LIKE '$email'";

		$result = mysqli_query($conn, $Query);
		if ($result && mysqli_num_rows($result) > 0) {
			$errMsg .= "<p>You have already applied for this position.</p>";
		}
	}
}

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
	$errMsg .= "<p>Please select an option for gender.</p>";
}

// Street address
if ($address == "") {
	$errMsg .= "<p>You must enter your street address.</p>";
} else if (!preg_match("/^.{1,40}$/u", $address)) {
	$errMsg .= "<p>A maximum of 40 characters are allowed in your street address.</p>";
}

// Suburb/town
if ($town == "") {
	$errMsg .= "<p>You must enter your suburb/town.</p>";
} else if (!preg_match("/^.{1,40}$/u", $address)) {
	$errMsg .= "<p>A maximum of 40 characters are allowed in your suburb/town.</p>";
}

// Postcode
if ($postcode == "") {
	$errMsg .= "<p>You must enter your postcode.</p>";
} else if (!preg_match("/\d{4}$/", $postcode)) {
	$errMsg .= "<p>Postcode must be exact 4 digits and match state.</p>";
}
$arrpostcode = str_split($postcode);
$number=$arrpostcode[0];
switch ($number) {
	case "0":
		if ($state != "NT")
		$errMsg .= "Postcode does not match state";
		break;
	case "2":
		if ($state != "NSW")
		$errMsg .= "Postcode does not match state";
		break;
	case "3";
		if ($state != "VIC")
		$errMsg .= "Postcode does not match state";
		break;
	case "4";
		if ($state != "QLD")
		$errMsg .= "Postcode does not match state";
		break;
	case "5";
		if ($state != "SA")
		$errMsg .= "Postcode does not match state";
		break;
	case "6";
		if ($state != "WA")
		$errMsg .= "Postcode does not match state";
		break;
	case "7";
		if ($state != "TAS")
		$errMsg .= "Postcode does not match state";
		break;
	default:
		$errMsg .= "Postcode does not match state";
}

// Email address
if ($email == "") {
	$errMsg .= "<p>You must enter your email address.</p>";
} else if (!preg_match($pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
	$errMsg .= "<p>Your email address must be a valid format.</p>";
}

// Phone number
if ($phonenum == "") {
	$errMsg .= "<p>You must enter your phone number.</p>";
} else if (!preg_match("/[\d\s]{8,12}$/", $phonenum)) {
	$errMsg .= "<p>Your phone number must be between 8 and 12 digits or spaces.</p>";
}

// Other skills
if (isset($_POST["otherskillscb"]) && $otherskills == "") {
	$errMsg .= "<p>You must list your other skills if the box is checked</p>";
}
?>
