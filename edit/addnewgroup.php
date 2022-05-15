<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<fieldset style="margin-top:100px;">
<legend>Add new to this category</legend>


<?php


	
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;
	$all=$obj->selectall("pres_single");




if(isset($_POST['add'])){

$presname=addslashes($_POST['presname']);

$vpresname=addslashes($_POST['vpresname']);

//Process picture here

$insert="INSERT INTO `presgroup` (`presname`, `prespic`,`vpresname`, `vprespic`, `votecount`)
VALUES('$presname', '', '$vpresname', '', '')";

$insert=$obj->mysqlQuery($insert);


header("location:edit_presgroup_frame.php?edit=1");
}



?>













<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

<table border="0" width="90%">
<tr>
<td>President1 (Fullname):</td>
<td> <input type="text" name="presname" size="70"/></td>
</tr>

<tr>
<td>Vice-President (Fullname):</td>
<td> <input type="text" name="vpresname" size="70"/></td>
</tr>

<tr>
<td></td>
<td>
<input type="submit" name="add" class="but" value="add"/>
</td>
</tr></table>

</form>

</fieldset>




</body>
</html>