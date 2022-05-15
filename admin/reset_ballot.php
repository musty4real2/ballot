<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

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
if($_GET['register']==1){?>
<body onload="TINY.box.show({iframe:'http://localhost/ballot/setup/ballot_has_been_reset.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})">
<?php }

else {
	?>
  
  <body>
    <?php
	}
?>
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
include("connect.php");
 $query="TRUNCATE TABLE `assfinsec`";
 $exe=@mysql_query($query);
 
 
  $query2="TRUNCATE TABLE `assgensec`";
 $exe2=@mysql_query($query2);
 
   $query3="TRUNCATE TABLE `asstreasurer`";
 $exe3=@mysql_query($query3);
 
  $query4="TRUNCATE TABLE  `finsec`";
 $exe4=@mysql_query($query4);
 
  
  $query5="TRUNCATE TABLE  `gensec`";
 $exe5=@mysql_query($query5);
 
  
  $query6="TRUNCATE TABLE  `presgroup`";
 $exe6=@mysql_query($query6);
 
  $query7="TRUNCATE TABLE  `pres_single`";
 $exe7=@mysql_query($query7);
 
   $query8="TRUNCATE TABLE  `pro1`";
 $exe8=@mysql_query($query8);
 
    $query9="TRUNCATE TABLE  `pro2`";
 $exe9=@mysql_query($query9);
 
    $query10="TRUNCATE TABLE  `research`";
 $exe10=@mysql_query($query10);
 
     $query11="TRUNCATE TABLE `socials`";
 $exe11=@mysql_query($query11);
 
 
     $query12="TRUNCATE TABLE  `sports`";
 $exe12=@mysql_query($query12);
 
     $query13="TRUNCATE TABLE  `treasurer`";
 $exe13=@mysql_query($query13);
 
    $query15="TRUNCATE TABLE  `voted`";
 $exe15=@mysql_query($query15);
  
    $query16="TRUNCATE TABLE  `voters`";
 $exe16=@mysql_query($query16);
 
  
    $query17="TRUNCATE TABLE  `vpres`";
 $exe17=@mysql_query($query17);
 
 
  
    $query18="TRUNCATE TABLE  `wellfare1`";
 $exe18=@mysql_query($query18);
 
   $query19="TRUNCATE TABLE  `wellfare2`";
 $exe19=@mysql_query($query19);
 
?>

<center><?php echo "<a href='../admin/admin_menu.php'>Go to Home</a>";?></center>

</div>
<!--End of body div-->






<!--Footer div-->
<div id="footer">
<p>Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->









</div>
<!---End of wrapper div-->
</body>
</html>