  <?php
session_start();
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





<!--body div-->
<div id="body">
  <h1>Edit Voters redord</h1>
  <?php


	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	
	if(isset($_POST['save'])){
		
	$sname=addslashes($_POST['sname']);
	$fname=addslashes($_POST['fname']);
	$matno=addslashes($_POST['matno']);
	$level=addslashes($_POST['level']);
	$dept=addslashes($_POST['dept']);
		
		$editid=$_POST['id'];
		
		
		$update="UPDATE `voters` SET `surname`='$sname', `firstname`='$fname',
		`dept`='$dept', `matric`='$matno', `level`='$level' WHERE `id`='$editid'";
		$update=mysql_query($update)or mysql_error();
		
		echo "ENTERED!!!";
		}
	
	
	
?>











<?php	
	
		$obj=new ballot;

	$all=$obj->selectAllWhere("voters",  "id", "{$_GET['editid']}");
	
	while($row=mysql_fetch_array($all)){
?>
  
  
  
  
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <fieldset>
  <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
    <table  border="0" width="90%" align="center">
      <tr>
        <td>Firstname:</td>
        <td><label for="textfield"></label>
          <input type="text" name="fname" value="<?php echo $row['firstname'];?>" /></td>
        
        <td>Surname:</td>
        <td><input type="text" name="sname" value="<?php echo $row['surname'];?>" /></td>
        </tr>
      <tr>
        <td>Department:</td>
        <td><select name="dept">
          <option value="">select</option>
          <option value="">---------</option>
          <?php if($row['dept']){?>
          <option value="<?php echo $row['dept'] ;?>" selected="selected"><?php echo $row['dept'];?></option>
  <?php }
			include("connet.php");
	  $ask="SELECT * FROM `client`";
	  if(!$ask=mysql_query($ask)){
		  echo "<option value=''>No department available".mysql_error()."</option>";
		  }

		  while($me=mysql_fetch_array($ask)){
			  if($row['dept1']!=""){
			  echo "<option value='{$row['dept1']}'>{$me['dept1']}</option>";
			  }
			  if($row['dept2']!=""){
			  echo "<option value='{$row['dept2']}'>{$me['dept2']}</option>";
			  }
			  
			  if($row['dept3']!=""){			  
			  echo "<option value='{$row['dept3']}'>{$me['dept3']}</option>";
			  }
			  if($row['dep41']!=""){			  
			 echo "<option value='{$row['dept4']}'>{$me['dept4']}</option>";
			  }
			  if($row['dept5']!=""){			  
			  echo "<option value='{$row['dept5']}'>{$me['dept5']}</option>";
			  }
			  if($row['dept6']!=""){			  
			  echo "<option value='{$row['dept6']}'>{$me['dept6']}</option>";
			  }
			  if($row['dept7']!=""){			  
			  echo "<option value='{$row['dept7']}'>{$me['dept7']}</option>";
			  }
			  if($row['dept8']!=""){			  
			  echo "<option value='{$row['dept8']}'>{$me['dept8']}</option>";
			  }
			  if($row['dept9']!=""){			  
			  echo "<option value='{$row['dept9']}'>{$me['dept9']}</option>";
			  }
			  if($row['dept10']!=""){			  
			  echo "<option value='{$row['dept10']}'>{$me['dept10']}</option>";
			  }

			  
			  
			  
			  
			  
			  
			  }
		  
	  
	  ?>
          </select></td>
        
        <td>School:</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Level:</td>
        <td><select name="level" id="select2">
          <option>select</option>
          <option>............</option>
          <?php if($row['level']){?>
          
          <option value="<?php echo $row['level'];?>" selected="selected"><?php echo $row['level'];?></option>
          <?php }?>
          <option value="100">100</option>
          <option value="200">200</option>
          <option value="300">300</option>
          <option value="400">400</option>
          <option value="500">500</option>
          <option value="500 (spill)">500 (spill)</option>
          </select></td>
        </tr>
      <tr>
        <td>Matric Number:</td>
        <td><input type="text" name="matno" value="<?php echo $row['matric'];?>" /></td>
        </tr>
      <tr>
        <td>Confirm matric number:</td>
        <td><input type="text" name="confmat" id="textfield4" /></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="save" class="actionbut" id="button" value="Save Changes" /></td>
        </tr>
      </table>
  </fieldset>
    
  </form>
  <?php } ?>
</div>
<!--End of body div-->









</div>
<!---End of wrapper div-->
</body>
</html>