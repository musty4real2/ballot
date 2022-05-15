<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>ballot::e-vote system</title>
<!-- TemplateEndEditable -->
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- TemplateBeginEditable name="head" -->


<!-- TemplateEndEditable -->

</head>

<body>

<!---Wrapper div-->
<div id="wrapper">




<!--Header div-->
<div id="header">

<img src="../images/logo.gif" width="248" height="98" />
<p style="color:#FFF; font-size:18px; position:absolute; top:55px; left:60%; font-family:Tahoma, Geneva, sans-serif;
font-style:normal;">
<?php 
 
include ("../ballot_class.php");
include("connect.php");
$fetchname="SELECT `ass` FROM `client`";

$obj=new ballot;

$object=$obj->mysqlQuery($fetchname);
while(
$row=mysql_fetch_array($object)){

echo $row['ass'];}
?>
</p>


</div>
<!--End of Header div-->



<!--body div--><!-- TemplateBeginEditable name="body" -->
<div id="body">

</div>
<!-- TemplateEndEditable --><!--End of body div-->






<!--Footer div-->
<div id="footer">
<p style=" color:#999;"><img   src="../images/use.jpg" width="46" height="44" />Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->









</div>
<!---End of wrapper div-->
</body>
</html>