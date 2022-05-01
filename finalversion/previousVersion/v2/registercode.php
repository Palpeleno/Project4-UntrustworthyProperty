<?php

$error = '';
if(isset($_POST['submit'])){
if ($_POST["pass"] === $_POST["confirm"]) {
    if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['type']) || empty($_POST['email']) || empty($_POST['confirm']) || empty($_POST['first']) 
    || empty($_POST['last'])){
        $error = "Fill out all fields to register";
    }else{

        $firstname=$_POST['first'];
        $lastname=$_POST['last'];
        $email=$_POST['email'];
        $user=$_POST['user'];
        $pass=password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $usertype=$_POST['type'];

        $conn = mysqli_connect("remotemysql.com","ijx3LAUDSB","Abt3utIDYR");
        $db = mysqli_select_db($conn,"ijx3LAUDSB");
        $query = "INSERT INTO userdata(username,password,usertype,email,firstname,lastname)
        VALUES('$user','$pass','$usertype','$email','$firstname','$lastname')";

        if ($conn->query($query) === TRUE) {
            $error = 'Registered!';
            header('Location: login.php');
        }else{
            $error = 'DATABASE ERROR';
        }        
        mysqli_close($conn);
    }
}
else {
    $error = 'Passwords do not match';
}
}

?>