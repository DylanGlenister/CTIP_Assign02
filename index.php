<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mocha - Hompage</title>
	<meta charset="utf-8">
	<meta name="author" content="Dylan, Melusi, Sam">
	<meta name="description" content="The homepage page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, homepage">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<?php
		$title = "Homepage";
		include ("header.inc");
		include ("menu.inc");
	?>
	<main id="index">
		<article>
			<h2>HELLO WE ARE MOCHA</h2>
			<h3>We do IT work for you!</h3>
			<p>Mocha is available for you to outsource your work. We cover all your bases.</p>
			<p>Down on manpower? Running out of time? Don't want to pay your employees? Hire us!</p>
			<p>
				<a href="https://youtu.be/wfd4XQ1-fVs">Part 1 on Youtube</a>
				<a href="https://youtu.be/hikD0nhzYo4">Part 2 on Youtube</a>
			</p>
		</article>
	</main>
	<?php
		$author = "Author: Dylan, Melusi, Sam";
		include ("footer.inc");
	?>
</body>
</html>
