<?php
include("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="asset/styles/style4Login.css">
    <script src="asset/js/login.js"></script>
</head>
<body>
<body>
    <form method="post" onsubmit="return validation()">
        <h1>Login Form</h1>
        <label>Email</label>
        <input type="email" name="email" id="email" placeholder="Your registered email"><br>
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Your password"><br> 
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="registrationForm.php" style="text-decoration: none">Register</a> here.</p>
    </form>
</body>
</html>

<?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $select="SELECT * FROM registration WHERE email = '$email' AND password = '$password'";
    $query=mysqli_query($conn,$select);
    if(mysqli_num_rows($query)>0){
        $_SESSION['email']=$email;
        echo "<script>alert('Login success')</script>";
		echo "<script>location.replace('panel.php')</script>";
    }
    else{
        echo "<script>alert('No record found')</script>";
    }
}
?>