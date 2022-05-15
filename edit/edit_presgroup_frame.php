<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tinybox.js"></script>
</head>

<?php if($_GET['deleted']==1){?>
<body onload="TINY.box.show({html:'Record has been deleted!',animate:false,close:false,boxid:'error',top:5})">
<?php }

if($_GET['edit']==1){?>
<body onload="TINY.box.show({html:'Updated successfully!',animate:false,close:false,mask:false,boxid:'success',autohide:2,top:-14,left:-17})">
<?php }


else{?>
<body>
<?php }?>





</div>
<!--End of Header div-->



<!--body div-->
  <?php

session_start();
?>
  
  <?php


	
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;
	$all=$obj->selectall("presgroup");


?>
  
    
    
    
    
  <!--President accordion div-->	
    
  <fieldset>
  <legend>President (Group)</legend>
    
    
<?php

if(mysql_num_rows($all) < 5){echo "<div><a href='addnewgroup.php?table=presgroup&position=PRESIDENT(GROUP)'><img src='../images/add1.gif' width='82' height='70' /></a></div>";}

?>
  <table border="0" width="100%">
    

    
    
    
  <?php while($row=mysql_fetch_array($all)){
	  if($row['presname']!=""){
	  ?>
  <tr class="bigtr">
  
    <td width="70"><?php  
  if($row['prespic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
  }
	 else{ echo "<img src='../uploads/{$row['prespic']}' width='100%' height='100%'/>";
	}
?>
     
     </td>

  
  <td width="30%"><?php echo $row['presname'];?> </td>
  
  <td><?php echo "<a title='edit name' href='edit_groupname.php?id={$row['id']}&table=presgroup&col=presname&
  position=PRESIDENT (GROUP)&page=edit_presgroup_frame.php'><img src='../images/edit_ (1).png' width='30' height='30' /></a>";?></td>
  
  <td>
  <?php 
  if($row['prespic']==""){
	  echo "<a  title='add picture'href='changegroup_picture.php?id={$row['id']}&table=presgroup&col=prespic&position=PRESIDENT (GROUP)'><img src='../images/edit_ (2).png' width='30' height='30' /></a>";}
  else{
   echo "<a  title='change picture' href='changegroup_picture.php?id={$row['id']}&table=presgroup&col=prespic&position=PRESIDENT (GROUP)'><img src='../images/edit_ (2).png' width='30' height='30' /></a>";
  }
  ?>
	
      </td>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    <td width="70"><?php  
  if($row['prespic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
  }
	 else{ echo "<img src='../uploads/{$row['vprespic']}' width='100%' height='100%'/>";
	}
?>
     
     </td>

  
  <td width="30%"><?php echo $row['vpresname'];?> </td>
  
  <td><?php echo "<a href='edit_groupname.php?id={$row['id']}&table=presgroup&col=vpresname&
  position=VICE-PRESIDENT (GROUP)&page=edit_presgroup_frame.php'><img src='../images/edit_ (1).png' width='30' height='30' /></a>";?></td>
  
  <td>
  <?php 
  if($row['vprespic']==""){
	  echo "<a  title='add picture'href='changegroup_picture.php?id={$row['id']}&table=presgroup&col=vprespic&position=VICE-PRESIDENT (GROUP)'><img src='../images/edit_ (2).png' width='30' height='30' /></a>";}
  else{
   echo "<a  title='change picture' href='changegroup_picture.php?id={$row['id']}&table=presgroup&col=vprespic&position=VICE-PRESIDENT (GROUP)'><img src='../images/edit_ (2).png' width='30' height='30' /></a>";
  }
  ?>
	
      </td>
  
  
     </tr>
    
    
    <?php }}?>
  </table>
    
    
  </fieldset>

</body>
</html>