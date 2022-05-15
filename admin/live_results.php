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

	
	<!-- Begin Stylesheets -->
		<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/coda-slider-2.0.css" type="text/css" media="screen" />
	<!-- End Stylesheets -->
	
	<!-- Begin JavaScript -->
		<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="../js/jquery.coda-slider-2.0.js"></script>
		 <script type="text/javascript">
			$().ready(function() {
				$('#coda-slider-1').codaSlider();
			});
		 </script>

</head>

<body>

<!---Wrapper div-->
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
<h1><img src="../images/result.gif" width="135" height="123" />Live Results</h1>





<?php
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

echo "Voters yet to vote as at ".date(" h:i a").": $yet<br/>";	
?>

  
  <?php
/*******************************************President  ****************************************************/
?>



<div class="coda-slider-wrapper">
	<div class="coda-slider preload" id="coda-slider-1">
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">President</h2>
				
                
                


<?php

$result="SELECT * FROM `pres_single`";

$result=mysql_query($result);


//if the president single table is empty. process the president group
if(mysql_num_rows($result)==0){
	?>
    
    
    <?php
$group="SELECT * FROM `presgroup`";
$g=mysql_query($group);
while($x=mysql_fetch_array($g)){
	$groupvote=$x['votecount'];

//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$c=mysql_query($votecasted);
while($val=mysql_fetch_array($c))
{
$casted=$val['votecasted'];

}

//calculate votes in percent

if($groupvote>0){
$percent=round(($groupvote * 100)/$casted, 1);
}elseif($groupvote==0){$percent=0;}

$width2=($groupvote*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200"><?php 
if($x['prespic']=="" and $x['vprespic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' /><img src='../images/voters_img.gif' width='40%' height='40%' />";
	}
echo "<img src='../uploads/{$x['prespic']}' width='40%' height='40%' /> <img src='../uploads/{$x['vprespic']}' width='40%' height='40%' />";?></td>
<td  style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $x['presname']. "<br/>" .$x['vpresname'];?></td>
</tr>

</table>
</fieldset>
<fieldset>
<table border="0"  width="400" style="position:relative; top:-90px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$groupvote/$casted($percent%)";?></td>
</tr>
<tr>

<td width="75%" style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>" /></td>
</tr>
</table>
</fieldset>
<?php



}//end of WHILE



	}//END of IF
	
	
	
	//if the president group is empty. process the president single
elseif(mysql_num_rows($result)>0){	
$result="SELECT * FROM `pres_single`";

$result=mysql_query($result);
?>

<?php
while($row=mysql_fetch_array($result)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$c=mysql_query($votecasted);
while($val=mysql_fetch_array($c)){
$casted=$val['votecasted'];

}

//calculate votes in percent

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200"><?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>

<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%" style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>

<?php
}
}}

/*******************************************President END ****************************************************/
?>
                
                
			</div>
		</div>
		<div class="panel">
		  <div class="panel-wrapper">
				<h2 class="title">Vice-President</h2>
				
<?php

/*******************************************Vice-President  ****************************************************/

?>
<?php

$result="SELECT * FROM `vpres`";

$result=mysql_query($result);
//check if vicepresident tableis empty
if(mysql_num_rows($result)!=0){
?>	

<?php

while($row=mysql_fetch_array($result)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$c=mysql_query($votecasted);
while($val=mysql_fetch_array($c)){
$casted=$val['votecasted'];

}

//calculate votes in percent

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200"><?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>

<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>

<?php
}
}
}//end of IF

/*******************************************Vice-President END  ****************************************************/
?>
                
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">General Secretary</h2>
				
                
                
                
<?php
/*******************************************General Secretary  ****************************************************/

?>



<?php 
$result="SELECT * FROM `gensec`";

$res=mysql_query($result);
//if general secretary table is not empty
if(mysql_num_rows($res)!=0){?>

<?php
while($row=mysql_fetch_array($res)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vo=mysql_query($votecasted);
while($val=mysql_fetch_array($vo)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}

$width2=($num*100)/$casted;
?>


<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>

<?php
}
}
}//END of IF
/*******************************************General Secretary END  ****************************************************/

?>
                
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Assistant General Secretary</h2>
				
                
                
<?php

/******************************************* Assistant General Secretary ****************************************************/
?>

<?php
$result="SELECT * FROM `assgensec`";

$res=mysql_query($result);
//IF ass gensec table is not empty
if(mysql_num_rows($res)!=0){?>

<?php
while($row=mysql_fetch_array($res)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$v=mysql_query($votecasted);
while($val=mysql_fetch_array($v)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}

$width2=($num*100)/$casted;
?>


<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}}//end of IF
/*******************************************END ****************************************************/

?>
                
		  </div>
		</div>
        


		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Treasuruer</h2>
				
                
                
<?php

/*******************************************Treasurer  ****************************************************/
?>

<?php
$result="SELECT * FROM `treasurer`";

