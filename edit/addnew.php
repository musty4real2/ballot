
<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>

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
	
	$obj=new ballot();











if(isset($_POST['add'])){

$name=addslashes($_POST['name']);
$table=$_POST['table'];
$page=$_POST['page'];
//Process picture here

$insert="INSERT INTO `{$table}`(`name`, `pic`, `votecount`)VALUES (UPPER('$name'), '', '')";

$insert=$obj->mysqlQuery($insert);


header("location:$page?edit=1");
}


?>













<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<input type="hidden" name="table" value="<?php echo $_GET['table'];?>" />
Fullname: <input type="text" name="name" size="70"/>


<input type="hidden" name="page" value="<?php echo $_GET['page'];?>" />
<input type="submit" name="add" class="but" value="add"/>

</form>


</fieldset>




</body>
</html>