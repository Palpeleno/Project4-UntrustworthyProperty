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
        
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'estate');

        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if($usertype != "admin"){
        
        $finduser = "SELECT * FROM userdata WHERE email='$email' AND username='$user'";
        $query = mysqli_query($conn, $finduser);

        if(mysqli_num_rows($query)>0){
            while($row=mysqli_fetch_assoc($query)){
                if(password_verify($pass, $row['password'])){
                    if($usertype=="buyer"){
                        header('Location: buyer.php');
                    }else{
                        header('Location: seller.php');
                    }
                    
                }else{
                    $error = "Password Verification Failed";
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