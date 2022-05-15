<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>ballot::e-vote system</title>
<script type="text/javascript" src="xmlhttp.js"></script>
<script type="text/javascript" src="functions.js"></script>

<!-- InstanceEndEditable -->
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

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
include("../connect.php");
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



<!--body div--><!-- InstanceBeginEditable name="body" -->

<div id="body">
<?php

echo $_GET['name'];

echo "POSITION:".$_GET['position'];


?>










<form action="upload-file.php"  id="uploadform" method="post" enctype="multipart/form-data" target="uploadframe" >
<iframe id="uploadframe" name="uploadframe" src="upload-file.php"
class="noshow"></iframe>
  <table width="800" border="1">
  <input type="hidden" name="MAX_FILE_SIZE" value="100000000" /> 
    <tr>
      <td>Picture:</td>
      <td><label>
        <input name="picture" type="file" id="fileField" size="10" />
      </label>
      <input type="hidden" name="table" value="<?php echo $_GET['table'];?>" />
      <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="upload" id="button" value="upload" /></td>
    </tr>
  </table>
</form>










</body>
</html>








</div>
<!-- InstanceEndEditable --><!--End of body div-->






<!--Footer div-->
<div id="footer">
<p style=" color:#999;"><img   src="../images/use.jpg" width="46" height="44" />Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->









</div>
<!---End of wrapper div-->
</body>
<!-- InstanceEnd --></html>