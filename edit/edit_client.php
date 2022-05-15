<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::e-vote system</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../setup/style.css" media="screen" />
	
<script type="text/javascript" src="tinybox.js"></script>
	
    
    
    
    
    
    
    
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
    
    
    
	<!--[if IE]>
		<style type="text/css">
			legend { 
				position: relative;
				top: -30px;
			}
			
			fieldset {
				margin: 30px 10px 0 0;
			}
		</style>
		
		<script type="text/javascript">
			$(function(){
				$("#step_2 legend").css({ opacity: 0.5 });
				$("#step_3 legend").css({ opacity: 0.5 });
			});
		</script>
	<![endif]-->


	<script src="../js/jquery-1.2.6.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/form-fun.jquery.js" type="text/javascript" charset="utf-8"></script>

</head>


<?php
if($_GET['edit']=='ok'){?>
<body onload="TINY.box.show({html:'Changes Saved!',animate:false,close:false,mask:false,boxid:'success',autohide:2,top:-14,left:-17})">
<?php }




else{?>
<body>
<?php }?>

<!---Wrapper div-->
<div id="wrapper">




<div id="body">

	<?php
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	

?>
<!--Process the script--->
<?php
if(isset($_POST['balset'])){
	
	
	
	
	
	//pick values from the fields
	$ass=addslashes($_POST['ass']);
	$dept1=addslashes($_POST['dept1']);
	$dept2=addslashes($_POST['dept2']);
	$dept3=addslashes($_POST['dept3']);
	$dept4=addslashes($_POST['dept4']);
	$dept5=addslashes($_POST['dept5']);
	$dept6=addslashes($_POST['dept6']);
	$dept7=addslashes($_POST['dept7']);
	$dept8=addslashes($_POST['dept8']);
	$dept9=addslashes($_POST['dept9']);
	$dept10=addslashes($_POST['dept10']);
	$loc=addslashes($_POST['loc']);
	
	
	$insert="UPDATE `client` SET
`assname`='$ass',`dept1`='$dept1' ,`dept2`='$dept2' ,`dept3`='$dept3' ,`dept4`='$dept4' ,`dept5`='$dept5' ,`dept6`='$dept6' ,`dept7`='$dept7' ,`dept8`='$dept8' ,
`dept9`='$dept9' ,`dept10`='$dept10', `location`='$loc'";

	

$queryobject=new ballot;

$result=$queryobject->mysqlQuery($insert);



	
	
	
	header("location:../setup/uploadlogo.php?change=1");
	}
?>










		
		<h1><img src="../images/set1.gif" width="100" height="100" />EDIT CLIENT</h1>

<?php
//CHECK FIRST WHETHER SETUP HAS BEEN DONA ALREADY
$check="SELECT * FROM `client`";
$query=mysql_query($check);

if(mysql_num_rows($query)==0){
	echo "<h1>Client settings has not been done!</h1>";
	}
while($row=mysql_fetch_array($query)){
	
?>
		<form action="<?php echo $_SERVER['../setup/PHP_SELF'];?>" method="post" enctype="multipart/form-data">

			<fieldset id="">
			
<table border="0">

<tr>
<td>   Name of Association:</td>
<td>
<input type="text" name="ass"  value="<?php echo $row['assname'];?>" size="80"/>
   </td>
 </tr>  
          <tr>  
            
                <td>
			
				
							Dept (1):</td>
                            <td>
					<input type="text" value="<?php echo $row['dept1'];?>" class="" name="dept1"></input>
                    </td>
                    </tr>
                    <tr>
                    <td>
							Dept (2):</td>
                            <td>
					<input type="text" value="<?php echo $row['dept2'];?>" name="dept2"></input>
					</td>
                    </tr>
                    <tr>
                    <td>
							Dept (3):</td>
					<td>
					<input type="text" value="<?php echo $row['dept3'];?>" name="dept3"></input>
					</td>
                    </tr>
                    <tr>
                    <td>
							Dept (4):
					</td>
                    <td>
					<input type="text" value="<?php echo $row['dept4'];?>" name="dept4"></input>
					</td>
                    </tr>
                    <tr>
                    <td>
					
							Dept (5):
					</td>
                    <td>
					<input type="text" value="<?php echo $row['dept5'];?>" name="dept5"></input>
					</td>
                    </tr>
                    <tr>
                    <td>
                    
							Dept (6):
					</td>
                    <td>
					<input type="text" value="<?php echo $row['dept6'];?>" name="dept6"></input>
					</td>
                    </tr>
                    <tr>
                    <td>
                   
							Dept (7):
					</td>
                    <td>
					<input type="text" value="<?php echo $row['dept7'];?>" name="dept7"></input>
					</td>
                    </tr>
                    
                    <tr>
                    <td>
                   
							Dept (8):
					</td>
                    <td>
					<input type="text" value="<?php echo $row['dept8'];?>" name="dept8"></input>
					</td>
                    </tr>
                    
                    <tr>
                    <td>
                    
							Dept (9):
					</td>
                    <td>
					<input type="text" value="<?php echo $row['dept9'];?>" name="dept9"></input>
					</td>
                    </tr>
                    
                    <tr>
                    <td>
                   
							Dept (10):</td>
                            <td>
										<input type="text" value="<?php echo $row['dept10'];?>" name="dept10"></input>
</td></tr>

</tr>
<tr>
<td>Location:</td>
<td><input type="text" name="loc" value="<?php echo $row['location'];?>"  size="80"/></td>
</tr>

<tr>

<td></td>

<td><input type="submit" value="save changes" class="but" name="balset" /></td>
</tr>
</table>
			
			</fieldset>
</form>
<?php

	}//END OF WHILE
?>













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
</html>