<?php



class ballot{
	
public $field1;
public $field2;
public $field3;
public $field4;
public $field5;
public $field6;
public $field7;
public $field8;
public $field9;

public $value1;
public $tabdelete;

public $where;
public $is;
public $all;
public $tab;
public $qstring;


//mysqlQuery method
public function mysqlQuery($querystring){
	$this->qstring=$querystring;
	
	if(!$sql=mysql_query($this->qstring)){
		die("Sorry and error occured: ". mysql_error());
		}
	
	}
	
//end of mysqlQuery method	
	
	
	
//selectall method	
public function selectall($table){
	$this->tab=$table;
	
	$query="SELECT * FROM `{$this->tab}`";
	if(!$execute=mysql_query($query)){
		die("Sorry, could not select all records in the {$this->tab} table. <br/> ERROR: ".mysql_error());
		}
		
	else{return $execute;}
	
	}	
	
//end of selectall method	
	
	
	
	
	
public function selectAllWhere($table, $where, $is){
	$this->tab=$table;
	$this->where=$where;
	$this->is=$is;
	
	
	$query="SELECT * FROM `{$this->tab}` WHERE `{$this->where}`='{$this->is}'";
	if(!$execute=mysql_query($query)){
		die("Sorry, could not select all records in the {$this->tab} table. <br/> ERROR: ".mysql_error());
		}
		
	else{return $execute;}
	
	}
	
	
	
	public function deleteAllWhere($tab, $whereid){
		
		$this->tabdelete=$tab;
		$this->where=$whereid;
		
		
	$query="DELETE FROM  `{$this->tabdelete}` WHERE `id`='{$this->where}'";
	if(!$execute=mysql_query($query)){
		die("Sorry, could not delete records {$this->tab} table. <br/> ERROR: ".mysql_error());
		}
		
	else{return $execute;}
	
	
		}
	
	
	
	
	public function voterlogin($matric, $pass){
		
		$this->field1=$matric;
		$this->field2=$pass;
		
	$log="SELECT * FROM `voters` WHERE `matric`='{$this->field1}' AND `password`='{$this->field2}'";
	
	if(!$execute=mysql_query($log)){
		die("Sorry, Could not log you in at this time <br/> ERROR: ".mysql_error());
		}
				
	else{return $execute;}
		
		}
	
	
		
	}
	
 
	
	





















?>