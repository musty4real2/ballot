<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::admin login here</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="tinybox.js"></script>

<script type="text/javascript">
$(document).ready(function () {
	$("ul.menu_body li:even").addClass("alt");
    $('img.menu_head').click(function () {
	$('ul.menu_body').slideToggle('medium');
    });
	$('ul.menu_body li a').mouseover(function () {
	$(this).animate({ fontSize: "14px", paddingLeft: "20px" }, 50 );
    });
	$('ul.menu_body li a').mouseout(function () {
	$(this).animate({ fontSize: "12px", paddingLeft: "10px" }, 50 );
    });
});
</script>

</head>
<?php 
if($_GET['login']=='denied'){?>
<body onload="TINY.box.show({html:'Invalid username or Password',animate:false,close:false,boxid:'error',top:5})">
<?php }

if($_GET['logout']==1){?>
<body onload="TINY.box.show({html:'You have been logged out',animate:false,close:false,boxid:'error',top:5})">
<?php }


if($_GET['acess']=='denied'){?>
<body onload="TINY.box.show({html:'ACESS DENIED: You have to be logged in as administrator',animate:false,close:false,boxid:'error',top:5})">
	
    <?php	}
   else{?>
<body>
<?php } ?>


<!---Wrapper div-->
<div id="wrapper">




<!--Header div-->
<div id="header">

<img src="../images/logo.gif" width="248" height="98" />
<p style="color:#FFF; font-size:14px; position:absolute; top:20px; left:65%;">
<?php 
 
include_once ("../ballot_class.php");
include_once("connect.php");
$fetchname="SELECT * FROM `client`";

$object=mysql_query($fetchname) or die(mysql_error());
while(
$row=mysql_fetch_array($object)){

echo "<img src='../uploads/{$row['logo']}' width='10%' height='10%'/>".$row['assname'];}
?>
</p>

</div>
<!--End of Header div-->



<!--body div-->
<div id="body">



  
  <div class="container">
 <center> <img src="../images/navigate.gif" width="463" height="141" class="menu_head"/></center>
<ul class="menu_body">
  <fieldset style="background-image:url(../images/padlock.gif); background-repeat:no-repeat; background-position:bottom right; border:1px  solid #e1e5e2; margin-left:250px;">
  <legend>Admin Login</legend>
    
    
  <?php
if(isset($_POST['login'])){

	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;
	$all=$obj->selectall("pres_single");


	$user=addslashes($_POST['user']);
	$pass=addslashes($_POST['pass']);

	$check="SELECT `username`, `password` FROM `admin` WHERE `username`='$user' AND `password`='$pass'";
$c=mysql_query($check);
	
	if(mysql_num_rows($c)==1){
	
	$_SESSION['admin']=1;
	
header("location:admin_menu.php");	

}
elseif(mysql_num_rows($c)!=1){

$log="INSERT INTO `error_logs` (`location`, `user`, `pass`, `time`) VALUES ('admin_login.php', '$user', '$pass', NOW())";
$l=mysql_query($log);
				header("location:admin_login.php?login=denied");
}}

?>
    
    
    
    
    
    
    
    
    

    
    
  <img src="images/admin.gif" width="187" height="185" />
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="loginform">
    
  <table width="600" border="0">
    <tr>
      <td>Username:</td>
      <td><label for="textfield"></label>
        <input type="text" name="user" id="textfield" maxlength="14" autosuggest="off" size="40" /></td>
      </tr>
    <tr>
      <td>Password:</td>
      <td><label for="textfield2"></label>
        <input type="password" name="pass" id="textfield2"  maxlength="8" size="40"/></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>  <input type="submit" name="login" value="login"  class="but" /></td>
      </tr>
  </table>
  </form>
  
  </fieldset>

</ul>
</div>

  
  
    
    
    
    
    
</div>
<!--End of body div-->















</div>
<!---End of wrapper div-->
<!--Footer div-->
<div id="footer">
<p>Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->
</body>
</html>