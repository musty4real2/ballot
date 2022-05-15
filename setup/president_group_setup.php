<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />


</head>

<body>


<?php
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");


if(isset($_POST['save'])){
	
	
	$p1=addslashes($_POST['p1']);
	$vp1=addslashes($_POST['vp1']);
	$p2=addslashes($_POST['p2']);
	$vp2=addslashes($_POST['vp2']);
	$p3=addslashes($_POST['p3']);
	$vp3=addslashes($_POST['vp3']);
	$p4=addslashes($_POST['p4']);
	$vp4=addslashes($_POST['vp4']);
	$p5=addslashes($_POST['p5']);
	$vp5=addslashes($_POST['vp5']);
	



/***************************************if ONE person for this category*********************************************************/
if(($p1 !="") and ($p2=="") and ($p3=="") and ($p4=="") and ($p5=="")){	
	$query="INSERT INTO `ballot`.`presgroup` (
`presname` ,`vpresname` ,`votecount` ,`prespic` ,`vprespic`
)
VALUES ('$p1', '$vp1', '', '', '')";
	$queryobject=new ballot;
$result=$queryobject->mysqlQuery($query);
header("location:saved.php");
}
/**********************************************************END*****************************************************************/


/***************************************if TWO people for this category*********************************************************/
if(($p1 !="") and ($p2!="") and ($p3=="") and ($p4=="") and ($p5=="")){	
	$query="INSERT INTO `ballot`.`presgroup` (
`presname` ,`vpresname` ,`votecount` ,`prespic` ,`vprespic`
)
VALUES ('$p1', '$vp1', '', '', ''), ('$p2', '$vp2', '', '', '')";
	$queryobject=new ballot;
$result=$queryobject->mysqlQuery($query);
header("location:saved.php");
}
/**********************************************************END*****************************************************************/
	
/***************************************if THREE people for this category*********************************************************/
if(($p1 !="") and ($p2!="") and ($p3!="") and ($p4=="") and ($p5=="")){	
	$query="INSERT INTO `ballot`.`presgroup` (
`presname` ,`vpresname` ,`votecount` ,`prespic` ,`vprespic`)
VALUES ('$p1', '$vp1', '', '', ''), ('$p2', '$vp2', '', '', '') , ('$p3', '$vp3', '', '', '')";
	$queryobject=new ballot;
$result=$queryobject->mysqlQuery($query);
header("location:saved.php");
}
/**********************************************************END*****************************************************************/

/***************************************if FOUR people for this category*********************************************************/
if(($p1 !="") and ($p2!="") and ($p3!="") and ($p4!="") and ($p5=="")){	
	$query="INSERT INTO `ballot`.`presgroup` (
`presname` ,`vpresname` ,`votecount` ,`prespic` ,`vprespic`
)
VALUES ('$p1', '$vp1', '', '', ''), ('$p2', '$vp2', '', '', '') , ('$p3', '$vp3', '', '', ''), ('$p4', '$vp4', '', '', '')";
	$queryobject=new ballot;
$result=$queryobject->mysqlQuery($query);
header("location:saved.php");
}
/**********************************************************END*****************************************************************/

/***************************************if FIVE people for this category*********************************************************/
if(($p1 !="") and ($p2!="") and ($p3!="") and ($p4!="") and ($p5!="")){	
	$query="INSERT INTO `ballot`.`presgroup` (
`presname` ,`vpresname` ,`votecount` ,`prespic` ,`vprespic`
)
VALUES (
'$p1', '$vp1', '', '', ''), ('$p2', '$vp2', '', '', '') , ('$p3', '$vp3', '', '', ''), ('$p4', '$vp4', '', '', ''), 
('$p5', '$vp5', '', '', '')";
	$queryobject=new ballot;
$result=$queryobject->mysqlQuery($query);
header("location:saved.php");
}
/**********************************************************END*****************************************************************/
	
	
	}






?>









<fieldset>

<?php
$objclass=new ballot;
$all= $objclass->selectAll("presgroup");
if(mysql_num_rows($all)>0){
	echo "<h1>Setup for this category already done. Go to edit setup to make changes or add new</h1>";
	}
$checkg=$objclass->selectAll("pres_single");
if(mysql_num_rows($checkg)>0){
echo "<h1>President Single already made</h1>";	
}

if(mysql_num_rows($all)==0  && mysql_num_rows($checkg)==0 ){


?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
           <legend>President (Group)</legend>
           <table width="800" border="0">
           
           <tr>
           <td>Group one</td>
           <td></td>
           <td></td>
           </tr>
           <tr>
             <td>Fullname President (1)</td>
             <td>
               <input type="text" id="name_attendee_6" name="p1" size="60" /></td>
             <td></td>
           </tr>
           <tr>
             <td>Fullname Vice-President (1)</td>
             <td>               <input type="text" id="name_attendee_6" name="vp1" size="60" />
</td>
             <td></td>
           </tr>
           
           
                <tr>
           <td>Group two</td>
           <td></td>
           <td></td>
           </tr>
           <tr>
             <td>Fullname President (1)</td>
             <td>
               <input type="text" id="name_attendee_6" name="p2" size="60"  /></td>
             <td></td>
           </tr>
           <tr>
             <td>Fullname Vice-President (1)</td>
             <td>               <input type="text" id="name_attendee_6" name="vp2"size="60"  />
</td>
             <td></td>
           </tr>
           
           
           
           
      
           <tr>
           <td>Group three</td>
           <td></td>
           <td></td>
           </tr>
           <tr>
             <td>Fullname President (1)</td>
             <td>
               <input type="text" id="name_attendee_6" name="p3" size="60"  /></td>
             <td></td>
           </tr>
           <tr>
             <td>Fullname Vice-President (1)</td>
             <td>               <input type="text" id="name_attendee_6" name="vp3" size="60"  />
</td>
             <td></td>
           </tr>
           
           
           
           <tr>
           <td>Group four</td>
           <td></td>
           <td></td>
           </tr>
           <tr>
             <td>Fullname President (1)</td>
             <td>
               <input type="text" id="name_attendee_6" name="p4" size="60" /></td>
             <td></td>
           </tr>
           <tr>
             <td>Fullname Vice-President (1)</td>
             <td>               <input type="text" id="name_attendee_6" name="vp4" size="60" />
</td>
             <td></td>
           </tr>
           
           
           <tr>
           <td>Group five</td>
           <td></td>
           <td></td>
           </tr>
           <tr>
             <td>Fullname President</td>
             <td>
               <input type="text" id="name_attendee_6" name="p5"size="60"  /></td>
             <td></td>
           </tr>
           <tr>
             <td>Fullname Vice-President (1)</td>
             <td>               <input type="text" id="name_attendee_6" name="vp5" size="60" />
</td>
             <td></td>
           </tr>
           
           
           <tr>
           <td></td>
           <td><input type="submit" value="save settings" name="save" class="but"/></td>
           
           </tr>
           
           
           </table>
           </form>
           <?php }?>
           </fieldset>
           
</body>
</html>