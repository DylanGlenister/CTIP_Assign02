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
	include("validate_input.php");

	if ($errMsg != "") {
		echo "$errMsg";
	} else {
		// Send to database
	}
?>
</body>
</html>
