<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Welcome</title>
</head>

<body>
<div id="main">
  <div class="nav">
	<header>
		<ul id="navitem">
		<li class="active" id="dot"><a href="index.php">Home</a></li>
		<li><a href="Mycart.php">My Cart</a></li>
		<li><a href="MyAccount.php">My Account</a></li>
		<li> <?php if((!isset($_SESSION['user'])) && (!isset($_SESSION['newuser']))) {
			echo"<a href='login.php' id='link'>Login</a>";
			}else{
			echo"<a href='logout.php' id='link'>Log out</a>";
			}
			?></li>
		</ul>
	<header>
  </div>
    <div class="bnr">
		<img src="images/bnr.png" width="780" height="328" />
    </div>
    
  <div style="position: absolute; width: 220px; height: 150px; top: 500px; left: 65px;">
    	<a href="daily.php"><img src="images/1.jpg" width="220" height="150" /></a>
    </div>
  	<div style="position: absolute; width: 225px; height: 150px; top: 500px; left: 321px;">
    	<a href="weekly.php"><img src="images/8.jpg" width="225" height="151" /></a>
    </div>
  <div style="position: absolute; width: 220px; height: 150px; top: 500px; left: 577px;">
    	<a href="holiday.php"><img src="images/12.jpg" width="220" height="150" /></a>
    </div>
  		<a href="daily.php"> <h3 class="d_h3">Daily Special</h3></a>
  		<a href="weekly.php"> <h3 class="w_h3">Weekly Special</h3></a>
    	<a href="holiday.php"> <h3 class="h_h3">Holiday Special</h3></a>
        
</div>
</body>
</html>