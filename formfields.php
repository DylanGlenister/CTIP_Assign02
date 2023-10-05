<?php
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// Validate that form data was sent over
if (isset($_POST["jobrefnum"])){
	$jobrefnum = sanitise_input($_POST["jobrefnum"]);
} else {
	// Redirect to the apply page if the user attempts to directly access this page
	header("location: apply.php");
}
if (isset($_POST["first_name"])) sanitise_input($first_name = $_POST["first_name"]);
if (isset($_POST["surname"])) sanitise_input($surname = $_POST["surname"]);
if (isset($_POST["dob"])) sanitise_input($dob = $_POST["dob"]);
if (isset($_POST["gender"])) sanitise_input($gender = $_POST["gender"]);
if (isset($_POST["address"])) sanitise_input($address = $_POST["address"]);
if (isset($_POST["town"])) sanitise_input($town = $_POST["town"]);
if (isset($_POST["state"])) sanitise_input($state = $_POST["state"]);
if (isset($_POST["postcode"])) sanitise_input($postcode = $_POST["postcode"]);
if (isset($_POST["email"])) sanitise_input($email = $_POST["email"]);
if (isset($_POST["phonenum"])) sanitise_input($phonenum = $_POST["phonenum"]);
// Optional skills
$skills = array();
if (isset($_POST["computer_literacy"])) array_push($skills, "computer_literacy");
if (isset($_POST["problem_solving"])) array_push($skills, "problem_solving");
if (isset($_POST["teamwork"])) array_push($skills, "teamwork");
if (isset($_POST["communication"])) array_push($skills, "communication");
if (isset($_POST["interpersonal"])) array_push($skills, "interpersonal");
if (isset($_POST["learning"])) array_push($skills, "learning");
if (isset($_POST["english_literacy"])) array_push($skills, "english_literacy");
if (isset($_POST["mathematics"])) array_push($skills, "mathematics");
if (isset($_POST["otherskills"])) array_push($skills, "otherskills");
?>
