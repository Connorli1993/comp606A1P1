<?php
    session_start();

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "loginSystem");
    mysqli_query($con,"set names utf8");
    if (!$con){
       die("Could not connect:".mysqli_connect_error());
    }
	if (isset($_POST['login_btn'])) {

		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
		if($num == 1) {
			$_SESSION['message'] = "You are logged in now";
			$_SESSION['username'] = $username;
			header("location: home.php"); //redirect to home page
		}else {
			$_SESSION['message'] = "Username or password incorrect";
		}
	}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Welcome to login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
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
<div class="header">
    <h1>loginSystem</h1>
</div>

<?php 
    if(isset($_SESSSION['message'])) {
        echo "<div id='error message'>" .$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }

?>

<div class="wrap">
    <h2>Login</h2>      
    <form method="post" action="login.php">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="textInput" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="textInput" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login_btn" value="Login" required></td>
            </tr>
    </form>
</div>
</body>
</html>
