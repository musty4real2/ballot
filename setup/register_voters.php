<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ob_start();

session_start();


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::e-vote system</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tinybox.js"></script>
</head>

<?php
if($_GET['register']==1){?>
<body onload="TINY.box.show({iframe:'http://localhost/ballot/setup/saved.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})">
<?php }

else {
	?>
  
  <body>
    <?php
	}
?>
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
  
  
  
  
  
  
  
  
  
  <?php

if(isset($_POST['register'])){
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$sname=addslashes($_POST['sname']);
	$fname=addslashes($_POST['fname']);
	$matno=addslashes($_POST['matno']);
	$add=addslashes($_POST['add']);
	$branch=addslashes($_POST['branch']);
	$occ=addslashes($_POST['occ']);
	$pnum=addslashes($_POST['pnum']);
	$sex=addslashes($_POST['sex']);
	
		function createPassword($length) {
	$chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$i = 0;
	$password = "";
	while ($i <= $length) {
		$password .= $chars{mt_rand(0,strlen($chars))};
		$i++;
	}
	return $password;
		}
	
	$code=createPassword(15);
	$pass=createPassword(8);
	
	
	$query="INSERT INTO `voters` (`surname`, `firstname`, `username`, `password`, `branch`, `address`,`picture`,`code`,`sex`,`occupation`,`dob`,`phone_number`)
	VALUES (UPPER('$sname'), UPPER('$fname'), '$matno', '$pass', '$branch', '$add','','$code','$sex','$occ','dob','$pnum')";
	
	$queryobject=new ballot;

$result=$queryobject->mysqlQuery($query);


$insertedid=mysql_insert_id($connection);


$_SESSION['voterid']=$insertedid;
	 
	 header("location:voter_upload_pic.php");

	 
	
	
	}






?>
  
  
  
  
  
  
  
  
  
  <h1><img  src="../images/add_voters.gif" width="140" height="146" />Register Voters</h1>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <fieldset>
    <table width="800" border="0" align="center" height="300">
      <tr>
        <td>Firstname:</td>
        <td><label for="textfield"></label>
          <input type="text" name="fname" id="textfield" size="40"/></td>
        
        <td>Surname:</td>
        <td><input type="text" name="sname" id="textfield2" size="40"/></td>
        </tr>
      <tr>
        <td>Association Branch:</td>
        <td><select name="branch">
          <option value="">select</option>
          <option value="">---------</option>
          <?php
			include("connet.php");
	  $ask="SELECT * FROM `client`";
	  if(!$ask=mysql_query($ask)){
		  echo "<option value=''>No brach available".mysql_error()."</option>";
		  }

		  while($row=mysql_fetch_array($ask)){
			  
			if($row['dept1']!=""){
			  echo "<option value='{$row['dept1']}'>{$row['dept1']}</option>";
			  }
			  if($row['dept2']!=""){
			  echo "<option value='{$row['dept2']}'>{$row['dept2']}</option>";
			  }
			  
			  if($row['dept3']!=""){			  
			  echo "<option value='{$row['dept3']}'>{$row['dept3']}</option>";
			  }
			  if($row['dep41']!=""){			  
			 echo "<option value='{$row['dept4']}'>{$row['dept4']}</option>";
			  }
			  if($row['dept5']!=""){			  
			  echo "<option value='{$row['dept5']}'>{$row['dept5']}</option>";
			  }
			  if($row['dept6']!=""){			  
			  echo "<option value='{$row['dept6']}'>{$row['dept6']}</option>";
			  }
			  if($row['dept7']!=""){			  
			  echo "<option value='{$row['dept7']}'>{$row['dept7']}</option>";
			  }
			  if($row['dept8']!=""){			  
			  echo "<option value='{$row['dept8']}'>{$row['dept8']}</option>";
			  }
			  if($row['dept9']!=""){			  
			  echo "<option value='{$row['dept9']}'>{$row['dept9']}</option>";
			  }
			  if($row['dept10']!=""){			  
			  echo "<option value='{$row['dept10']}'>{$row['dept10']}</option>";
			  }

			  
			  
			  
			  
			  
			  
			  
			  }
		  
	  
	  ?>
          </select></td>
                <td>Sex:</td>
                <td>
          <label>
            <input type="radio" name="sex" value="male" id="sex_0" <?php if($_POST['sex']=='male'){echo "checked='checked'"; }?> />
            male</label>
          <label>
            <input type="radio" name="sex" value="female" id="sex_1"  <?php if($_POST['sex']=='female'){echo "checked='checked'"; }?>/>
          female</label></td>
        
          
        </tr>
      <tr>

        </tr>
      <tr>
        <td>Address:</td>
        <td><input type="text" name="add" id="textfield3" size="40"/></td>
        <td>phone number:</td>
          <td><input type="text" name="pnum" id="pnum" size="40" class="input-text" value="<?php if($_POST['pnum']){echo $_POST['pnum']; }?>"/></td>
        </tr>
      <tr>
        <td>Username:</td>
        <td><input type="text" name="matno" id="textfield3" size="40" /></td>
        
        <td>          Date of Birth:</td>
        <td>
DD
<select name="day" id="day" class="input-text">
  <option value="">select</option>
  <option value="">............</option>
  <?php
		 $range=range(1, 31);
		 foreach($range as $r){
			 echo "<option value='$r'>$r</option>";
			 }
			 ?>
          <?php if($_POST['day']){echo "<option  value='{$_POST['day']}' selected='selected'>{$_POST['day']}</option>"; }?>
</select>
MM
<select name="month" id="month" class="input-text">
  <option value="">select</option>
  <option value="">............</option>
  <?php
		 $range=range(1, 12);
		 foreach($range as $r){
			 echo "<option value='$r'>$r</option>";
			 }
			 ?>
                       <?php if($_POST['month']){echo "<option  value='{$_POST['month']}' selected='selected'>{$_POST['month']}</option>"; }?>

</select>
YYYY
<select name="year" id="year" class="input-text">
  <option value="">select</option>
  <option value="">............</option>
  <?php
		 $range=range(1900, 1994);
		 foreach($range as $r){
			 echo "<option value='$r'>$r</option>";
			 }
			 ?>
                       <?php if($_POST['year']){echo "<option  value='{$_POST['year']}' selected='selected'>{$_POST['year']}</option>"; }?>

</select></td>
        </tr>
      <tr>
        <td>Confirm Username:</td>
        <td><input type="text" name="confmat" id="textfield4"  size="40"/></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="register" id="button" value="Proceed" class="but" /></td>
        </tr>
      </table>
  </fieldset>
    
  </form>
  
</div>
<!--End of body div-->






<!--Footer div-->
<div id="footer">
<?php include('footer.php'); ?></div>
<!--End of footer div-->









</div>
<!---End of wrapper div-->
</body>
</html>
<?php
ob_flush();
?>