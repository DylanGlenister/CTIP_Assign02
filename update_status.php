<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./styles/styles.css">

</head>
<body>
    
    <?php
    $title = "Update EOI Status";
    include ("header.inc");
    require_once "settings.php";
    ?>
    <main>
    <?php

    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if(!$dbconn){
        echo "<h2>Database connection failure.</h2>";
    } else {
        $statusid = $_POST["status$_POST[id]"];
        $query = "UPDATE $sql_table SET status='$statusid' WHERE id='$_POST[id]'";
        $result = mysqli_query($dbconn, $query);
        if (!$result) {
            echo "<h2>There is a problem with" , $query, "</h2>";
        } else {
            echo "<h2>Status updated successfully.</h2>";
        }
        mysqli_close($dbconn);
    }
    ?>
    <p>Return to <a href="./manage.php">manage EOI</a> page.</p>
    </main>
    <?php
		$author = "Melusi Ndebele";
		include ("footer.inc");
		?>
</body>
</html>