<?php
$mysqli = new mysqli('localhost', 'root', '', 'property');
if ($mysqli->connect_error) {

    printf("can not connect databse %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM property list";
$read = $mysqli->query($query);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <title>admin</title>

</head>

<div>

    
    <div id="navbar">
    <h3 id="home">Fake Estate</h3>
    <nav>
        <ul class="links">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="admin.php">temp admin</a></li>


        </ul>
    </nav>
    <a href="index.html" id="homelink">Home</a>
</div>
</div>

<body>
    <div class="adminSight">

        <div class="playerlist" >
            this area should be on left as a column

        </div>

        <div class="playerstat">
            all player stats will go in this area
        </div>
    </div>


</body>

</html>