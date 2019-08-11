<?php
session_start();

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "loginSystem");
    mysqli_query($con,"set names utf8");
	if (isset($_POST['register_btn'])) {

		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$password2 = trim($_POST['password2']);
        
        if ($password == $password2) {
            $password = md5($password);// hash password before storing for security purposes
            $sql = "insert into `users` (`username`, `email`, `password`) values ('" . $username . "', '" . $email . "', '" . $password . "')";
            $res = mysqli_query($con, $sql);
            $_SESSION['message'] = "You are logged in now";
            $_SESSION['username'] = $username;
            header("location: home.php"); //redirect to home page
        } else {
            $_SESSION['message'] = "The two Passwords do not match";
        }      
    }
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>loginSystem</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrap">
    <h2>Register here</h2>   

<?php 

    if(isset($_SESSSION['message'])) {
        echo "<div id='error message'>" .$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }

?>   
    <form method="post" action="Register.php">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="textInput" required></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="email" name="email" class="textInput" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="textInput" required></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="password2" class="textInput" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register_btn" value="Register" required></td>
            </tr>
    </form>
</div>
</body>
</html>
