<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../ballot_class.php");
include("../connect.php");
session_start();
$object=new ballot();
?>
<?xml version="1.0"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').live('change', function()			{ 
			           $("#preview").html('');
			    $("#preview").html("<img src='../ajax-loader.gif' width='31' height='31' alt=''/>Uploading...");
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();
		
			});
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
  
<br/>
<fieldset style="color:#CCC;"><center><h2><img src="../images/camera.JPG" width="135" height="119" />Upload your Picture</h2></center></fieldset>
<br/>
<br/>
<form action='ajaximage.php' method="post" id="imageform" enctype="multipart/form-data">
  <table border="0" width="591" style="margin:auto;">
  <tr>
  <td width="585"> Select your picture to upload:<br/><input type="file"  name="photoimg" id="photoimg"  size="80" /></td>
    </tr>
    </table> 
</form>
  <div  id="preview" >
</div>



</div>
<!--End of body div-->






<!--Footer div-->
<div id="footer">
<?php include('footer.php'); ?></div>
<!--End of footer div-->









</div>
<!---End of wrapper div-->
</body>
</html>
