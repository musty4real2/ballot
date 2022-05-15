<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$matric=$_GET['matric'];
	//include database connect script
	include_once("../setup/connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;
	$all=$obj->selectAllWhere("voters", "username", "$matric");
	if(mysql_num_rows($all) !=0){
?>
  
  <fieldset>
  <legend>RRESULT</legend>
   <h1>MATRIC NUMBER ERROR</h1> 
    
    <table width="800" border="0">
      <tr>
        <th>SURNAME</th>
        <th>FIRSTNAME</th>
        <th>MATRIC NUMBER</th>
        <th>DEPT</th>	
        <th>PASSWORD</th>
        <th></th>
        </tr>
  <?php
while($row=mysql_fetch_array($all)){

?>
      
      
      
      
      
      
      
      <tr>
        <td><?php echo $row['surname'];?></td>
        <td><?php echo $row['firstname'];?></td>
        <td><?php echo $row['matric'];?></td>
        <td><?php echo $row['dept'];?></td>
        <td><?php echo $row['password'];?></td>    <?php $_SESSION['verid']=$row['id']; ?>
        
        <td><?php if($row['verstatus']==1){echo "Verified";} else {?>
  <?php } ?></td>
        
  <td><?php if($row['votestatus']==1){echo "Voted";} else { echo "Not Voted";  }?></td>
     <td><?php echo "<a href='../edit/edit_voters_record.php?editid={$row['id']}'>CHANGE</a>";?></td>

        
        
        </tr>
      
      
      <?php }}?>

</body>
</html>