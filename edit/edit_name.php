
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::e-vote system</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<!---Wrapper div-->
<div id="wrapper">



  <fieldset style="padding:5px;">
    
    
    
    <legend>edit name</legend>
    
  
<?php 
 
include_once ("../ballot_class.php");
include_once("../connect.php");
$obj=new ballot;

if(isset($_GET['save'])){
	
	
	$newname=addslashes($_GET['newname']);
	
	
	$id=$_GET['id'];
	$table=$_GET['table'];
	$page=$_GET['page'];
	
	
	
	$update="UPDATE `{$table}` SET `name`='$newname' WHERE `id`='$id'";
	$update=$obj->mysqlQuery($update);
	
	header("location:$page?edit=1");
	
	
	}











$page=$_GET['page'];
$table=$_GET['table'];
$id=$_GET['id'];

$object=$obj->selectAllWhere($table, 'id', $id) ;

while($row=mysql_fetch_array($object)){
?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
<table border="0" width="90%" height="300">

<tr>
<td>Position:</td> 
<td <td style="font-size:16px; width:200px; font-weight:bold; color:#30a3e5;"><?php echo $_GET['position'];?></td>
<td><?php if($row['pic']==""){echo "<img src='../images/voters_img.gif' width='30%' height='30%' />";} else{ echo "<img src='../uploads/{$row['pic']}' width='30%' height='30%' />"; } ?></td>
</tr>
<tr>
<input type="hidden" value="<?php echo $page;?>" name="page" />
<input type="hidden" value="<?php echo $id;?>" name="id"  />
<input type="hidden" value="<?php echo $table;?>" name="table"  />
<td>Old Name:</td>
<td style="font-size:16px; width:200px; font-weight:bold; color:#30a3e5;"> <?php echo $row['name'];?></td>
<td>New Name:<input type="text" value="<?php echo $row['name'];?>" name="newname" size="50" /></td>
</tr>
<tr>
<td></td>
<td></td>
    <td><input type="submit" name="save" class="but" value="SAVE CHANGES" /></td>
    </tr>
    </table>
    
    <?php
	
}
?>
   </form>
   
    </fieldset>
</div>
<!--End of body div-->















</div>
<!---End of wrapper div-->
</body>
</html>