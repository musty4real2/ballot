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

<img src="../images/logo.gif" width="248" height="98" />
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
  <div id="card2">

  
    
    
  <?php	
$code=$row['code'];
$dob=$row['dob'];

} 

?>
    
    <a style="position:absolute; top:10px; left:900px; text-decoration:none; color:#666; border:none;" href="../admin/admin_menu.php"><img src="../images/home.gif" width="52" height="54" style="border:none;" /><br/>&nbsp; &nbsp;HOME  </a>
    
    
    
  <table  height="216" WIDTH="680" style="position:relative; top:110px; left:20px;">
    <tr>
              <td><CENTER>The holder of this card is a bonafide member of the</CENTER></td>
              </tr>
             <tr>
          <td><CENTER>MINNA EMIRATE YOUTH ASSOCIATION (MEYA)</CENTER></td></tr>
          <tr> <td><center><img src="../images/AREWA.jpg" height="80" width="80"/></center></td>
          </tr>
          <tr>
          <td><center>If found please return to the office of the <br/>
          President Minna Emirate youth association<br/>
          Emir's Palace
          minna, Niger state.</center>
          </td>
    

      </tr>
    

    
    </table>
    
    
    <table border="0" width="680" style="text-align:center; position:relative; top:115px; left:20px;">
      <tr>
        <td height="98">  <center><img src="<?php echo "../barcodegen.1d-php5.v5.0.1/test.php?code=$code";?>" alt="barcode" height="60" width="500" /></center></td>

        </tr>
  </table>
    
  </div>
  
  
  
  <p>&nbsp;</p>
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