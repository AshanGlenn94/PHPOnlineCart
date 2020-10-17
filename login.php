<?php
  session_start(); 

	if(isset($_POST['Submit'])){
		$msg="";
	
	//now we check to see if the passwords match 
	if($_POST['Password'] !== $_POST['CPassword']){ 
	$msg .=" Your password does not match the confirmation password please check and try again."; 
	
	} 
	else{
		$pass=$_POST['Password'];
	    $title=$_POST['title'];
	    $f_name=$_POST['FName'];
        $l_name=$_POST['LName'];
		$add=$_POST['Address'];
		$contact=$_POST['Contact'];
	    $email=$_POST['E-mail'];

	$con=mysql_connect('localhost','root','') or die('Error : '.mysql_error());
	
	mysql_select_db('my_cart') or die('Error : '.mysql_error());
	 
	$query="INSERT INTO 
					cus_detail
					(
					cus_title,
					cus_fname,
					cus_lname,
					address,
					contact,
					email,
					password
					)VALUES(
					'$title',
					'$f_name',
					'$l_name',
					'$add',
					'$contact',
					'$email',
					'$pass'
					)"
		or die('Error : '.mysql_error());
			
	if(mysql_query($query,$con)){
	header('location:product.php');
	$query1=mysql_query("SELECT * FROM cus_detail  WHERE email='$email'");
        if($query1>0){
	     $row= mysql_fetch_assoc($query1);
		$_SESSION['user']=$row['email'];
		}
	
	}
else{
	die('error processing'.mysql_error());

    }

	
	}

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Login</title>
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
			echo"<a href='logout.php' id='link'>Log Out</a>";
			}
			?></li>
		</ul>
	<header>
  </div>
    <div class="bnr">
		<img src="images/bnr.png" width="780" height="328" />
    </div>
    
    <div style="border: double; width: 400px; height: 403px; margin-top: 30px; margin-left: 30px; float: left; position: absolute; top: 445px; left: 9px; background-color: #666">
               
               <table style="margin-left:30px">
               <form  method="post" action="">
               <tr>
                <td colspan="2" align="center">CREATE AN ACCOUNT</br></td>
                </tr>
               <tr>
                 <td colspan="2" style="margin-left:37px">Personal Information</td> 
                 </tr>
                <tr>
                 <td width="200px" height="30px">Title</td><td height="30px"><select name="title">
                                            <option value="Mrs">Ms</option>
                                            <option value="Ms">Mis</option>
                                            <option value="Mr">Mr</option>
                                            </select>
     </td>              
				</tr>
                <tr>
                 <td width="200px" height="30px">First Name</td><td height="30px" ><input type="text"  name="FName" required/>          
     
                 </td>              
				</tr>
                <tr>
                 <td width="200px" height="30px">Last Name</td><td height="30px" ><input type="text"   name="LName" required/></td>              
				</tr>
                <tr>
                 <td width="200px" height="30px">Address</td><td ><textarea style="height:60px; width:135px" name="Address" required></textarea></td>              
				</tr>
                <tr>
                 <td width="200px" height="30px">Contact Number</td><td height="30px" ><input type="text"   name="Contact" required/></td>              
				</tr>
                <tr>
                 <td width="200px" height="30px">E-mail</td><td height="30px" ><input type="text"   name="E-mail" required/></td>              
				</tr>
                <tr>
                 <td width="200px" height="30px">Password</td><td height="30px"><input type="password"   name="Password" id="passwordR"  required></td>              
				</tr>
                <tr>
                 <td width="200px" height="30px">Confirm Password</td><td height="30px" ><input type="password"   name="CPassword" id="confirm_password" required ></td>              
				</tr>
                <tr>
                 <td width="200px" height="30px"></td><td align="right" height="30px" ><input type="submit" value="SUBMIT"  name="Submit"/></td>              
				</tr>
                </form>
                 <p style="color:#FF8A8A";>
                 <?php
				 
     if(isset($msg)){
	   echo "$msg";
	
	 }
     ?>
	
</p>
                 </form>    
      
                </table>
 
                
              
                </div>
                <div style="border: double; width: 342px; height: 208px; margin: 30px 30px; float: left; position: absolute; left: 446px; top: 445px; background-color: #666">
               
               <table style="margin-left:30px">
               <form action="member.php" method="post">
               <tr>
               <br>
                <td colspan="2" align="center">REGISTERED CUSTOMERS</br></td>
                </tr>
               <tr>
                 <td colspan="2" style="margin-left:37px">If you have an account with us, please login</td> 
                 </tr>
                
                <tr>
                 <td width="200px" height="30px">E-mail</td><td height="30px"><input type="text"  name="memail"/></td>              
				</tr>
                <tr>
                 <td width="200px" height="30px">Password</td><td height="30px"><input type="password"   name="mpassword"/></td>              
				</tr>
                
                <tr>
                 <td width="200px" height="30px"></td><td align="right" height="30px"><input type="submit" value="LOGIN"  name="login"/></td>              
				</tr>
                </form>

                </table>
            
         
          </div>
                
</div>

</body>
</html>