<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').live('change', function()			{ 
			           $("#preview").html('');
			    $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();
		
			});
        }); 
</script>

<style>

body
{
font-family:arial;
}
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}

</style>

</head>

<body>
  <fieldset style="padding:5px;">
    
    
    
    <legend>Picture</legend>
    
  
<?php 
 
include ("../ballot_class.php");
include("connect.php");

$obj=new ballot;

 $_SESSION['table']=$_GET['table'];
  $_SESSION['id']=$_GET['id'];
  $_SESSION['col']=$_GET['col'];

$object=$obj->selectAllWhere($_SESSION['table'], 'id', $_SESSION['id']) ;

while($row=mysql_fetch_array($object)){
?>
  <form action='ajaxupic_group.php' method="post" id="imageform" enctype="multipart/form-data">
<table  border="0" width="90%" height="200">

<tr>
<td> Name:</td>
<td style="font-size:16px; width:200px; font-weight:bold; color:#30a3e5;"> <?php if($_GET['col']=="prespic"){ echo $row['presname'];}elseif($_GET['col']=="vprespic"){echo $row['vpresname'];}?></td>
<td>Position:</td>
<td style="font-size:16px; width:200px; font-weight:bold; color:#30a3e5;"> <?php echo $_GET['position'];?></td>
</tr>
<tr>
<td width="150" >Old Picture: <?php if($_GET['col']=="prespic" && $row['prespic']==""){
echo "<img src='../images/voters_img.gif' width='70%' height='70%' /><br/>No previous upload";
}
if($_GET['col']=="vprespic" && $row['vprespic']==""){
echo "<img src='../images/voters_img.gif' width='70%' height='70%' />No previous upload";
	}

if($_GET['col']=="prespic" && $row['prespic']!=""){

	echo "<img src='../uploads/{$row['prespic']}' width='70%' height='70%' />";
	}
	
if($_GET['col']=="vprespic" && $row['vprespic']!=""){
	echo "<img src='../uploads/{$row['vprespic']}' width='100%' height='100%' />";
}?></td>


<td>New Picture: <input type="file"  name="photoimg" id="photoimg"   /></td>
    
    <td><div id='preview'>
</div>
</td>
    </tr>
    </table>
    
    <?php
	
}
?>
   </form>
   
    </fieldset>

</body>
</html>