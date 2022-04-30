<?php    
$mysqli=new mysqli('localhost','root','','estate');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

	$query="SELECT * FROM property";
	$read=$mysqli->query($query);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div id="navbar">
        <h3 id="home">Fake Estate</h3>
        <nav>
        <ul class="links">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
        </nav>
        <a href="index.html" id="homelink">Home</a>
    </div>

   

    <h2>  Available Properties  </h2>
    <hr>

    <div class = "contents">
    <div class = "listview">
    <table>
        <thead>
        <tr>
            <th>View</th>    
            <th>Property Address</th>
            <th>Price</th>
            <th>Sq. Feet</th>
            <th>Details</th>
        </tr>
        </thead>
       
        <tbody>
        <?php while ($row=$read->fetch_assoc()) { ?>
        <div class = "propcard">
        <tr>
        <td><img style="height: 250px; width: 350px" src="propimages/<?php echo  $row['img']; ?>"</td>
            <td><?php echo  $row['address'];   ?></td>
            <td><?php echo $row['cost'];   ?></td>
            <td><?php echo  $row['sqfeet'];   ?></td>
            <td><a href="single.php?posts=<?php echo  $row['id'];  ?>">Details</a></td>
        </tr>
        </div>

        <?php } ?>
        </tbody>
    </table> 
    

    </div>

    <div id = "searchbox">
        <div class = "searchhead">Search for a property</div>
        <form method="POST" action="searchresults.php">	

            <div class="fieldbox">
            <input id="beds" name="beds" type="number">
            <label># of bedrooms</label>
            </div>
            
            <div class="fieldbox">
			<input id="baths" name="baths" type="number">
            <label># of bathrooms</label>
            
            </div>
            
            <div class="fieldbox">
			<input id="maxprice" name="maxprice" type="number">
            <label>Max price</label>
            
            </div>

            <div class="fieldbox">
			<input id="minsqfeet" name="minsqfeet" type="number">
            <label>Min square feet</label>
            
            </div>

            <div class="butt">
			<button class="button">submit<input type="submit" name="submit" value="" class="shownone"></button>
            </div>

    </div>    




</div>    

</body>
</html>