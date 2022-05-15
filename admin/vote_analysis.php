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

  <fieldset>


<h1><img src="../images/bulb.gif" width="78" height="130" />VOTE ANALYSIS</h1><?php

		//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	


$obj=new ballot();

	
	

	$all="SELECT * FROM `voted` WHERE `voterid`='{$_GET['id']}'";
	$a=mysql_query($all);


?>


<?php while($row=mysql_fetch_array($a)){
	echo "<h1><img src='../images/bulb.gif' width='18' height='30' /></h1>";
  	echo "<table class='analysistab' cellspacing='1'>";
  
 echo "<tr>";  ?>
 
    <td><b>NAME:</b></td>
	<td style="text-align:center;"><?php echo $row['name'];?></td>
    <td><b>USERNAME.</b></td>
	<td style="text-align:center;"><?php echo $row['username'];?></td>
    <td><b>DATE</b></td>
    <td style="text-align:center;"><?php echo $row['date'];?></td>
    </tr>
    <tr style="background-color:#eeeeee;">
    <td  style="color:#666;"><b>PRESIDENT</b></td>
    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `pres_single` WHERE `id`='{$row['pres']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
		
			$fetchname="SELECT `presname`, `vpresname` FROM `presgroup` WHERE `id`='{$row['presgroup']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['presname'].$r['vpresname']."(group)";
		}

	?>
	</td>
    <td  style="color:#666;"><b>VICE_PRESIDENT</b></td>
        <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `vpres` WHERE `id`='{$row['vpres']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
   
    <td  style="color:#666;"><b>GENERAL SECRETARY</b></td>
    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `gensec` WHERE `id`='{$row['gensec']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    </tr>
    <tr  class="">
    <td  style="color:#666;"><b>ASSISTANT GEN. SEC.</b></td>
    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `assgensec` WHERE `id`='{$row['assgensec']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		
		echo $r['name'];
		}
	?></td>
   
    <td  style="color:#666;"><b>TREASURER</b></td>
    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `treasurer` WHERE `id`='{$row['treasurer']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    
   
    <td  style="color:#666;"><b>ASS. TREASURER</b></td>
    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `asstreasurer` WHERE `id`='{$row['asstreasurer']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    </tr>
    <tr  style="background-color:#eeeeee;">
    <td  style="color:#666;"><b>FINANCIAL SECRETARY</b></td>
    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `finsec` WHERE `id`='{$row['finsec']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
       
<td  style="color:#666;"><b>ASS. FINANCIAL SECRETARY</b></td>
    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `assfinsec` WHERE `id`='{$row['assfinsec']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    <td  style="color:#666;"><b>DIRECTOR OF RESEARCH</b></td>
    <td style="text-align:center;"><?php 
	
	$fetchname="SELECT `name` FROM `research` WHERE `id`='{$row['research']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
       </tr>
       <tr  >
        <td  style="color:#666;"><b>PUBLIC RELATIONS OFFICER I</b></td>

    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `pro1` WHERE `id`='{$row['pro1']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    <td  style="color:#666;"><b>PUBLIC RELATIONS OFFICER II</b></td>
    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `pro2` WHERE `id`='{$row['pro2']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    
        <td  style="color:#666;"><b>DIRECTOR OF SPORTS</b></td>

    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `sports` WHERE `id`='{$row['sports']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    </tr>
    <tr style="background-color:#eeeeee;">
        <td  style="color:#666;"> <b>DIRECTOR OF SOCIALS</b></td>

    <td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `socials` WHERE `id`='{$row['socials']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
<td  style="color:#666;"><b>WELLFARE OFFICER I</b></td>
<td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `wellfare1` WHERE `id`='{$row['wellfare1']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    
    
    <td  style="color:#666;"><b>WELLFARE OFFICER II</b></td>
<td style="text-align:center;"><?php 
	$fetchname="SELECT `name` FROM `wellfare2` WHERE `id`='{$row['wellfare2']}'";
	$f=mysql_query($fetchname);
	while($r=mysql_fetch_array($f)){
		echo $r['name'];
		}
	?></td>
    </tr>
    <td  style="color:#666;"><b>TOTAL</b></td>
    <td style="text-align:center;">
	<?php
	$count=0;
		if($row['presgroup']!=0){$count=$count+1;
		}
	if($row['pres']!=0){$count=$count+1;
	}
	if($row['vpres']!=0){$count=$count+1;
	}
	if($row['gensec']!=0){$count=$count+1;
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
         <td style="color:#666;"><b>ASSOCIATION BRANCH.</b></td>
    <td><?php echo $row['branch'];?></td>

    </tr>
        </table>
<h1></h1>
    	<?php }

?>


	
 


<center><SCRIPT LANGUAGE="JavaScript">
<!-- Begin
if (window.print) {
document.write('<form>'
+ '<input type="button" name="print" value="Print This Page" '
+ 'onClick="javascript:window.print()"></form>');
}
// End -->
</SCRIPT></center>
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