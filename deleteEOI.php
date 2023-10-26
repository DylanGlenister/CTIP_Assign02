<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
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
                echo "<p>Deleted ".mysqli_affected_rows($conn)." record(s).</p>";
            } else {
                echo "<p>Insert operation unsuccessful.</p>"; 
            }
            mysqli_close ($conn);
        } else {echo "<p>Unable to connect to the db.</p>";}
    }
    ?>
    <p>Return to <a href="./manage.php">manage EOI</a> page.</p>

</body>