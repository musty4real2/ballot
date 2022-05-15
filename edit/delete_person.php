<?php

include_once ("../ballot_class.php");
include_once("../connect.php");

$obj=new ballot;

$table=$_GET['table'];
$delete="DELETE FROM `{$table}` WHERE `id`='{$_GET['id']}'";
$delete=$obj->mysqlQuery($delete);

header("location:{$_GET['page']}?deleted=1");
























?>