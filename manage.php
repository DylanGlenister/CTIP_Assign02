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
		include ("menu.inc");
    ?>
    <main>
        <h1>Search for EOI Queries</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!-- ($_SERVER["PHP_SELF"]) calls currently running script and "htmlspecialchars" stops hackers from entering commands into the URL-->
        <label for="alleoi">Check box to show all EOIs</label>
        <input type="checkbox" name="alleoi" id="alleoi">
        <br>
        <label for="refsearch">Job Reference Number:</label>
        <input type="text" name="refsearch" id="refsearch" value="">
        <br>
        <label for="given_namesearch">Given name:</label>
        <input type="text" name="given_namesearch" id="given_namesearch" value="">
        <br>
        <label for="surnamesearch">Surname:</label>
        <input type="text" name="surnamesearch" id="surnamesearch" value="">
        <br>
        <input type="submit" value="Search">
    </form>

    <br>

    <?php
        function display_data($result){
            echo "<table>\n";
                echo "<tr>\n"
                    ."<th scope=\"col\">Job Reference Number</th>\n"
                    ."<th scope=\"col\">First Name</th>\n"
                    ."<th scope=\"col\">Surname</th>\n"
                    ."<th scope=\"col\">Date of Birth</th>\n"
                    ."<th scope=\"col\">Gender</th>\n"
                    ."<th scope=\"col\">Address</th>\n"
                    ."<th scope=\"col\">Town</th>\n"
                    ."<th scope=\"col\">State</th>\n"
                    ."<th scope=\"col\">Postcode</th>\n"
                    ."<th scope=\"col\">Email</th>\n"
                    ."<th scope=\"col\">Phone Number</th>\n"
                    ."<th scope=\"col\">Skills</th>\n"
                    ."<th scope=\"col\">Other Skills</th>\n"
                    ."<th scope=\"col\">Status</th>\n"
                    ."<th scope=\"col\">Update Status</th>\n"
                    ."</tr>\n";

                $ids = array();
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>\n";
                    echo "<td>",$row["jobrefnum"],"</td>\n";
                    echo "<td>",$row["first_name"],"</td>\n";
                    echo "<td>",$row["surname"],"</td>\n";
                    echo "<td>",$row["dob"],"</td>\n";
                    echo "<td>",$row["gender"],"</td>\n";
                    echo "<td>",$row["address"],"</td>\n";
                    echo "<td>",$row["town"],"</td>\n";
                    echo "<td>",$row["state"],"</td>\n";
                    echo "<td>",$row["postcode"],"</td>\n";
                    echo "<td>",$row["email"],"</td>\n";
                    echo "<td>",$row["phonenum"],"</td>\n";
                    echo "<td>",$row["skills"],"</td>\n";
                    echo "<td>",$row["otherskills"],"</td>\n";
                    echo "<td>",$row["status"],"</td>\n";
                    echo "<td><form method=\"post\" action=\"update_status.php\">
                        <input type=\"hidden\" name=\"id\" id=\"id\" value=\"$row[id]\">
                        <select name=\"status$row[id]\" id=\"status$row[id]\">
                            <option value=\"not empty\">New</option>
                            <option value=\"current\">Current</option>
                            <option value=\"final\">Final</option>
                        </select>
                        <input type=\"submit\" value=\"update\">";
                    echo "</tr></form>\n";
                }
                echo "</table>";
                mysqli_free_result($result);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            require_once ("settings.php");

            $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if(!$dbconn){
                echo "<p>Database connection failure.</p>";
            } else if (isset($_POST["alleoi"])){
                $query = "SELECT * FROM $sql_table";
                $result = mysqli_query($dbconn, $query);
                if (!$result){
                    echo "<P>There is something wrong with ", $query, "</p>";
                } else {
                    display_data($result);
                }
                mysqli_close($dbconn);
            } else if ($_POST["refsearch"] != ""){
                $search = trim($_POST["refsearch"]);
                $query = "SELECT * FROM $sql_table WHERE jobrefnum = '$search'";
                $result = mysqli_query($dbconn, $query);
                if (!$result){
                    echo "<P>There is something wrong with ", $query, "</p>";
                } else {
                    display_data($result);

                    echo "<form method=\"post\" action=\"deleteEOI.php\">";
                    echo "<label for=\"refnum\">Delete all EOIs with job reference number: </label>";
                    echo "<input type=\"text\" name=\"refnum\" id=\"refnum\" value=\"$_POST[refsearch]\">";
                    echo "<input type=\"submit\" value=\"Delete\">";
                    echo "</form>";

                }
                mysqli_close($dbconn);
            } else if ($_POST["given_namesearch"] != "" or $_POST["surnamesearch"] != ""){
                $fname = trim($_POST["given_namesearch"]);
                $sname = trim($_POST["surnamesearch"]);
                $query = "SELECT * FROM $sql_table WHERE first_name = '$fname' OR surname = '$sname'";
                $result = mysqli_query($dbconn, $query);
                if (!$result){
                    echo "<P>There is something wrong with ", $query, "</p>";
                } else {
                    display_data($result);
                }
                mysqli_close($dbconn);
            }
        } elseif ($_SERVER["REQUEST_METHOD"] != "GET") {
            header("location: index.php");
        } else {
            $verified = isset($_GET["verified"]);
            if (!$verified || $verified != "true") {
                header("location: index.php");
            }
        }

    ?>
    </main>
    <?php
		$author = "Melusi Ndebele";
		include ("footer.inc");
	?>
</body>
