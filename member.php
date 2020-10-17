<?php

session_start();
if(!isset($_POST['login'])){
	header('location:login.php');
	}else if((strlen($_POST['memail'])>0)&&(strlen($_POST['mpassword'])>0)){	
		$memail=$_POST['memail'];
		$mpass =$_POST['mpassword'];

   
	mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	mysql_select_db('my_cart') or die('Error : '.mysql_error());
	 
$query=mysql_query("SELECT * FROM cus_detail  WHERE email='$memail'AND password='$mpass'");
if($query>0){
	$row= mysql_fetch_assoc($query);
	$_SESSION['user']=$row['email'];
	$_SESSION['cus_id']=$row['cus_id'];
	
  
	
	if(!isset($_SESSION['user'])){
		$_SESSION['err']="email is incorrect";
		header('location:login.php');
	}
	else{
		
			unset($_SESSION['login']);
		     unset($_SESSION['err']);
			header('location:product.php');
		
		
	}}}?>