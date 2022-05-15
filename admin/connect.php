<?php


//connect to the mysql database
if(!$connection=@mysql_connect("localhost", "root", "")){
	
	//if couldnt connect to database
	die("Sorry could not connect to the database<br/>ERROR: ".mysql_error());
	
	}



//if connection was succesfull, select database in mysql

if(!$db=@mysql_select_db("ballot", $connection))
{
	//if couldnt select databse
	die("Sorry, could not select ballot databse<br/>ERROR:".mysql_error());
	
	}



?>