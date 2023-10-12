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
        $alleoi = $refsearch = $namesearch = "";
	?>
    <main>
        <h1>Search for EOI Queries</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!-- ($_SERVER["PHP_SELF"]) calls currently running script and "htmlspecialchars" stops hackers from entering commands into the URL-->
        <label for="alleoi">Check box to show all EOIs</label>
        <input type="checkbox" name="alleoi" id="alleoi" <?php if (isset($alleoi)) echo "checked";?>>
        <br>
        <label for="refsearch">Job Reference Number:</label>
        <input type="text" name="refsearch" id="refsearch" value="<?php echo $refsearch;?>">
        <br>
        <label for="given_namesearch">Given name:</label>
        <input type="text" name="given_namesearch" id="given_namesearch" value="<?php echo $given_namesearch;?>">
        <label for="surnamesearch">Surname:</label>
        <input type="text" name="surnamesearch" id="surnamesearch" value="<?php echo $surnamesearch;?>">
        <br>
        <input type="submit" value="Search">
    </form>

    <?php
        require_once "settings.php"
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db)
        if(!$dbconn){
            echo "<p>Database connection failure.</p>";
        } else if (isset($alleoi)){
            $query = "SELECT * FROM ";
            $result = mysqli_query($dbconn, $query)
            if (!$result){
                echo "<P>There is something wrong with", $query, "</p>";
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                    ."<th scope=\"col\">RefNumber</th>\n"
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>\n";
                    echo "<td>",$row["jobrefnumber"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>";
                mysqli_free_result($result);
            }
        } else if (isset($refsearch)){
            $query = "SELECT * FROM WHERE jobrefnumber = $refsearch";
            $result = mysqli_query($dbconn, $query)
            if (!$result){
                echo "<P>There is something wrong with", $query, "</p>";
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                    ."<th scope=\"col\">RefNumber</th>\n"
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>\n";
                    echo "<td>",$row["jobrefnumber"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>";
                mysqli_free_result($result);
            }
        } else if (isset($namesearch)){
            $query = "SELECT * FROM WHERE given_names = $given_namesearch OR surname = $surnamesearch";
            $result = mysqli_query($dbconn, $query)
            if (!$result){
                echo "<P>There is something wrong with", $query, "</p>";
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                    ."<th scope=\"col\">RefNumber</th>\n"
                    ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>\n";
                    echo "<td>",$row["jobrefnumber"],"</td>\n";
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