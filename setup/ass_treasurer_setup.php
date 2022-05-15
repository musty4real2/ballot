<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

	<script src="../js/jquery-1.2.6.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/form-fun.jquery.js" type="text/javascript" charset="utf-8"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
	
	
	
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
?>
<fieldset>



<?php
if(isset($_POST['add'])){
	
	//fetch input values
	$one=addslashes($_POST['one']);
	$two=addslashes($_POST['two']);
	$three=addslashes($_POST['three']);
	$four=addslashes($_POST['four']);
	$five=addslashes($_POST['five']);
	
	
	//sql query to insert into dbase
	/**************if only ONE field was entered******************************************************************/
	if(
	   ($one!="") and ($two=="") and ($three=="") and ($four=="") and ($five=="")){
	$sql="INSERT INTO `ballot`.`asstreasurer` (
`id` ,`name` ,`pic` ,`votecount`
)VALUES (NULL , UPPER('$one'), '', '')";
$queryobject=new ballot;
$result=$queryobject->mysqlQuery($sql);
header("location:saved.php");
	}
	/**************END******************************************************************/
	
	
	/**************if only two fields where entered******************************************************************/
	if(($one!="") and ($two!="")and ($three=="") and($four=="") and($five=="")){
	$sql="INSERT INTO `ballot`.`asstreasurer` (
`id` ,`name` ,`pic` ,`votecount`
)VALUES (NULL , UPPER('$one'), '', ''), (NULL , UPPER('$two'), '', '')";
$queryobject=new ballot;
$result=$queryobject->mysqlQuery($sql);
header("location:saved.php");
	}
	/**************END******************************************************************/
	
	
	/**************if only three fields where entered******************************************************************/
	if(($one!="") and ($two!="") and ($three!="") and($five=="") and($five=="")){
	$sql="INSERT INTO `ballot`.`asstreasurer` (
`id` ,`name` ,`pic` ,`votecount`
)VALUES (NULL , UPPER('$one'), '', ''), (NULL , UPPER('$two'), '', ''), (NULL , UPPER('$three'), '', '')";
$queryobject=new ballot;
$result=$queryobject->mysqlQuery($sql);
header("location:saved.php");
	}
	/**************END******************************************************************/
	
	
	
	
	/**************if only four fields where entered******************************************************************/
	if(($one!="") and ($two!="") and ($three!="") and ($four!="") and($five=="")){
	$sql="INSERT INTO `ballot`.`asstreasurer` (
`id` ,`name` ,`pic` ,`votecount`

)VALUES (NULL , UPPER('$one'), '', ''), (NULL , UPPER('$two'), '', ''), (NULL , UPPER('$three'), '', ''), (
NULL , UPPER('$four'), '', '')";
$queryobject=new ballot;
$result=$queryobject->mysqlQuery($sql);
header("location:saved.php");
	}
	/**************END******************************************************************/
}
?>













<legend> Assistant Treasurer</legend>
<?php
$objclass=new ballot;
$all= $objclass->selectAll("asstreasurer");
if(mysql_num_rows($all)>1){
	echo "<h1>Setup for this category already done. Go to edit setup to make changes or add new</h1>";
	}
elseif(mysql_num_rows($all)==0){

?>

<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="post">
<table border="0">
<tr>
<td align="left" valign="top">How many contestant for this position?</td>
<td>
					<select id="num_attendees">
					<option id="opt_0" value="0">Please Choose</option>
					<option id="opt_1" value="1">1</option>
					<option id="opt_2" value="2">2</option>
					<option id="opt_3" value="3">3</option>
					<option id="opt_4" value="4">4</option>
					<option id="opt_5" value="5">5</option>
				</select>
			
				<br />
			
				<div id="attendee_1_wrap" class="name_wrap push">
				
					<label for="name_attendee_1">
							Fullname (1)
					</label>
					<input type="text" id="name_attendee_1" class="" name="one" size="60"></input>
				</div>
			
				<div id="attendee_2_wrap" class="name_wrap">
					<label for="name_attendee_2">
							Fullname (2)
					</label>
					<input type="text" id="name_attendee_2" name="two" size="60"></input>
				</div>
			
				<div id="attendee_3_wrap" class="name_wrap">
					<label for="name_attendee_3">
							Fullname  (3)
					</label> 
					<input type="text" id="name_attendee_3" name="three" size="60"></input>
				</div>
			
				<div id="attendee_4_wrap" class="name_wrap">
					<label for="name_attendee_4">
							Fullname  (4):
					</label>
					<input type="text" id="name_attendee_4" name="four" size="60"></input>
				</div>
			
				<div id="attendee_5_wrap" class="name_wrap">
					<label for="name_attendee_5">
							Fullname (5):
					</label>
					<input type="text" id="name_attendee_5" name="five" size="60"></input>
				</div>
                			
</td>
</tr>

<tr>
<td>
</td>
<td><input type="submit" name="add" value="save settings" class="but" /></td>
</tr>
</table>
</form>
<?php } ?>
</fieldset>

</body>
</html>