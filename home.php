<?php 
    session_start();
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
    <h1><strong>Awesome!!!</strong></h1>      
</div>
<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}

?>

<div>
    <h2>You <?php echo "are logged in!"?></h2>
    <h3><a href="logout.php">Logout</a><h3>
</div>

</body>
</html>