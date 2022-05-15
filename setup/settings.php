<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if($_SESSION['admin']==1){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::Cast your Vote</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tinybox.js"></script>


<body>

</head>


<!---Wrapper div-->
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


      <h1><img src="../images/set4.gif" width="141" height="144" />BALLOT SETUP</h1>

  <fieldset>
    
    
    
  <legend>SETTINGS</legend>
    
    <p>Click to enter contestant information</p>
    
    
	
    <table border="0" class="menutab">
    <tr> 
    <td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/pres_single_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>PRESIDENT (SINGLE)</a></div></td>

<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/president_group_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>PRESIDENT (GROUP)</a></div>
</td>
<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/vice_pres_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>VICE-PRESIDENT</a></div>
</td>
<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/general_secretary_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/><br/>GENERAL SECRETARY</a></div>
</td>
</tr>

<tr>
<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/ass_gen_sec_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>ASSISTANT GENERAL SECRETARY</a></div>
</td>
<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/treasurer_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>TREASURER</a>
</td>

<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/ass_treasurer_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>ASSISTANT TREASURER</a></div>
</td>

<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/financial_sec_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>FINANCIAL SECRETARY</a>
</td>

<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/ass_financial_sec_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>ASSISTANT FINANCIAL SECRETARY</a></div>
</td>

<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/director_of_research_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>DIRECTOR OF RESEARCH</a></div>
</td>
</tr>
<tr>
<td align="center" valign="middle"><div>

	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/director_of_socials_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>DIRECTOR OF SOCIALS</a></div>

</td>
<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/director_of_sports_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>DIRECTOR OF SPORTS</a>
</td>


<td align="center" valign="middle"><div>

	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/pro1_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>PUBLIC RELATIONS OFFICER I</a></div>
    </td>
<td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/pro2_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>PUBLIC RELATIONS OFFICER II</a></div>
	</td>
    <td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/wellfare1_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>WELLFARE OFFICER I</a></div>
    </td>
    <td align="center" valign="middle"><div>
	<a onclick="TINY.box.show({iframe:'http://localhost/ballot/setup/wellfare2_setup.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"><img src="../images/user-group-icon.png" width="70" height="70" /><br/>WELLFARE  OFFICER II</a></div>
    </td>
    </tr>
    </table>
    
    
    
  </fieldset>
<script type="text/javascript">
function openJS(){alert('loaded')}
function closeJS(){alert('closed')}
</script>
  
</div>
<!--End of body div-->






<!--Footer div-->
<div id="footer">
<p style=" color:#999;"><img   src="images/use.jpg" width="46" height="44" />Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->









</div>
<!---End of wrapper div-->
</body>
</html>
<?php } else {
	header("location:../admin/admin_login.php?acess=denied");
} ?>