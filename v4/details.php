<?php

$mysqli=new mysqli('remotemysql.com','ijx3LAUDSB','Abt3utIDYR','ijx3LAUDSB');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_GET['details'])){

	$id=$_GET['details'];
	$query2= "SELECT * FROM property where id='$id'";
	$readd=$mysqli->query($query2);

}

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



<div class="container">
	<table>
  <thead>
    <tr>
      <th>Address</th>
      <th>Price</th>
      <th>Beds</th>
      <th>Baths</th>
      <th>Description</th>
      <th>Extra feature</th>
      
    </tr>
  </thead>
  <tbody>
  <?php while ($row= $readd->fetch_assoc()) { ?>
    <img style="height: 350px; width: 450px; padding: 30px; margins: auto;" src="propimages/<?php echo  $row['img']; ?>"
    <tr>
      <td> <?php echo $row['address'];  ?></td>
      <td> <?php echo $row['cost'];  ?></td>
      <td> <?php echo $row['beds'] . " bedrooms";  ?>
       <?php echo $row['baths']. " bathrooms";  ?></td>
       <td><?php echo $row['description'];  ?></td>
       <td><?php echo $row['extras'];  ?></td>
      
    </tr>
<?php   } ?>
  </tbody>
</table> 

</div>



</body>
</html>
