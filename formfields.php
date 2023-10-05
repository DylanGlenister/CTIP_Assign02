<?php
function sanatise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// Required
// Validate that form data was sent over
if (isset($_POST["jobrefnum"])){
	$jobrefnum = sanatise_input($_POST["jobrefnum"]);
} else {
	header("location: apply.php");
}
if (isset($_POST["given_names"])) sanatise_input($given_names = $_POST["given_names"]);
if (isset($_POST["surname"])) sanatise_input($surname = $_POST["surname"]);
if (isset($_POST["dob"])) sanatise_input($dob = $_POST["dob"]);
if (isset($_POST["gender"])) sanatise_input($gender = $_POST["gender"]);
if (isset($_POST["address"])) sanatise_input($address = $_POST["address"]);
if (isset($_POST["town"])) sanatise_input($town = $_POST["town"]);
if (isset($_POST["state"])) sanatise_input($state = $_POST["state"]);
if (isset($_POST["postcode"])) sanatise_input($postcode = $_POST["postcode"]);
if (isset($_POST["email"])) sanatise_input($email = $_POST["email"]);
if (isset($_POST["phonenum"])) sanatise_input($phonenum = $_POST["phonenum"]);
// Optional
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
