<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::e-vote system | voters login</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tinybox.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
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



<?php if($_GET['not_verified']==1){?>
<body onload="TINY.box.show({html:'You have not been verified and you cant vote. Please go to the verification desk',animate:false,close:false,boxid:'error',top:5})">
<?php }

if($_GET['voted']==1){?>

<body onload="TINY.box.show({html:'You have already voted. You cant vote twice',animate:false,close:false,boxid:'error',top:5})">
<?php }


if($_GET['vote']=='completed'){?>
<body onload="TINY.box.show({iframe:'http://127.0.0.1/ballot/vote/vote_sucess.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})">
<?php }



if($_GET['acess']=='denied'){?>
<body onload="TINY.box.show({html:'You must be logged in to vote',animate:false,close:false,boxid:'error',top:5})">
<?php }


if($_GET['login']=='denied'){?>

<body onload="TINY.box.show({html:'Invalid username or Password',animate:false,close:false,boxid:'error',top:5})">
<?php }
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
  
<?php


//Total Number of Voters registered

$registered="SELECT count(`id`)  AS `registered` FROM `voters`";
$me=mysql_query($registered) or die(mysql_error());
while($row=mysql_fetch_array($me)){
$registered=$row['registered'];
}


//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$votecasted=mysql_query($votecasted);
while($row=mysql_fetch_array($votecasted)){
$casted=$row['votecasted'];

echo  "<p style='font-family:Verdana, Geneva, sans-serif; font-size:76px; color:#F60; text-align:center;'>$casted Voted</p>";
}

?>





<div class="container">
 <center> <img src="../images/navigate.gif" width="463" height="141" class="menu_head"/></center>
<ul class="menu_body">









  
  
    
        
    
    
  <fieldset style="background-image:url(../images/padlock.gif); background-repeat:no-repeat; background-position:bottom right; border:1px  solid #e1e5e2; margin-left:250px;">
<?php



if(isset($_POST['login'])){
	
	$matric=addslashes($_POST['matric']);
	$pass=addslashes($_POST['pass']);
	
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	
	//compare with records in dbase and fetch where
	$check="SELECT * FROM `voters` WHERE `username`='$matric' AND `password`='$pass'";
	if(!$c=mysql_query($check)){
		echo "ERROR:". mysql_error();
		}
		
		//else, if the query was succesful
		else{
			
			//if nomatch was found in the set retuned
			if(mysql_num_rows($c)!=1){
$log="INSERT INTO `error_logs` (`location`, `user`, `pass`, `time`) VALUES ('login_vote.php', '$matric', '$pass', NOW())";
$l=mysql_query($log);
				header("location:login_vote.php?login=denied");

				}//end of IF
				
				
				//get records from the voters table to ensure that the matric password exist and voter has been verified
			while($row=mysql_fetch_array($c)){
				
				//Ifa a match was found and the voter has been verified
			if(mysql_num_rows($c)==1 && $row['verstatus']==1 && $row['votestatus']==0){
$_SESSION['cur_voter']=1;
			$_SESSION['voterid']=$row['id'];
			$_SESSION['username']=$row['username'];
			$_SESSION['name']=$row['surname']. "  ".$row['firstname'];
			$_SESSION['branch']=$row['branch'];
			
			header("location:vote.php");				
				}//end of IF
			
			//IF a match was found but voter has not been verified at the desk
			if(mysql_num_rows($c)==1 && $row['verstatus']==0){
			
header("location:login_vote.php?not_verified=1");
}//end of IF
			
			//if a match is found but voter has alreafy voted
			if(mysql_num_rows($c)==1 && $row['verstatus']==1 && $row['votestatus']==1){
			
header("location:login_vote.php?voted=1");
	}//end of IF
			
			}//end of while
		
		}
	
			
		}
	

?>
    
    
  <legend>Login Here</legend>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  >
    
  <table width="600" border="0">
    <tr>
      <p>
        <td>Username:</td></p>
      <p><td><label for="textfield"></label>
        <input type="text" name="matric" id="textfield" maxlength="14" size="40"  /></td></p>
      </tr>
    <tr>
      <td>Password:</td>
      <td><label for="textfield2"></label>
        <input type="password" name="pass" id="textfield2"  maxlength="9" size="40"/></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>  <input   type="submit" name="login" value="login" class="but"  /></td>
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
<div id="footer">
<!--Footer div-->
<p>Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div><!--End of footer div-->
</body>
</html>