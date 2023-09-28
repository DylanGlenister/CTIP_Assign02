<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mocha - About</title>
	<meta charset="utf-8">
	<meta name="author" content="Melusi Ndebele">
	<meta name="description" content="The about page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, about">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
<?php
		$title = "About";
		include ("header.inc");
		?>
	<?php
		include ("menu.inc");
		?>
	<main>
		<h1>About our group</h1>
		<dl>
			<dt>Group name:</dt>
			<dd>Mocha Company</dd>
			<dt>Group ID:</dt>
			<dd>104642765</dd>
			<dt>Tutors name:</dt>
			<dd>Kaibin Wang</dd>
			<dt>Course:</dt>
			<dd>Bachelor in Computer Science</dd>
		</dl>

		<figure>
			<img
			src="./images/GroupPhoto.jpg"
			alt="Photo of group members">
			<figcaption>
				Group photo
			</figcaption>
		</figure>

		<table>
			<caption>Group Time Table</caption>
			<thead>
				<tr>
					<th>Time</th>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>8:00-9:00</td>
					<td class="work"> Computing Inquiry Project</td>
					<td class="work" rowspan="2">Introduction to programming</td>
					<td></td>
					<td></td>
					<td class="work" rowspan="2"> Introduction to programming</td>
				</tr>
				<tr>
					<td>9:00-10:00</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>11:00-12:00</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>12:00-13:00</td>
					<td class="work" rowspan="2">Networks and Swtitching</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>13:00-14:00</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>14:00-15:00</td>
					<td class="work">Computer Systems</td>
					<td></td>
					<td class="work" rowspan="3">Networks and Swtitching</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>15:00-16:00</td>
					<td></td>
					<td></td>
					<td class="work">Computing Inquiry Project</td>
					<td></td>
				</tr>
				<tr>
					<td>16:00-17:00</td>
					<td></td>
					<td></td>
					<td class="work" rowspan="2">Computing Inquiry Project</td>
					<td></td>
				</tr>
				<tr>
					<td>17:00-18:00</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>18:00-19:00</td>
					<td></td>
					<td class="work" rowspan="2">Computer Systems</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>19:00-20:00</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>20:00-21:00</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>

		<p>To contact us, write to us on
			<a href="mailto:104642765@student.swin.edu.au">our email.</a></p>
	</main>
	<?php
		$author = "Author: Melusi Ndebele";
		include ("footer.inc");
		?>
</body>
</html>
