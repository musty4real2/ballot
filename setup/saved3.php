<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../ballot_class.php");
include("../connect.php");
session_start();
$object=new ballot();
?>
<xml version="1.0"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

<title>ballot::e-vote system</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>
</head>

<body>
<div id="wrapper">




<!--Header div-->
<div id="header">
  <p style="color:#FFF; font-size:14px; position:absolute; top:20px; left:65%;">
  <?php 
 
include("../connect.php");
$fetchname="SELECT * FROM `client`";

$b=mysql_query($fetchname);
while(
$row=mysql_fetch_array($b)){

echo "<img src='../uploads/{$row['logo']}' width='10%' height='10%'/>".$row['assname'];}
?>
</p>
</div>
<!--End of Header div-->



<!--body div-->
<div id="body">

<div style="position:absolute; left:1100px; top:10px;">
  <img src="../images/print.JPG" width="36" height="41" />
  <SCRIPT LANGUAGE="JavaScript">
<!-- Begin
if (window.print) {
document.write('<form>'
+ '<input type="button" name="print" value="  Print  " '
+ 'onClick="javascript:window.print()"></form>');
}
// End -->
</SCRIPT></div>

<?php
//GET PICTURE HERE!!!!

$getpic="SELECT * FROM `voters` WHERE `id`='{$_SESSION['voterid']}'";
$q=@mysql_query($getpic) or die(mysql_error());

while($row=mysql_fetch_array($q)){

?>

<!--body div-->
<div id="body">
  <br/>
  <br/>
  <p style="font-size:16px; color:#999; margin-left:20px;">Dear <?php echo $row['surname'];?>,<br/>
    
    Your registration was successfull! Your login credentials has been sent to your email address you provided.<br/>Please print your Voters card</p>
  <div id="card">
<?php

$picture=$row['picture'];
if($picture!=""){
$pic=getimagesize("../voterspic/$picture");
?>
  <img  style="position:absolute; top:296px; left:232px;" src="<?php echo "../voterspic/$picture";?>"  <?php echo $object->imageResize ($pic[0], $pic[1], 180);?> alt="<?php echo $row['code'];?>" />
  <?php } 

if($picture==""){
$pic=getimagesize("../images/voters_img.gif");
?>
  <img  style="position:absolute; top:293px; left:232px;" src="<?php echo "../images/voters_img.gif";?>"  <?php echo $object->imageResize($pic[0], $pic[1], 150);?> alt="<?php echo $row['code'];?>" />
    
    
  <?php	} 
$fname=$row['firstname'];
$sname=$row['surname'];
$mname=$row['mname'];
$uname=$row['username'];
$code=$row['code'];
$dob=$row['dob'];
$sex=$row['sex'];
$add=$row['address'];
$occ=$row['occupation'];

	}


?>
       

    
  <table  height="216" style="position:relative; top:110px; left:20px;">
    <tr>
      <td width="206" height="54"></td>
      <td width="97">Surname:<br/><b style="color:#000;"><?php echo strtoupper($sname);?></b></td>
      <td width="133">Firstname:<br/><b style="color:#000;"><?php echo strtoupper($fname);?></b></td>
      <td width="194">Sex:<br/><b style="color:#000;"><?php echo $sex;?></b></td>
  </tr>
    <tr>
      <td height="59"></td>
            <td>Occupation:<br/><b style="color:#000;"><?php echo $occ;?></h2></td>
      <td>Address:<br/> <b style="color:#000;"> <?php echo $add;?></h2></td>

            <td>Username:<br/><b style="color:#000;"><?php echo $uname;?></b></td>

      </tr>
    <tr>
      <td height="93"></td>
      <td>Date of Birth:<br/><h2 style="color:#000;"><?php echo $dob;?></h2></td>  
      </tr>
    
    
    
    
    </table>
    
    
    <table border="0" width="680" style="text-align:center; position:relative; top:115px; left:20px;">
      <tr>
        <td height="98"><Center><b>VIN:</b><br/>>>>>><?php echo $code;?>&nbsp;>>>><?php echo date("d M, Y g:h A");?></Center></td>
        </tr>
  </table>
    
  </div>
  
  
  
  <p><?php echo "<a href='back.php?id={$_SESSION['voterid']}'>Get Voter's card back</a>"; ?></p>
  <p>&nbsp;</p>
  
</div>
<!--End of body div-->

	<!-- Footer -->
	<div id="footer" class="box">

		<p class="f-left">&copy; 2012 <a href="#">NSEC eVoting</a>, All Rights Reserved &reg;</p>

		<p class="f-right">Developed by <a href="#">DAMIAN UGIOMOH</a></p>

	</div> <!-- /footer -->

</div> <!-- /main -->
</body>
</html>