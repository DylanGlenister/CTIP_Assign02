<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <?php
    require_once "settings.php";

    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if(!$dbconn){
        echo "<p>Database connection failure.</p>";
    } else {
        $statusid = $_POST["status$_POST[id]"];
        $query = "UPDATE $sql_table SET status='$statusid' WHERE id='$_POST[id]'";
        $result = mysqli_query($dbconn, $query);
        if (!$result) {
            echo "<p>There is a problem with" , $query, "</p>";
        } else {
            echo "<p>Status updated successfully.</p>";
        }
        mysqli_close($dbconn);
    }
    ?>
    <p>Return to <a href="./manage.php">manage EOI</a> page.</p>
</body>
</html>