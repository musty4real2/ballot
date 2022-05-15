



<?php
session_start();
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$query="UPDATE `voters` SET `verstatus`='1' WHERE `id`='{$_SESSION['verid']}'";
	
	$ver=mysql_query($query);
	
	$_SESSION['verid']=array();
	
		header("location:verification.php?verify=1");


?>


