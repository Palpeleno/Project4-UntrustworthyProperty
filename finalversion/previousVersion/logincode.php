<?php

$error = '';

if(isset($_POST['submit'])){
    if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['type']) || empty($_POST['email'])){
        $error = "Please fill out all fields";
    }else{

        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $email=$_POST['email'];
        $usertype=$_POST['type'];

        $conn = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"login");

        if($usertype != "admin"){
        $finduser = "SELECT * FROM userdata WHERE email='$email' AND username='$user'";
        $query = mysqli_query($conn, $finduser);

        if(mysqli_num_rows($query)>0){
            while($row=mysqli_fetch_assoc($query)){
                if(password_verify($pass, $row['password'])){
                    header('Location: welcome.php');
                }else{
                    $error = $pass.$row['password'];
                }
            }
        }
        mysqli_close($conn);
    }else{

        $query = mysqli_query($conn, "SELECT * FROM userdata WHERE password='$pass' AND username='$user' AND usertype='$usertype'");

        $rows = mysqli_num_rows($query);
        if($rows==1){
            header('Location: welcome.php');
        }else{
            $error = "Incorrect login details";
        }
        mysqli_close($conn);

    }
    }
}
?>