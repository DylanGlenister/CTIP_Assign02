<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mocha - Delete EOI</title>
	<meta charset="utf-8">
	<meta name="author" content="Melusi Ndebele">
	<meta name="description" content="The delete EOI page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, manage, EOI, Quiery, Delete">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <?php
    $title = "Delete EOI";
    include ("header.inc");
    ?>
    <main>
    <?php
    require_once ("settings.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<form method=\"get\" action=\"deleteEOI.php\">";
        echo "<label for=\"ref\">Are you aure you want to delete all EOIs with job reference number: </label>";
        echo "<input type=\"text\" name=\"ref\" id=\"ref\" value=\"$_POST[refnum]\">";
        echo "<input type=\"submit\" value=\"Delete\">";
        echo "</form>";
    } else {
        $conn = @mysqli_connect ($host,$user,$pwd,$sql_db);
        if ($conn) {
            $query = "DELETE FROM $sql_table WHERE jobrefnum = '$_GET[ref]'";
            $result = mysqli_query ($conn,$query);
            if ($result)  {
                echo "<h2>Deleted ".mysqli_affected_rows($conn)." record(s).</h2>";
            } else {
                echo "<h2>Insert operation unsuccessful.</h2>";
            }
            mysqli_close ($conn);
        } else {echo "<h2>Unable to connect to the db.</h2>";}
    }
    ?>
    <p>Return to <a href="./manage.php?verified=yes">manage EOI</a> page.</p>
    </main>
    <?php
		$author = "Melusi Ndebele";
		include ("footer.inc");
		?>
</body>
</html>
