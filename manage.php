<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mocha - Manage</title>
	<meta charset="utf-8">
	<meta name="author" content="Melusi Ndebele">
	<meta name="description" content="The EOI Quieries page for a fictional tech company called Mocha">
	<meta name="keywords" content="Swinburne, COS10026, assignment, Mocha, manage, EOI, Quiery">
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <?php
		$title = "EOI Queries";
		include ("header.inc");
	?>
    <main>
        <h1>Search for EOI Queries</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!-- ($_SERVER["PHP_SELF"]) calls currently running script and "htmlspecialchars" stops hackers from entering commands into the URL-->
        <label for="alleoi">Check box to show all EOIs</label>
        <input type="checkbox" name="alleoi" id="alleoi">
        <br>
        <label for="refsearch">Job Reference Number:</label>
        <input type="text" name="refsearch" id="refsearch">
        <br>
        <label for="given_namesearch">Given name:</label>
        <input type="text" name="given_namesearch" id="given_namesearch" >
        <br>
        <label for="surnamesearch">Surname:</label>
        <input type="text" name="surnamesearch" id="surnamesearch" >
        <br>
        <input type="submit" value="Search">
    </form>

    <br>

    <?php
        require_once "settings.php";
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if(!$dbconn){
            echo "<p>Database connection failure.</p>";
        } else if (isset($_POST["alleoi"])){
            $query = "SELECT * FROM aplications";
            $result = mysqli_query($dbconn, $query);
            if (!$result){
                echo "<P>There is something wrong with ", $query, "</p>";
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                    ."<th scope=\"col\">jobrefnum</th>\n"
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>\n";
                    echo "<td>",$row["jobrefnum"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>";
                mysqli_free_result($result);
            }
        } else if (isset($_POST["refsearch"])){
            $query = "SELECT * FROM aplications WHERE jobrefnum = $refsearch";
            $result = mysqli_query($dbconn, $query);
            if (!$result){
                echo "<P>There is something wrong with ", $query, "</p>";
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                    ."<th scope=\"col\">jobrefnum</th>\n"
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>\n";
                    echo "<td>",$row["jobrefnum"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>";
                mysqli_free_result($result);

                echo "<form method=\"post\" action=\"deleteEOI.php\">";
                echo "<label for=\"refnum\">Delete all EOIs with job reference number:</label>";
                echo "<input type=\"text\" name=\"refnum\" id=\"refnum\" value=\"<?php echo $refsearch;?>\">";
                echo "<input type=\"submit\" value=\"Delete\">";
                echo "</form>";

            }
        } else if (isset($_POST["namesearch"])){
            $query = "SELECT * FROM aplications WHERE given_names = $given_namesearch OR surname = $surnamesearch";
            $result = mysqli_query($dbconn, $query);
            if (!$result){
                echo "<P>There is something wrong with ", $query, "</p>";
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                    ."<th scope=\"col\">jobrefnum</th>\n"
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>\n";
                    echo "<td>",$row["jobrefnum"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>";
                mysqli_free_result($result);
            }
        }

    ?>
    </main>
    <?php
		$author = "Melusi Ndebele";
		include ("footer.inc");
		?>
</body>