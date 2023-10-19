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
if (isset($_POST["first_name"])) $first_name = sanitise_input($_POST["first_name"]);
if (isset($_POST["surname"])) $surname = sanitise_input($_POST["surname"]);
if (isset($_POST["dob"])) $dob = sanitise_input($_POST["dob"]);
if (isset($_POST["gender"])) {
	$gender = sanitise_input($_POST["gender"]);
} else {
	$gender = "";
}
if (isset($_POST["address"])) $address = sanitise_input($_POST["address"]);
if (isset($_POST["town"])) $town = sanitise_input($_POST["town"]);
if (isset($_POST["state"])) $state = sanitise_input($_POST["state"]);
if (isset($_POST["postcode"])) $postcode = sanitise_input($_POST["postcode"]);
if (isset($_POST["email"])) $email = sanitise_input($_POST["email"]);
if (isset($_POST["phonenum"])) $phonenum = sanitise_input($_POST["phonenum"]);
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
if (isset($_POST["otherskills"])) $otherskills = sanitise_input($_POST["otherskills"]);
?>
