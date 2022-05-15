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
<script type="text/javascript" src="tinybox.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
<!---Wrapper div-->



<div id="header">
<!--Header div-->

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
<h1><img src="../images/list.gif" width="153" height="164" />Registered Voters</h1>

  
  
  <?php
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;
	//Total Number of Voters registered
?>
	


<?php 
$registered="SELECT count(`id`)  AS `registered` FROM `voters`";
$reg=mysql_query($registered);
while($row=mysql_fetch_array($reg)){
$registered=$row['registered'];
echo "Total number of registered voters:<b> $registered</b><br/>";
}


//check number of voters verified

$verified="SELECT count(`verstatus`) AS `verified` FROM `voters` WHERE `verstatus`=1";
$ver=mysql_query($verified);
while($row=mysql_fetch_array($ver)){
$verified=$row['verified'];
echo "Total number of voters verified as at". date("h:ia") .": $verified<br/>";
}


//total number of voters yet to be verified

$yet=$registered-$verified;

echo "voters have yet to be verified as at". date("h:ia").":$yet<br/>";	




//Get Total Number of votes casted

$votecasted="SELECT count(voterid) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($row=mysql_fetch_array($vot)){
$casted=$row['votecasted'];

echo "Total Number of Votes casted as at".date("h:ia").":<b> $casted</b><br/>";
}


//total number of voters yet to vote

$yet=$registered-$casted;

echo "Voters yet to vote as at". date("h:ia").":<b> $yet</b><br/>";	

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
  $q = "SELECT * FROM `voters`";
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
  
  ?>
  
  
  
  
  
  <table width="90%" border="0" class="voterstab" cellspacing="0">
    <tr class="thead">
      <th>SURNAME</th>
      <th>FIRSTNAME</th>
      <th>USERNAME</th>
      <th>BRANCH</th>
      <th>VERIFICATION STATUS</th>
      <th>VOTING STATUS</th>
      <th>EDIT</th>
    </tr>	
    
    
    <?php
	
	$all="SELECT * FROM `voters` ORDER BY `surname` ASC LIMIT $start, $display";
	$a=mysql_query($all);
	
	while($row=mysql_fetch_array($a)){
 echo "<tr class='tr'>";  ?>


    <td><?php echo $row['surname'];?></td>
      <td><?php  echo  $row['firstname'];?></td>
      <td><?php  echo $row['username'];?></td>
      <td><?php  echo $row['branch'];?></td>  
      
      <td style="padding-top:10px;"><?php if($row['verstatus']==1){echo "<img src='../images/added.gif' width='25' height='25' alt='verified!' />";} else {?><img src="../images/remove.gif" width="25" height="25" alt="Not verified!" /><?php }?></td>
      
      <td style="padding-top:10px;"><?php if($row['votestatus']==1){echo "<img src='../images/added.gif' width='25' height='25' alt='voted!' />";} else {?><img src="../images/remove.gif" width="25" height="25" alt="not voted!" /><?php }?></td>
      
      <td style="padding-top:10px;"><?php echo "<a title='edit voters record' href='../edit/edit_voters_record.php?editid={$row['id']}'><img  alt='edit voters record' src='../images/pen.gif' width='25' height='25' /></a>";?></td>
      
      </tr>      
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
 echo '<center><a href="voters.php?s=' .
($start - $display) . '&p=' . $pages .
'">Previous</a></center> ';
 }

for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="voters.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '">' . $i . '</a> ';
 } else {
 echo $i . ' ';
}
 }

if ($current_page != $pages) {
 echo '<center><a href="voters.php?s=' .
($start + $display) . '&p=' . $pages .
'">Next</a></center>';
 }

 echo '</center>';// Close the paragraph.
 
 }
 ?>
  
  
    
<!---End of wrapper div-->
<center><SCRIPT LANGUAGE="JavaScript">
<!-- Begin
if (window.print) {
document.write('<form>'
+ '<input type="button" name="print" value="Print This Page" '
+ 'onClick="javascript:window.print()"></form>');
}
// End -->
</SCRIPT></center>

</fieldset></center>


</div>
<script type="text/javascript">
function openJS(){alert('loaded')}
function closeJS(){alert('closed')}
</script>
<!--End of body div-->





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