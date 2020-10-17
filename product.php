<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Add to Cart</title>
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
    <div class="pro_table">
              
                 <table border="0" width="840" height="900" align="center" id="tble">
     <tr>
    	<th width="139">Name</th>
        <th width="292">Picture</th>
        <th width="133">Regular Price</th>
        <th width="123">Special Price</th>
        <th >Action</th>
	</tr>
    
        <?php
		$con=mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	      mysql_select_db('my_cart') or die('Error : '.mysql_error());
	 	
		if(isset($_SESSION['daily'] )|| ((!isset($_SESSION['weekly']) && (!isset($_SESSION['holiday']))))){
	
	$query = mysql_query("SELECT * FROM daily_special ORDER BY name ASC",$con);
	while($row=mysql_fetch_assoc($query)){
?>
    <tr>
    	<td><?php echo $row['name']; ?></td>
        <td align="center"><img src="images/<?php echo $row['image_num']; ?>" width="200px" height="100px"/> </td>
        <td><?php echo "Rs " . $row['reg_price'] ; ?></td>
        <td><?php echo "Rs " . $row['spec_price']; ?></td>
        <td width="121" align="center"><?php echo'<form action="Mycart.php" method="post"><input type="hidden" name="fname" value="'.$row['name'].'"/>
		<input type="hidden" name="quan" value="1"/>
		<input type="hidden" name="sp" value="'.$row['spec_price'].'"/>
		<input type="submit" value="Add to Cart" name="add"/></form>';?></td>
    </tr>
    
 
	<?php
	unset($_SESSION['daily']);

	?> 
    
     <?php
	 }}else if(isset($_SESSION['holiday'] )|| ((!isset($_SESSION['weekly']) && (!isset($_SESSION['daily']))))){
	
	$query = mysql_query("SELECT * FROM holiday_special ORDER BY name ASC",$con);
	while($row=mysql_fetch_assoc($query)){
	?>
    <tr>
    	<td><?php echo $row['name']; ?></td>
        <td align="center"><img src="images/<?php echo $row['image_num']; ?>" width="200px" height="100px"/> </td>
        <td><?php echo "Rs " . $row['reg_price'] ; ?></td>
        <td><?php echo "Rs " . $row['spec_price'] ; ?></td>
        <td width="121" align="center"><?php echo'<form action="Mycart.php" method="post"><input type="hidden" name="fname" value="'.$row['name'].'"/>
		<input type="hidden" name="quan" value="1"/>
		<input type="hidden" name="sp" value="'.$row['spec_price'].'"/>
		<input type="submit" value="Add to Cart" name="add"/></form>';?></td>
    </tr>
    
    </tr>
    
	<?php
	
	unset($_SESSION['holiday']);
	
	?> 
    <?php
	 }}else if(isset($_SESSION['weekly'] )|| ((!isset($_SESSION['holiday']) && (!isset($_SESSION['daily']))))){
	
	$query = mysql_query("SELECT * FROM weekly_special ORDER BY name ASC",$con);
	while($row=mysql_fetch_assoc($query)){
	?>
    <tr>
    	<td><?php echo $row['name']; ?></td>
        <td align="center"><img src="images/<?php echo $row['image_num']; ?>" width="200px" height="100px"/> </td>
        <td><?php echo "Rs " . $row['reg_price'] ; ?></td>
        <td><?php echo "Rs " . $row['spec_price'] ; ?></td>
        <td width="121" align="center"><?php echo'<form action="Mycart.php" method="post"><input type="hidden" name="fname" value="'.$row['name'].'"/>
		<input type="hidden" name="quan" value="1"/>
		<input type="hidden" name="sp" value="'.$row['spec_price'].'"/>
		<input type="submit" value="Add to Cart" name="add"/></form>';?></td>
    </tr>
    
    </tr>
    
	<?php
	
	unset($_SESSION['weekly']);
	
	?> 
     <?php
	}}
	?>       
    </table>
              
</div>
        
</div>
</body>
</html>