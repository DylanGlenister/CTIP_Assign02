<?php
// Required
$jobrefnum = $_POST["jobrefnum"];
$given_names = $_POST["given_names"];
$surname = $_POST["surname"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$town = $_POST["town"];
$state = $_POST["state"];
$postcode = $_POST["postcode"];
$email = $_POST["email"];
$phonenum = $_POST["phonenum"];
// Optional
if (isset($_POST["computer_literacy"])) {
	$computer_literacy = $_POST["computer_literacy"];
}
if (isset($_POST["problem_solving"])) {
	$problem_solving = $_POST["problem_solving"];
}
if (isset($_POST["teamwork"])) {
	$teamwork = $_POST["teamwork"];
}
if (isset($_POST["communication"])) {
	$communication = $_POST["communication"];
}
if (isset($_POST["interpersonal"])) {
	$interpersonal = $_POST["interpersonal"];
}
if (isset($_POST["learning"])) {
	$learning = $_POST["learning"];
}
if (isset($_POST["english_literacy"])) {
	$english_literacy = $_POST["english_literacy"];
}
if (isset($_POST["mathematics"])) {
	$mathematics = $_POST["mathematics"];
}
if (isset($_POST["otherskills"])) {
	$otherskills = $_POST["otherskills"];
}
?>
