<?php
session_start();
unset($_SESSION['user']);
header('location:index.php');
unset($_SESSION['newuser']);
header('location:index.php');

if(isset($_SESSION['cus_id'])){
	$i=$_SESSION['cus_id'];
	
	
	mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	mysql_select_db('my_cart') or die('Error : '.mysql_error());
	
	mysql_query("DELETE  FROM cart  WHERE cus_id='$i'");
	
	
	}


?>