<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mocha - Apply</title>
	<meta charset="utf-8">
	<meta name="author" content="Dylan Glenister">
	<meta name="description" content="The apply page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, apply">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<!-- HEADER -->
	<?php
		$title = "Apply";
		include ("header.inc");
		?>
	<!-- NAV -->
	<?php
		include ("menu.inc");
		?>
	<!-- MAIN -->
	<main>
		<h2>Apply Here</h2>
		<form method="post" action="./processEOI.php">
			<fieldset>
				<legend>Application Form</legend>
				<p>Fields marked with an <em>asterisk*</em> are <strong>required</strong></p>
				<label for="jobrefnum">Job Reference Number: *</label>
				<input type="text" name="jobrefnum" id="jobrefnum" required="required" pattern="[\w\d]{5}">
				<br>
				<!-- ABOUT YOU -->
				<fieldset>
					<legend>About you</legend>
					<label for="first_name">First name: *</label>
					<input type="text" name="first_name" id="first_name" size="40" required="required" pattern="[A-za-z\s]{1,20}">
					<br>
					<label for="surname">Surname: *</label>
					<input type="text" name="surname" id="surname" size="40" required="required" pattern="[A-Za-z\s]{1,20}">
					<br>
					<label for="dob">Date of Birth: *</label>
					<input type="date" name="dob" id="dob" required="required">
					<br>
					<fieldset>
						<legend>Gender</legend>
						<input type="radio" name="gender" id="male" required="required">
						<label for="male">Male </label>
						<br>
						<input type="radio" name="gender" id="female">
						<label for="female">Female </label>
						<br>
						<input type="radio" name="gender" id="neither">
						<label for="neither">Prefer not to say</label>
					</fieldset>
				</fieldset>
				<!-- CONTACT INFORMATION -->
				<fieldset>
					<legend>Contact Information</legend>
					<label for="address">Street address: *</label>
					<input type="text" name="address" id="address" size="40" required="required" pattern="*{1,40}">
					<br>
					<label for="town">Suburb/Town: *</label>
					<input type="text" name="town" id="town" required="required" pattern="[A-Za-z]+">
					<br>
					<label for="state">State/Territory: *</label>
					<select name="state" id="state" required="required">
						<option value="">Please Select</option>
						<optgroup label="States">
							<option value="NSW">NSW</option>
							<option value="QLD">QLD</option>
							<option value="SA">SA</option>
							<option value="TAS">TAS</option>
							<option value="VIC">VIC</option>
							<option value="WA">WA</option>
						</optgroup>
						<optgroup label="Territories">
							<option value="ACT">ACT</option>
							<option value="NT">NT</option>
						</optgroup>
					</select>
					<br>
					<label for="postcode">Postcode: *</label>
					<input type="text" name="postcode" id="postcode" size="5" required="required" pattern="\d{4}">
					<br>
					<label for="email">Email address: *</label>
					<input type="email" name="email" id="email" size="30" required="required">
					<br>
					<label for="phonenum">Phone number: *</label>
					<input type="text" name="phonenum" id="phonenum" size="10" required="required" pattern="[\d\s]{8,12}">
					<br>
				</fieldset>
				<!-- YOUR SKILLS -->
				<fieldset>
					<legend>Your Skills</legend>
					<label for="computer_literacy">Computer literacy:</label>
					<input type="checkbox" name="computer_literacy" id="computer_literacy">
					<br>
					<label for="problem_solving">Problem solving:</label>
					<input type="checkbox" name="problem_solving" id="problem_solving">
					<br>
					<label for="teamwork">Teamwork:</label>
					<input type="checkbox" name="teamwork" id="teamwork">
					<br>
					<label for="communication">Communication:</label>
					<input type="checkbox" name="communication" id="communication">
					<br>
					<label for="interpersonal">Interpersonal:</label>
					<input type="checkbox" name="interpersonal" id="interpersonal">
					<br>
					<label for="learning">Learning:</label>
					<input type="checkbox" name="learning" id="learning">
					<br>
					<label for="english_literacy">English literacy:</label>
					<input type="checkbox" name="english_literacy" id="english_literacy">
					<br>
					<label for="mathematics">Mathematics:</label>
					<input type="checkbox" name="mathematics" id="mathematics">
					<br>
					<label for="otherskills">Other skills:</label>
					<br>
					<textarea name="otherskills" id="otherskills" rows="5" cols="40" placeholder="Please type here..."></textarea>
				</fieldset>
				<!-- SUBMIT/RESET -->
				<br>
				<input type="submit" value="Apply">
				<input type="reset" value="Reset">
			</fieldset>
		</form>
	</main>
	<!-- FOOTER -->
	<?php
		$author = "Author: Dylan Glenister";
		include ("footer.inc");
		?>
</body>
</html>
