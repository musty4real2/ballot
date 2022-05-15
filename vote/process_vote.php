
<?php
if(isset($_POST['vote'])){
	
	
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);



		//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;

	$voterid=$_POST['voterid'];
	$matric=$_POST['matric'];
	$name=$_POST['name'];
	$dept=$_POST['dept'];




	//****************process vote for president singe*****************************************/
	
$pres=$_POST['pres'];

$all=$obj->selectAllWhere("pres_single", "id", $pres);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `pres_single`  SET  `votecount`='$count' WHERE `id`='$pres'";
	
	$update=mysql_query($update);}

//********************************end of president*****************************************/ 	
	
	
	
	


//***************************process vote for Vice President***********************************/
				$vpres=$_POST['vpres'];
$all=$obj->selectAllWhere("vpres", "id", $vpres);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `vpres`  SET  `votecount`='$count' WHERE `id`='$vpres'";
	
	$update=mysql_query($update);
	}
//************************end of vice-president*************************************************/


$presgroup=$_POST['presgroup'];
$all=$obj->selectAllWhere("presgroup", "id", $presgroup);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `presgroup`  SET  `votecount`='$count' WHERE `id`='$presgroup'";
	
	$update=mysql_query($update);
	}


	
	
	
//***************************process vote for General Secretary***********************************/
				$gensec=$_POST['gensec'];
$all=$obj->selectAllWhere("gensec", "id", $gensec);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `gensec`  SET  `votecount`='$count' WHERE `id`='$gensec'";
	
	$update=mysql_query($update);
	}
	
	
//************************end of Generaal Secretary*************************************************/

	






//*****************Process assistant General Secretary****************************************/

				$assgensec=$_POST['assgensec'];
$all=$obj->selectAllWhere("assgensec", "id", $assgensec);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `assgensec`  SET  `votecount`='$count' WHERE `id`='$assgensec'";
	
	$update=mysql_query($update);
	}
	
//************************end of Assistant  Generaal Secretary*************************************************/




//***************************process vote for Financial Secretary Vote***********************************/
				$finsec=$_POST['finsec'];
$all=$obj->selectAllWhere("finsec", "id", $finsec);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `finsec`  SET  `votecount`='$count' WHERE `id`='$finsec'";
	
	$update=mysql_query($update);
	}
	
//************************end of Financial Secretary*************************************************/

	
	
	
//***************************process vote for Assistant Financial Secretary***********************************/
				$assfinsec=$_POST['assfinsec'];
$all=$obj->selectAllWhere("assfinsec", "id", $assfinsec);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `assfinsec`  SET  `votecount`='$count' WHERE `id`='$assfinsec'";
	
	$update=mysql_query($update);
	}
	
//************************end of Assistant Financial Secretary*************************************************/


	
	
//***************************process vote for Treasurer***********************************/
				$treasurer=$_POST['treasurer'];
$all=$obj->selectAllWhere("treasurer", "id", $treasurer);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `treasurer`  SET  `votecount`='$count' WHERE `id`='$treasurer'";
	
	$update=mysql_query($update);
	}
	
//************************end of Treasurer*************************************************/

	

	
//***************************process vote for Assistant Treasurer***********************************/
				$asstreasurer=$_POST['asstreasurer'];
$all=$obj->selectAllWhere("asstreasurer", "id", $asstreasurer);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `asstreasurer`  SET  `votecount`='$count' WHERE `id`='$asstreasurer'";
	
	$update=mysql_query($update);
	}
	
//************************end of Assistant Treasurer*************************************************/


	
	
	
//***************************process vote for Treasurer***********************************/
				$research=$_POST['research'];
$all=$obj->selectAllWhere("research", "id", $research);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `research`  SET  `votecount`='$count' WHERE `id`='$research'";
	
	$update=mysql_query($update);
	}
	
//************************end of Treasurer*************************************************/
	
	
	



	
//***************************process vote for Treasurer***********************************/
				$sports=$_POST['sports'];
$all=$obj->selectAllWhere("sports", "id", $research);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `sports`  SET  `votecount`='$count' WHERE `id`='$sports'";
	
	$update=mysql_query($update);
	}
	
//************************end of Treasurer*************************************************/
	
	
	
	
	
	
//***************************process vote for Treasurer***********************************/
				$socials=$_POST['socials'];
$all=$obj->selectAllWhere("socials", "id", $socials);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `social`  SET  `votecount`='$count' WHERE `id`='$social'";
	
	$update=mysql_query($update);
	}
	
//************************end of Treasurer*************************************************/
	



	
//***************************process vote for Treasurer***********************************/
				$wellfare1=$_POST['wellfare1'];
$all=$obj->selectAllWhere("wellfare1", "id", $research);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `wellfare1`  SET  `votecount`='$count' WHERE `id`='$wellfare1'";
	
	$update=mysql_query($update);
	}
	
//************************end of Treasurer*************************************************/




//***************************process vote for Treasurer***********************************/
				$wellfare2=$_POST['wellfare2'];
$all=$obj->selectAllWhere("wellfare2", "id", $wellfare2);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `wellfare2`  SET  `votecount`='$count' WHERE `id`='$wellfare2'";
	
	$update=mysql_query($update);
	}
	
//************************end of Treasurer*************************************************/
	
	
	
//***************************process vote for Treasurer***********************************/
				$pro1=$_POST['pro1'];
$all=$obj->selectAllWhere("pro1", "id", $pro1);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `pro1`  SET  `votecount`='$count' WHERE `id`='$pro1'";
	
	$update=mysql_query($update);
	}
	
//************************end of Treasurer*************************************************/
	
	

//***************************process vote for Treasurer***********************************/
				$pro2=$_POST['pro2'];
$all=$obj->selectAllWhere("pro2", "id", $pro2);
		while ($row=mysql_fetch_array($all)){
		
	$count=$row['votecount'];
	$count=$count+1;
		
	$update="UPDATE `pro2`  SET  `votecount`='$count' WHERE `id`='$pro2'";
	
	$update=mysql_query($update);
	}
	
//************************end of Treasurer*************************************************/





//********************Update VOTERS table to indicate that the voter has voted*******************/ 

$insert="UPDATE `voters` SET `votestatus`='1' WHERE `id`='$voterid'";
$insert=$obj->mysqlQuery($insert);



//********************END*******************/ 




/********************Enter voter, and voting information into the VOTED table*******************/


$ip=$_SERVER['REMOTE_ADDR'];
$insert="INSERT INTO `ballot`.`voted` (`voterid`,
`name` ,
`username` ,
`branch` ,
`pres` ,
`vpres` ,
`presgroup`,
`gensec` ,
`assgensec` ,
`treasurer` ,
`asstreasurer`,
`finsec` ,
`assfinsec` ,
`research` ,
`social` ,
`sports` ,
`pro1` ,
`pro2` ,
`wellfare1` ,
`wellfare2` ,
`date` ,
`ip`)
VALUES (
'$voterid','$name', '$matric', '$dept', '$pres',  '$vpres', '$presgroup', '$gensec', '$assgensec',
 '$treasurer', '$asstreasurer', '$finsec', '$assfinsec', '$research', '$social', '$sports', 
 '$pro1', '$pro2', '$wellfare1', '$wellfare2', NOW(), '$ip')";


$insert=$obj->mysqlQuery($insert);


/********************END*******************/ 


	$_SESSION=array();



//Redirect User on Sucessfull voting
header("location:login_vote.php?vote=completed");
	
	
	
	
	}


?>