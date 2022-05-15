<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if($_SESSION['admin']==1){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::e-vote system</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tinybox.js"></script>

</head>

<body>

<!---Wrapper div-->
<div id="wrapper">




<!--Header div-->
<div id="header">

<img src="../images/logo.gif" width="248" height="98" />
<p style="color:#FFF; font-size:14px; position:absolute; top:20px; left:65%;">
<?php 
 
include ("../ballot_class.php");
include("../connect.php");
$fetchname="SELECT * FROM `client`";

$obj=new ballot;

$object=mysql_query($fetchname);
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
if($_SESSION['admin']==1){

	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
$obj= new ballot;


//Total Number of Voters registered

$registered="SELECT count(`id`)  AS `registered` FROM `voters`";
$me=mysql_query($registered) or die(mysql_error());
while($row=mysql_fetch_array($me)){
$registered=$row['registered'];
echo "Total number of registered voters: $registered<br/>";
}


//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$votecasted=mysql_query($votecasted);
while($row=mysql_fetch_array($votecasted)){
$casted=$row['votecasted'];

echo "Total Number of Votes casted as at". date("h:i a").": $casted<br/>";
}


//total number of voters yet to vote

$yet=$registered-$casted;

echo "Voters yet to vote as at ".date(" h:i a").": $yet";	
?>

  <a href="logout.php">log out</a>

 <center> <fieldset>
  
  

  
  
<table  class="menutab" border="0" width="800" height="400" cellspacing="0" >
  
  <tr>
  <td align="center" valign="middle"><div><?php echo "<a href='reset_ballot.php?register=1'><img src='../images/refresh.gif' width='63' height='81' /><br/>Reset BALLOT</a>"; ?></div>
  </td>
  <td align="center" valign="middle"><div><a href="../edit/edit.php"><img src="../images/set3.gif" width="55" height="73" /><br/>EDIT SETUP</a></div>
  </td>
  <td align="center" valign="middle"><div>
<a href="../setup/settings.php"><img src="../images/set4.gif" width="73" height="73" /><br/>SETUP BALLOT</a></div>
  </td>
 
  <td align="center" valign="middle"><div>
  
    <a onclick="TINY.box.show({iframe:'http://localhost/ballot/edit/edit_client.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/set1.gif" width="68" height="68" /><br/>
    EDIT CLIENT SETUP</a>
    </div>
  </td>
 
  </tr>
  <tr>
  <td align="center" valign="middle">
  
  <div><a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/ballot_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/set2.gif" width="86" height="81" /><br/>
  CLIENT SETUP</a></div>
</td>

  
  
<td align="center" valign="middle"> <div> 
  <a href="error_logs.php"><img src="../images/warn.jpg" width="82" height="69" /><br/>VIEW ERROR LOGS</a></div>
  </td>
  
  <td align="center" valign="middle" ><div>
  <a href="live_results.php"><img src="../images/result.gif" width="84" height="75" /><br/>VIEW LIVE RESULTS</a>
  </div></td>
  <td align="center" valign="middle"><div>
  <a href="../setup/register_voters.php"><img src="../images/add_voters.gif" width="75" height="83" /><br/>Register Voters</a>
  </div></td>
   </tr>
  <tr>
  <td align="center" valign="middle"><div>
  <a href="voters.php"><img src="../images/list.gif" width="76" height="81" /><br/>VOTERS</a>
  </div></td>
  <td align="center" valign="middle"><div>
  <a href="verification.php"><img src="../images/admin.gif" width="71" height="73" /><br/>VERIFY VOTER</a>
  </div></td>
  <td align="center" valign="middle"><div>
  <a href="voted.php"><img src="../images/like.gif" width="93" height="75" /><br/>VOTED</a>
  </div></td>
  <td align="center" valign="middle"><div>
  <a href="analysis.php"><img src="../images/bulb.gif" width="42" height="77" /><br/>VIEW VOTE ANALYSIS</a>
  </div></td>
  </tr>
  </table>
  
  <?php }
//redirect to admin login if session does not exist
elseif($_SESSION['admin']!=1){
header("location:admin_login.php?access=denied");

}



?>
  
  
 </fieldset>
</center>
</div>
  
</div>
<!--End of body div-->






<!--Footer div-->
<div id="footer">
<p>Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->









<!---End of wrapper div-->
</body>
</html>
<?php
}else {
	header("location:admin_login.php?acess=denied");
} ?>