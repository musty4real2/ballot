<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::e-vote system</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	

	
    
    
    
    
    
    
    
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

<body>

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
	
	
	
	$insert="INSERT INTO `ballot`.`client` (
`assname` ,
`dept1` ,
`dept2` ,
`dept3` ,
`dept4` ,
`dept5` ,
`dept6` ,
`dept7` ,
`dept8` ,
`dept9` ,
`dept10` ,
`logo`, `date`, `location`
)
VALUES (
UPPER('$ass'), UPPER('$dept1'), UPPER('$dept2'), UPPER('$dept3'), UPPER('$dept4'), UPPER('$dept5'), UPPER('$dept6'), UPPER('$dept7'), UPPER('$dept8'), UPPER('$dept9'), UPPER('$dept10'), '', NOW(), '$loc')";
	

$queryobject=new ballot;

$result=$queryobject->mysqlQuery($insert);



	
	
	
	header("location:uploadlogo.php");
	}
?>










		
		<h1><img src="../images/set2.gif" width="150" height="150" />Setup</h1>

<?php
//CHECK FIRST WHETHER SETUP HAS BEEN DONA ALREADY
$check="SELECT COUNT(*) AS `check` FROM `client`";
$query=mysql_query($check);

while($row=mysql_fetch_array($query)){
	
	if($row['check']==1){
		
		die("<h1>Client Setup Already Done</h1>");
		}
	elseif($row['check']==0){
?>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

			<fieldset id="">
			
<table border="0" height="200">

<tr>
<td>   Name of Association:</td>
<td>
<input type="text" name="ass"  size="80"/>
   </td>
 </tr>  
          <tr>  
            
				<td align="left" valign="top"><label for="num_attendees">
					How many Department:
				</label>
                </td>
                <td>
				<select id="num_attendees">
					<option id="opt_0" value="0">Please Choose</option>
					<option id="opt_1" value="1">1</option>
					<option id="opt_2" value="2">2</option>
					<option id="opt_3" value="3">3</option>
					<option id="opt_4" value="4">4</option>
					<option id="opt_5" value="5">5</option>
					<option id="opt_6" value="5">6</option>
					<option id="opt_7" value="5">7</option>
					<option id="opt_8" value="5">8</option>
					<option id="opt_9" value="5">9</option>
					<option id="opt_10" value="5">10</option>
				</select>
			
				<br />
			
				<div id="attendee_1_wrap" class="name_wrap push">
					<h3>Depertmental code only</h3>
				
					<label for="name_attendee_1">
							Department (1)
					</label>
					<input type="text" id="name_attendee_1" class="" name="dept1"></input>

				</div>
			
				<div id="attendee_2_wrap" class="name_wrap">
					<label for="name_attendee_2">
							Department (2)
					</label>
					<input type="text" id="name_attendee_2" name="dept2"></input>
				</div>
			
				<div id="attendee_3_wrap" class="name_wrap">
					<label for="name_attendee_3">
							Department (3)
					</label>
					<input type="text" id="name_attendee_3" name="dept3"></input>
				</div>
			
				<div id="attendee_4_wrap" class="name_wrap">
					<label for="name_attendee_4">
							Department (4):
					</label>
					<input type="text" id="name_attendee_4" name="dept4"></input>
				</div>
			
				<div id="attendee_5_wrap" class="name_wrap">
					<label for="name_attendee_5">
							Department (5):
					</label>
					<input type="text" id="name_attendee_5" name="dept5"></input>
				</div>
                				<div id="attendee_6_wrap" class="name_wrap">
					<label for="name_attendee_6">
							Department (6):
					</label>
					<input type="text" id="name_attendee_6" name="dept6"></input>
				</div>
				<div id="attendee_7_wrap" class="name_wrap">
					<label for="name_attendee_7">
							Department (7):
					</label>
					<input type="text" id="name_attendee_7" name="dept7"></input>
				</div>
				<div id="attendee_8_wrap" class="name_wrap">
					<label for="name_attendee_8">
							Department (8):
					</label>
					<input type="text" id="name_attendee_8" name="dept8"></input>
				</div>
				<div id="attendee_9_wrap" class="name_wrap">
					<label for="name_attendee_9">
							Department (9):
					</label>
					<input type="text" id="name_attendee_9" name="dept9"></input>
				</div>
				<div id="attendee_10_wrap" class="name_wrap">
					<label for="name_attendee_10">
							Department (10):
					</label>
					<input type="text" id="name_attendee_10" name="dept10"></input>
				</div>
</td>

</tr>
<tr>
<td>Location:</td>
<td><input type="text" name="loc" /></td>
</tr>

<tr>

<td></td>

<td><input type="submit" value="save settings" name="balset" class="but"/></td>
</tr>
</table>
			
			</fieldset>
</form>
<?php

	}//END OF IF
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