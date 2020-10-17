<?php
session_start();
$_SESSION['daily']="daily_special";

if((!isset($_SESSION['user'])) || (!isset($_SESSION['newuser']))) {
   if(isset($_GET['dailyAddCart'])){
	header('location:login.php');
}
}
if((isset($_SESSION['user'])) || (isset($_SESSION['newuser']))){
	header('location:product.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Daily special</title>
</head>

<body>
<div id="tmain">
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
  <div style="position: absolute; left: 59px; top: 205px; width: 740px; height: 330px;">
    	<img src="images/daily.jpg" width="783" height="330" />
    </div>
    
    <div style="position: absolute; width: 739px; height: auto; left: 75px; top: 566px;">

    	<table width="740" border="0">
  			<tr>
    			<td height="150" width="245" background="images/1.jpg">&nbsp;</td>
    			<td height="150" width="245" background="images/4.jpg">&nbsp;</td>
    			<td height="150" width="245" background="images/7.jpg">&nbsp;</td>
  			</tr>
  			<tr>
    			<td class="td">BBQ Chicken Feast</td>
    			<td class="td">Chicken Alfredo</td>
    			<td class="td">Chicken Crispy</td>
  			</tr>
            
    		  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="dailyAddCart" value="Add to Cart" /></form></td>
   			  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="dailyAddCart" value="Add to Cart" /></form></td>
   			 <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="dailyAddCart" value="Add to Cart" /></form></td>
  			</tr>
            <tr>
            	<td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td></td>
                <td></td>
                <td></td>
            </tr>
  			<tr>
    			<td height="150" width="245" background="images/10.jpg">&nbsp;</td>
    			<td height="150" width="245" background="images/13.jpg">&nbsp;</td>
    			<td height="150" width="245" background="images/16.jpg">&nbsp;</td>
  			</tr>
  			<tr>
    			<td class="td">New Boneless Chicken</td>
    			<td class="td">Cheesy Gsrlic Finger</td>
    			<td class="td">Fish Fride Rice</td>
  			</tr>
            <tr>
    		  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="dailyAddCart" value="Add to Cart" /></form></td>
   			  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="dailyAddCart" value="Add to Cart" /></form></td>
   			  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="dailyAddCart" value="Add to Cart" /></form></td>
  			</tr> 
  		</table>
        		
    </div>

  </div>
</body>
</html>