<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::e-vote system</title>
<script type="text/javascript" src="tinybox.js"></script>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
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

<!---Wrapper div-->
<div id="wrapper">




<!--Header div-->
<!--End of Header div-->



<!--body div-->
<div id="body">
 <?php

session_start();
?>
  
  <fieldset>
  <legend>DIRECTOR OF SOCIALS</legend>
  <?php


	
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;
	$all=$obj->selectall("socials");


?>
      
  
  
    <?php

if(mysql_num_rows($all) < 5){echo "<div><a  title='add new contestant' href='addnew.php?table=socials&&page=edit_social_frame.php&position=DIRECTOR OF SOCIALS'><img src='../images/add1.gif' width='82' height='70' /></a></div>";}

?>
    
    
    <table  border="0" width="100%">
      
      
      
      <?php while($row=mysql_fetch_array($all)){?>
      <tr class="bigtr">
            <td width="70"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
	   echo "<img src='../uploads/{$row['pic']}' width='100%' height='100%'/>";
          
}
?>
          </td>
          
    <td><?php echo $row['name'];?></td>
        <?php
$idd=$row['id'];
$namee=$row['name'];
?>
        
        
          
          
          
          
          
          
          
                  <td width="50"><?php echo "<a   title='edit name' href='edit_name.php?id={$row['id']}&
		table=socials&position=DIRCTOR OF SOCIALS&page=edit_treasurer_frame.php'><img src='../images/edit_ (1).png' width='30' height='30' /></a>";?></td>
  </td>
        
        
        
        <td width="50"><?php 
   if($row['pic']!=""){
	   echo "<a  title='change picture' href='change_picture.php?id={$row['id']}&table=socials&position=DIRECTOR OF SOCIALS'><img src='../images/edit_ (2).png' width='30' height='30' /></a>";
	   }?>
          
          <?php 
   if($row['pic']==""){
	   echo "<a title='add picture'  href='change_picture.php?id={$row['id']}&table=socials&position=DIRECTOR OF SOCIALS'><img src='../images/edit_ (2).png' width='30' height='30' /></a>";
	   }?>
  </td>
        
        
        <td width="50">
        <a title="delete this person" href="<?php echo "delete_person.php?id={$row['id']}&table=socials&page=edit_social_frame.php";?>" 
        onclick="return confirm('Go ahead and delete this person?')"><img src='../images/edit_ (3).png' width='30' height='30'/></a>
          </td>   

          
          
          
          
          
        
        
        </tr>
      
      
      <?php }?>
      </table>
    

  
  </fieldset>
  
    
  
  
</div>
<!--End of body div-->








</div>
<!---End of wrapper div-->
</body>
</html>