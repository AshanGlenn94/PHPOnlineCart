<?php
 session_start();
 if((!isset($_SESSION['user'])) && (!isset($_SESSION['newuser'])))  {
	 $error ="To check your acccount details please login and come...";
	 
}

?>
      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/style.css" type="text/css">
 <title>My Account</title>   
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
                		
				<div class="account">
                  <h2 style="font-weight:bold; margin:40px 50px 50px 50px"><?php
				   if(isset($error)){
					echo "$error"; 
					   }
					   ?>
                  </h2>
	 
               <table border="1" bordercolor="#333333" align="center">

     <tr>
               <?php
		$con=mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	      mysql_select_db('my_cart') or die('Error : '.mysql_error());
		  
	 	if(isset($_SESSION['user'])) {
	  
		$m=$_SESSION['user'];
	 
      $query=mysql_query("SELECT * FROM cus_detail  WHERE email='$m'",$con);
	while($row=mysql_fetch_assoc($query)){
?>
  
  
    	<td><lable>Customer ID </lable></td><td>&nbsp;:&nbsp;</td><td><?php
		if(isset($m)){
			 echo $row['cus_id']; 
		}?>
        </td>
        </tr>
        <tr>
        <td ><lable>Title </lable></td><td>&nbsp;:&nbsp;</td><td><?php
		if(isset($m)){
			 echo $row['cus_title']; }
			 ?> </td>
        </tr>
        <tr><td><lable>First Name </lable></td><td>&nbsp;:&nbsp;</td><td><?php 
		if(isset($m)){
			echo  $row['cus_fname'] ; }
			?></td>
        </tr>
        <tr><td><lable>Last Name </lable></td><td>&nbsp;:&nbsp;</td><td><?php 
		if(isset($m)){
			echo  $row['cus_lname'];
		}?>
        </td>
        </tr>
        <tr><td><lable>Address </lable></td><td>&nbsp;:&nbsp;</td><td><?php 
		if(isset($m)){

			echo  $row['address']; }
			?></td>
        </tr>
        <tr><td><lable>Contact Number&nbsp;&nbsp;&nbsp; </lable></td><td>&nbsp;:&nbsp;</td><td><?php 
		if(isset($m)){
			echo  $row['contact']; }
			?></td>
        </tr>
        <tr><td><lable>E-mail </lable></td><td>&nbsp;:&nbsp;</td><td><?php 
		if(isset($m)){
			echo  $row['email']; 
		}?></td>
        </tr>
        <?php
	  }}
	  ?> 
        <?php
		 unset($_SESSION['user']);
		 ?>
 
     
              
               <tr>
               <?php
		$con=mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	      mysql_select_db('my_cart') or die('Error : '.mysql_error());
		  
	 	if(isset($_SESSION['newuser'])) {
	  
		$m2=$_SESSION['newuser'];
	 
      $query=mysql_query("SELECT * FROM cus_detail  WHERE email='$m2'",$con);
	while($row=mysql_fetch_assoc($query)){
?>
 
  
    	<td><lable>Customer ID </lable></td><td>:</td><td><?php
		if(isset($m2)){
			 echo $row['cus_id']; 
		}?>
        </td>
        </tr>
        <tr>
        <td ><lable>Title </lable></td><td>:</td><td><?php
		if(isset($m2)){
			 echo $row['cus_title']; }
			 ?> </td>
        </tr>
        <tr><td><lable>First Name </lable></td><td>:</td><td><?php 
		if(isset($m2)){
			echo  $row['cus_fname'] ; }
			?></td>
        </tr>
        <tr><td><lable>Last Name </lable></td><td>:</td><td><?php 
		if(isset($m2)){
			echo  $row['cus_lname'];
		}?>
        </td>
        </tr>
        <tr><td><lable>Address </lable></td><td>:</td><td><?php 
		if(isset($m2)){
			echo  $row['address']; }
			?></td>
        </tr>
        <tr><td><lable>Contact Number&nbsp; </lable></td><td>:</td><td><?php 
		if(isset($m2)){
			echo  $row['contact']; }
			?></td>
        </tr>
        <tr><td><lable>E-mail </lable></td><td>:</td><td><?php 
		if(isset($m2)){
			echo  $row['email']; 
		}?></td>
        </tr>  
    
      <?php
	  }}
	  ?>                
      
                </table>
                </div>
</div>          
              </body>
              </html>
        
        
       
