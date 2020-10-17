<?php
session_start();
$_SESSION['weekly']="weekly_special";

if((!isset($_SESSION['user'])) || (!isset($_SESSION['newuser']))) {
   if(isset($_GET['weeklyAddCart'])){
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
<link rel="stylesheet" href="css/css/style.css" type="text/css" />
<title>Weekly special</title>
</head>

<body>
<div id="tmain">
  <div class="nav">
	<header>
		<ul id="navitem">
		<li class="active" id="dot"><a href="css/index.php">Home</a></li>
		<li><a href="css/Mycart.php">My Cart</a></li>
		<li><a href="css/MyAccount.php">My Account</a></li>
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
    	<img src="css/images/weekly.jpg" width="783" height="330" />
    </div>
    
    <div style="position: absolute; width: 739px; height: auto; left: 75px; top: 566px;">

    	<table width="740" border="0">
  			<tr>
    			<td height="150" width="245" background="css/images/2.jpg">&nbsp;</td>
    			<td height="150" width="245" background="css/images/5.jpg">&nbsp;</td>
    			<td height="150" width="245" background="css/images/8.jpg">&nbsp;</td>
  			</tr>
  			<tr>
    			<td class="td">Hawaiian</td>
    			<td class="td">Chicken Carbonara</td>
    			<td class="td">Chicken Ciassc</td>
  			</tr>
            
    		  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="weeklyAddCart" value="Add to Cart" /></form></td>
   			  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="weeklyAddCart" value="Add to Cart" /></form></td>
   			 <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="weeklyAddCart" value="Add to Cart" /></form></td>
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
    			<td height="150" width="245" background="css/images/11.jpg">&nbsp;</td>
    			<td height="150" width="245" background="css/images/14.jpg">&nbsp;</td>
    			<td height="150" width="245" background="css/images/17.jpg">&nbsp;</td>
  			</tr>
  			<tr>
    			<td class="td">Bread Sticks</td>
    			<td class="td">Prawn Fride Rice</td>
    			<td class="td">Chicken Biryani</td>
  			</tr>
            <tr>
    		  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="weeklyAddCart" value="Add to Cart" /></form></td>
   			  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="weeklyAddCart" value="Add to Cart" /></form></td>
   			  <td class="addCart"><form action="" method="get" class="addCart"><input type="submit" name="weeklyAddCart" value="Add to Cart" /></form></td>
  			</tr> 
  		</table>
        		
    </div>

  </div>
</body>
</html>