$res=mysql_query($result);
//if treasurer table is not empty
if(mysql_num_rows($res)!=0){?>

<?php

while($row=mysql_fetch_array($res)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vo=mysql_query($votecasted);
while($val=mysql_fetch_array($vo)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END  ****************************************************/

?>
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Assistant Treasurer</h2>
				
                
                
<?php


/*******************************************Assistant Treasurer  ****************************************************/
?>


<?php

$result="SELECT * FROM `asstreasurer`";

$result=mysql_query($result);
//if asstreasurer table is not empty
if(mysql_num_rows($result)!=0){?>


<?php


while($row=mysql_fetch_array($result)){

$num=$row['votecount'];

//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>


<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END****************************************************/

?>
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Financial Secretary</h2>
				
                
<?php


/*******************************************Financial Secretary****************************************************/
?>


<?php

$result="SELECT * FROM `finsec`";

$result=mysql_query($result);
//if asstreasurer table is not empty
if(mysql_num_rows($result)!=0){?>


<?php


while($row=mysql_fetch_array($result)){

$num=$row['votecount'];

//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END****************************************************/

?>
                
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Assistant Financial Secretary</h2>
				
                
                
<?php


/*******************************************Assistant Financial Secretary  ****************************************************/
?>


<?php

$result="SELECT * FROM `assfinsec`";

$result=mysql_query($result);
//if asstreasurer table is not empty
if(mysql_num_rows($result)!=0){?>


<?php


while($row=mysql_fetch_array($result)){

$num=$row['votecount'];

//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END****************************************************/

?>
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Director of Research</h2>
				
                
                
<?php
/*******************************************Research  ****************************************************/
?>
<?php
$result="SELECT * FROM `research`";

$res=mysql_query($result);
//if research table is not empty
if(mysql_num_rows($res)!=0){?>

<?php

while($row=mysql_fetch_array($res)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>


<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//END of IF
/*******************************************END****************************************************/

?>
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">PRO I</h2>
				
<?php

/*******************************************PRO1 ****************************************************/
?>

<?php
$result="SELECT * FROM `pro1`";

$result=mysql_query($result);
//if pro1 table is not empty
if(mysql_num_rows($result)!=0){?>
<?php
while($row=mysql_fetch_array($result)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//END of IF
/*******************************************END****************************************************/
?>
                
                
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">PRO II</h2>
				<?php
                
/*******************************************PRO2  ****************************************************/

?>
<?php
$result="SELECT * FROM `pro2`";
$res=mysql_query($result);
//if pro2 table is not empty
if(mysql_num_rows($res)!=0){?>
<?php
while($row=mysql_fetch_array($res)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END****************************************************/
?>
                
                
		  </div>
		</div>

        
        		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Wellfare I</h2>
				
     <?php           
/*******************************************WELLFARE I ****************************************************/
?>

<?php
$result="SELECT * FROM `wellfare1`";
$res=mysql_query($result);
//if wellfare 1 table is not empty
if(mysql_num_rows($res)!=0){?>

<?php

While($row=mysql_fetch_array($res)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END****************************************************/
?>
                
                
			</div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Wellfare II</h2>
				
 <?php               
/*******************************************WELLFARE II****************************************************/
?>

<?php
$result="SELECT * FROM `wellfare2`";
$res=mysql_query($result);
//if wellfare2 table is not empty
if(mysql_num_rows($res)!=0){?>

<?php

While($row=mysql_fetch_array($res)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=$num*10;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END****************************************************/

?>
                
                
		  </div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Sports</h2>
				
<?php                
/*******************************************SPORTS****************************************************/
?>

<?php
$result="SELECT * FROM `sports`";
$res=mysql_query($result);
//if  sports table is empty
if(mysql_num_rows($res)!=0){?>
<?php

while($row=mysql_fetch_array($res)){

$num=$row['votecount'];
//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";

$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}


//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}

$width2=($num*100)/$casted;
?>


<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END****************************************************/
?>
                
                
		  </div>
		</div>

        
        		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Social</h2>
				
<?php



/*******************************************SOCIAL  ****************************************************/

?>
<?php
$result="SELECT * FROM `socials`";
$res=mysql_query($result);
//if socials table is not empty
if(mysql_num_rows($res)!=0){?>

<?php
while($row=mysql_fetch_array($res)){

$num=$row['votecount'];

//ensure no empty row is returned
if($row['name']!=""){



//Get Total Number of votes casted

$votecasted="SELECT count(`voterid`) AS `votecasted` FROM `voted`";
$vot=mysql_query($votecasted);
while($val=mysql_fetch_array($vot)){
$casted=$val['votecasted'];

}

//calculate votes in percent

if($num>0){
$percent=round(($num * 100)/$casted, 1);
}elseif($num==0){$percent=0;}


$width2=($num*100)/$casted;
?>

<fieldset>
<table border="0" width="80%" class="lvrestab">
<tr>
<td width="200">
<?php 
if($row['pic']==""){
	echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
	}

echo "<img src='../uploads/{$row['pic']}' width='40%' height='40%' />";?></td>
<td style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:1em; font-weight:bold;"><?php echo $row['name'];?></td>
</tr>
</table>
</fieldset>
<fieldset>
<table border="1"  height="34"  width="400" style="position:relative; top:-70px; left:450px; border:1px solid #CCC;">
<tr>
<td style="font-size:24px; text-align:center;"><?php echo "$num &nbsp;/&nbsp;$casted&nbsp;($percent%)";?></td>
</tr>
<tr>
<td width="100%"  style="background-color:#56b1e6; border:1px solid #2f7fad;"><img src='../images/graph.jpg' height="34" width="<?php echo $width2."%";?>"  /></td>
</tr>
</table>
</fieldset>
<?php
}
}
}//end of IF
/*******************************************END****************************************************/
?>
                
                
                
			</div>
		</div>

	</div><!-- .coda-slider -->
</div>

  
  
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

<!--End of body div-->






<!--Footer div-->
<!--End of footer div-->









</div>
<!---End of wrapper div-->
<div id="footer">
<p>Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
</body>
</html>
<?php
}else {
	header("location:admin_login.php?acess=denied");
} ?>