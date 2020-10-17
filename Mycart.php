<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/style.css" type="text/css">
<title>Cart</title>
</head>

<body>
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
               <div class="account" style="height: auto">
<?php
if(isset($_POST['update'])){
	if(isset($_SESSION['cus_id'])){
	mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	mysql_select_db('my_cart') or die('Error : '.mysql_error());
	$qty= $_POST['quan'];
	$id=$_POST['cart'];
	$pr=$_POST['prc'];
	$tot=$pr*$qty;
	mysql_query("UPDATE cart SET quantity='$qty', total='$tot' WHERE cart_id='$id'")or die(mysql_error());
		
	}
		}
	?>
 <form method="post" action="">
<table border="1" id="carttb1" width="500px">
	<tr>
    	<td style="color:#FFF">Name</td>
        <td style="color:#FFF">Quantity</td>
        <td style="color:#FFF">Price</td>
        <td style="color:#FFF">Sub Total</td>
	</tr>
    <?php
	if(isset($_SESSION['user'])){
	$i=$_SESSION['cus_id'];
	$_SESSION['counter']=1;
	if(isset($_POST['add'])){
	mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	mysql_select_db('my_cart') or die('Error : '.mysql_error());
	$n=$_POST['fname'];
	$pr=$_POST['sp'];
	$c=$_SESSION['cus_id'];
	$_SESSION['pr1']=$pr;
	$qty=$_POST['quan'];
	$nto=$qty*$pr;
	mysql_query("INSERT INTO cart(cus_id,food_name,price,quantity,total)VALUES('$c','$n','$pr','$nto',$qty)");
	unset($_POST['add']);
	}
	

			
			if($_SESSION['counter']){
			
	?>
    <?php
	mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	mysql_select_db('my_cart') or die('Error : '.mysql_error());	
	$gt=0.00;
	$query=mysql_query("SELECT * FROM cart WHERE cus_id='$i'");
	while($row=mysql_fetch_assoc($query)){
	echo
	'<tr>
		<td>'. $row['food_name'].'</td>
        <td><input type="text" name="qty" value="'.$row['quantity'].'" width="10px"/> </td>
		<input type="hidden" name="cart" value="'.$row['cart_id'].'"/>
		<input type="hidden" name="prc" value="'.$row['price'].'"/>
        <td>Rs '.$row['price'].'</td>
        <td>Rs '.$row['total'].'</td>       
	</tr>';
      	$gt=$gt+$row['total'];
	  }
	  ?>
    <?php
			
			}
	?>
			
    <tr>
    	<td colspan="3">Total Price: <h1><?php echo 'Rs '.$gt.'.00 </h1><td>';?></h1></td>
    </tr>
<?php
 }
?>
<?php
 if(!isset($_SESSION['user'])){
?>	<tr><td colspan="4" height="50px"><?php echo "<i>Add product to your cart."; ?></td></tr> 
	<?php }
	?>
</table>
<table border="0" id="carttb2">
<tr><td>Fill this field before you order</td>
</tr>
<tr>
<td><label>Delivery Date :</label> <input type="date" name="year" placeholder="20xx-month-day"/>
<input type="submit" name="order" value="order now" /></td>
</tr>
<tr >
<td>
<input type="submit" name="update" value="Update Cart" />


</td>
</tr>


<tr >

<?php
  if(isset($_SESSION['user'])){
?>
<td><a href="product.php">Select more food</a></td></tr>
<?php  }else{
?>
   <tr>  <td><a href="login.php">Select more food</a></td>
	<?php
}
?>
</tr>
<tr ><td style="color: #400000">To remove an item, set quantity to 0.</td></tr>

</table>
</form>


</div>
  
</div>
</body>
</html>