<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if($_SESSION['admin']==1){

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




<h1><img src="../images/like.gif" width="168" height="140" />VOTED</h1><?php

		//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	





//Total Number of Voters registered

$registered="SELECT count(`id`)  AS `registered` FROM `voters`";
$me=mysql_query($registered) or die(mysql_error());
while($row=mysql_fetch_array($me)){
$registered=$row['registered'];
echo "Total number of registered voters: $registered<br/>";
}


//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$votecasted=mysql_query($votecasted);
while($row=mysql_fetch_array($votecasted)){
$casted=$row['votecasted'];

echo "Total Number of Votes casted as at". date("h:i a").": $casted<br/>";
}


//total number of voters yet to vote

$yet=$registered-$casted;

echo "Voters yet to vote as at ".date(" h:i a").": $yet";	





?>
 <center><fieldset>


	
<?php
$display = 50;
 // Determine how many pages there are...
 if (isset($_GET['p']) && is_numeric($_GET
['p'])) { // Already been determined.

 $pages = $_GET['p'];
 } else { // Need to determine.

 // Count the number of records:
 $q = "SELECT * FROM `voted`";
 $r = mysql_query ($q);
$records=mysql_num_rows($r);
if(!$r){echo " could not select for pagination problem";}
if(empty($r)){echo "the database query is empty";}


 // Calculate the number of pages...
 if ($records > $display) { // More than
 $pages = ceil ($records/$display);
 } else {
$pages = 1;
 }
 }
if (isset($_GET['s']) && is_numeric
($_GET['s'])) {
 $start = $_GET['s'];
 } else {
 $start = 0;
 }
	
	
	

	$all="SELECT * FROM `voted` ORDER BY `name` ASC LIMIT $start, $display";
	$a=mysql_query($all);


?>

	<table border="0" class="votedtab" width="90%" cellspacing="0" >
    <tr class="thead">
    <td></td>
    <th>Name</th>
    <th>Username</th>
    <th>Time of Vote</th>
    <th>Association Branch</th>
    <th>Vote Casted</th>
    </tr>

<?php while($row=mysql_fetch_array($a)){
 // Switch the background
 echo "<tr class='tr'>";  ?>
 <td><img src="../images/hand.gif" width="20" height="20" /></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['date'];?></td>
    <td><?php echo $row['branch'];?></td>

    <td>
	<?php
	$count=0;
	if($row['pres']!=0){$count=$count+1;
	}
	if($row['vpres']!=0){$count=$count+1;
	}
	if($row['vpres']!=0){$count=$count+1;
	}
	if($row['presgroup']!=0){$count=$count+1;
	}
	
	if($row['assgensec']!=0){$count=$count+1;
	}
	if($row['treasurer']!=0){$count=$count+1;
	}
	if($row['asstreasurer']!=0){$count=$count+1;
	}
	if($row['finsec']!=0){$count=$count+1;
	}
	if($row['assfinsec']!=0){$count=$count+1;
	}
	if($row['research']!=0){$count=$count+1;
	}
	
	if($row['pro1']!=0){$count=$count+1;
	}
	if($row['pro2']!=0){$count=$count+1;
	}
	if($row['wellfare1']!=0){$count=$count+1;
	}
	if($row['wellfare2']!=0){$count=$count+1;
	}
	if($row['social']!=0){$count=$count+1;
	}
	if($row['sports']!=0){$count=$count+1;
	}
	
	echo $count;
	
	
	
	 ?></td>
    </tr>
    
    	<?php }

?>


    </table>
	

 <?php
 
  //paginate result set
if ($pages > 1) {
echo '<center>';
$current_page = ($start/$display) + 1;

if ($current_page != 1) {
 echo '<center><a href="voted.php?s=' .
($start - $display) . '&p=' . $pages .
'">Previous</a></center> ';
 }

for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="voted.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '">' . $i . '</a> ';
 } else {
 echo $i . ' ';
}
 }

if ($current_page != $pages) {
 echo '<center><a href="voted.php?s=' .
($start + $display) . '&p=' . $pages .
'">Next</a></center>';
 }

 echo '</center>';// Close the paragraph.
 
 }
?>
<center><SCRIPT LANGUAGE="JavaScript">
<!-- Begin
if (window.print) {
document.write('<form>'
+ '<input type="button" name="print" value="Print This Page" '
+ 'onClick="javascript:window.print()"></form>');
}

</SCRIPT></center>

</fieldset></center>





</div>
  

</div>
<!--End of body div-->






<!--Footer div-->
<div id="footer">
<p>Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->


</body>
</html>
<?php } else {
	header("location:../admin/admin_login.php?acess=denied");
} ?>