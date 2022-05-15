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

<?php
if($_GET['verify']==1){?>
<body onload="TINY.box.show({iframe:'http://localhost/ballot/admin/verify_confirm.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})">
<?php }
?>
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
  
  
  <h1><img src="../images/admin.gif" width="97" height="100" />Verify Voter</h1>
  
  <?php

$obj=new ballot;
//Total Number of Voters registered

$registered="SELECT count(`id`)  AS `registered` FROM `voters`";
$reg=mysql_query($registered);
while($row=mysql_fetch_array($reg)){
$registered=$row['registered'];
echo "Total number of registered voters: $registered<br/>";
}


//check number of voters verified

$verified="SELECT count(`verstatus`) AS `verified` FROM `voters` WHERE `verstatus`=1";
$ver=mysql_query($verified);
while($row=mysql_fetch_array($ver)){
$verified=$row['verified'];
echo "Total number of voters verified as at". date("h:ia") .": $verified<br/>";
}


//total number of voters yet to be verified

$yet=$registered-$verified;

echo "voters have yet to be verified as at". date("h:ia").":$yet<br/>";	


//Get Total Number of votes casted

$votecasted="SELECT count(voterid) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($row=mysql_fetch_array($vot)){
$casted=$row['votecasted'];

echo "Total Number of Votes casted as at".date("h:ia").":<b> $casted</b><br/>";
}


//total number of voters yet to vote

$yet=$registered-$casted;

echo "Voters yet to vote as at". date("h:ia").":<b> $yet</b><br/>";	






  
  
  
  ?>
  
  <fieldset style="height:100px;">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
    
  <table width="800" border="0" style="margin:30px auto;">
    <tr>
      <td> Enter Usernamer: </td>
      <td><label for="textfield"></label>
        <input style="font-size:20px;" type="text" name="matric" maxlength="14" autocomplete="off" size="50"/></td>
     <div id="layer1"></div>
 
      <td><input name="verify" type="submit"  value="check" class="but"/></td>
      
      
      </tr>
  </table>
    
  </form>
  </fieldset>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <?php

if(isset($_GET['verify'])){
	$matric=addslashes($_GET['matric']);
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;
	$all=$obj->selectAllWhere("voters", "username", "$matric");

 if(mysql_num_rows($all) >1){echo "<h3>ERROR: Two voters with the same username !<br/>Go <a href='twomatric.php?matric=$matric'>here</a> to see details and correct this error</a></h3>";
	  die();
	  }
if(mysql_num_rows($all) !=0){
?>
  
  <fieldset style="height:100px;">
  <legend>RRESULT</legend>
    
    
    <table  width="800" border="0" style="margin:10px auto;">
  <?php
while($row=mysql_fetch_array($all)){

?>
      
      
      
      
      
      
      
      <tr>
        <td><?php echo $row['surname'];?></td>
        <td><?php echo $row['firstname'];?></td>
        <td><?php echo $row['matric'];?></td>
        <td><?php echo $row['dept'];?></td>
        <td><?php echo $row['password'];?></td>    <?php $_SESSION['verid']=$row['id']; ?>
        
        <td style="color:#F00;"><?php if($row['verstatus']==1){echo "Verified";} else {?>
        <form action="verify.php" method="post">
          <input type="submit" class="but" onclick="return confirm('Verify Voter?');" value="Verify Voter" />
  </form>
  <?php } ?></td>
        
  <td style="color:#F00;"><?php if($row['votestatus']==1){echo "Voted";} else { echo "Not Voted";  }?></td>
        
        
        </tr>
      
      
      <?php }}
	  if (mysql_num_rows($all) ==0) {echo "";}
	 
}?>
      </table>
    
    
  </fieldset>
  <script type="text/javascript">
function openJS(){alert('loaded')}
function closeJS(){alert('closed')}
</script>
  
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
<?php
}else {
	header("location:admin_login.php?acess=denied");
} ?>