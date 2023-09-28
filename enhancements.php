<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mocha - Enhancements</title>
	<meta charset="utf-8">
	<meta name="author" content="Dylan Glenister">
	<meta name="description" content="The enhancements page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, enhancements">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
<?php
		$title = "Enhancements";
		include ("header.inc");
		?>
	<?php
		include ("menu.inc");
		?>
	<main>
		<!-- Fade In -->
		<section>
			<h2>Fade in</h2>
			<p>Fade in is used to calmly load the page to the user. The fade affects the four main elements on the page: header, nav, main, and footer. Each one has a longer fade duration than the last which gives the effect that the page is loading top to bottom.</p>
			<p>The fade effect can be seen on all pages:</p>
			<ul>
				<li><a href="./index.html">index.html</a></li>
				<li><a href="./about.html">about.html</a></li>
				<li><a href="./jobs.html">jobs.html</a></li>
				<li><a href="./apply.html">apply.html</a></li>
				<li><a href="./enhancements.html">enhancements.html</a></li>
			</ul>
			<p>The fade in effect goes beyond the requirements as it adds a new layer into the website: time. Instead of a static page, the semantic elements flow onto the screen smoothly.</p>
			<p>Implementing this feature is surprisingly trivial.<br>
				To implement this in the css, first you define your keyframes like so:</p>
			<div class="codeBlock">
				<!-- Ugly but required for correct formatting -->
				<pre><code>@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
}</code></pre>
			</div>
			<p>Then you simply use the animation tag on an element and request your animation with a duration:</p>
			<div class="codeBlock">
			<pre><code>element {
    animation: fadeIn 1s;
}</code></pre>
			</div>
			<p>References:<br>
			<a href="https://blog.hubspot.com/website/css-fade-in">How to Add a CSS Fade-in Transition Animation to Text, Images, Scroll & Hover</a></p>
		</section>
		<br>
		<!-- Dynamic Layout -->
		<section>
			<h2>Dynamic Layout</h2>
			<p>Dynamic layout uses screen width checking to modify certain elements to be more mobile friendly.</p>
			<p>The resize effect can be seen on all pages in the nav bar:</p>
			<ul>
				<li><a href="./index.html">index.html</a></li>
				<li><a href="./about.html">about.html</a></li>
				<li><a href="./jobs.html">jobs.html</a></li>
				<li><a href="./apply.html">apply.html</a></li>
				<li><a href="./enhancements.html">enhancements.html</a></li>
			</ul>
			<p>The dynamic layout goes beyond the requirements as it provides a more acceptable user-experience on the narrow windows found on mobile devices.</p>
			<p>Implementing this feature requires very flew lines of code.<br>
				All you have to do is provide the following block in the css file:</p>
			<div class="codeBlock">
				<pre><code>@media screen and (max-width: 45em) {
    /* Your code here */
}</code></pre>
			</div>
			<p>Inside this block you define the styles that you would like to occur only when the screen is below 45em.</p>
		</section>
	</main>
	<?php
		$author = "Author: Dylan Glenister";
		include ("footer.inc");
		?>
</body>
</html>
