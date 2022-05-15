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
		<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.7.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
	

				// Dialog			
				$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});

				// Datepicker
				$('#datepicker').datepicker({
					inline: true
				});
				
				// Slider
				$('#slider').slider({
					range: true,
					values: [17, 67]
				});
				
			});
		</script>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!---Wrapper div-->




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

<div id="body">

<h1><img src="../images/set3.gif" width="156" height="204" />Edit Setup</h1>
<!--body div-->
  
  <?php


	
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;


?>
  
  <div id="accordion">
    
    
    
    
  <!--President accordion div-->	
  <div>
  <h3><a href="#">President</a></h3>
  <div>
    
  <fieldset>
  <legend>President (Single)</legend>

<?php
	    	$all=$obj->selectall("pres_single");

	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
else{?>

    <ul>
      <li onclick="TINY.box.show({iframe:'http://localhost/ballot/edit/edit_pres_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
      </ul>
    
    
  <table border="0" width="100%">
    
    
    
  <?php while($row=mysql_fetch_array($all)){
	  
	  
	  if($row['name']!=""){
  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>   
    
    
    <?php }?>
  </table>
    <?php }?>
    
    
    
  </fieldset>
  </div></div>
  <!--President accordion div-->	
    
 
 
   <!--President accordion div-->	
  <div>
  <h3><a href="#">President Group</a></h3>
  <div>
   
  <fieldset style="padding-left:5px; padding-right:5px;">
  <legend>President (Group)</legend>
    
    <?php	
	$all=$obj->selectall("presgroup");

if(mysql_num_rows($all)==0){echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";}
else{
?>
    <ul>
      <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_presgroup_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
      </ul>
    
    
    
  
    
  <table border="0" width="100%">
    
  <tr>
  <th>PRESIDENT</th>
  <td></td>
  <th>VICE PRESIDENT</th>
  <td></td>
  </tr>
    
    
    
  <?php while($row=mysql_fetch_array($all)){	  
  if($row['presname']!=""){
?>
  
  <tr class="bigtr">
  
  
  <td style="font-size:20px; padding-left:10px;"><?php echo $row['presname'];?></td>
  <td width="100"><?php  
  if($row['prespic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
	  }
	 else{ echo "<img src='../uploads/{$row['prespic']}' width='100%' height='100%'/>";}?></td>
  
  
  <td style="font-size:20px; padding-left:10px;"><?php echo $row['vpresname'];?></td>
  
  <td width="100"><?php  
  if($row['prespic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
	  }
	 else{echo "<img src='../uploads/{$row['vprespic']}' width='100%' height='100%'/>";}?></td>
    
    </tr>
    
    
    <?php }}?>
  </table>
    
    
<?php } ?>    
  </fieldset>
  </div></div>
  <!--President accordion div-->	
  
  
    
    
    
    
   <!--President accordion div-->	
  <div>
  <h3><a href="#">Vice-President</a></h3>
  <div>
  <fieldset>
  <legend>Vice-President</legend>
    
    
    
    
    
  <?php	
	$all=$obj->selectall("vpres");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_vpres_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>

  <table border="0" width="100%">
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
    
    
  <td width="100"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}
?>
    </td>
    
    
    
    </tr>
    
    
    <?php }}?>
  </table>
    <?php } ?>
    
    
  </fieldset>
    
  </div></div>
  <!--President accordion div-->	
  
    
    
    
   <!--President accordion div-->	
  <div>
  <h3><a href="#">General Ssecretary</a></h3>
  <div>
  <fieldset>
  <legend>General Secretary</legend>
    
  <?php	
	$all=$obj->selectall("gensec");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_gensec_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>

  <table border="0" width="100%">
    
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    
    <?php }?>
  </table>
    
    <?php }?>
    
    
    
    
  </fieldset>
  </div></div>
  <!--President accordion div-->	
  
    
    
    
    
    
    
    
    
    
    
   <!--President accordion div-->	
  <div>
  <h3><a href="#">Assistant General Secretary</a></h3>
  <div>
  <fieldset>
  <legend>Assistant General Secretary</legend>
  <?php	
	$all=$obj->selectall("assgensec");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_assgensec_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>
    

  <table border="0" width="100%">
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    <?php }?>
  </table>
    <?php } ?>
    
    
  </fieldset>
    </div></div>
  <!--President accordion div-->	

  
  
 
 
 
 
  
  
   <!--President accordion div-->	
  <div>
  <h3><a href="#">Financial Secretary</a></h3>
  <div>
  <fieldset>
  <legend>Financial Secretary</legend>
    
  <?php	
	$all=$obj->selectall("finsec");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_finsec_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>
    

  <table border="0" width="100%">
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    
    <?php }?>
  </table>
    <?php } ?>
  </fieldset>
    </div></div>
  <!--President accordion div-->	



    
    
 
 
 
 
 
    
    
    
   
   
   
   
    
    <!--President accordion div-->	
  <div>
  <h3><a href="#">Assistant Financial Secretary</a></h3>
  <div>
   
  <fieldset>
  <legend>Assistant Financial Secretary</legend>
    
    
    
  <?php	
	$all=$obj->selectall("assfinsec");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_assfinsec_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"class="but">EDIT</li>
        </ul></div>

  <table border="0" width="100%">
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    
    <?php }?>
  </table>
<?php } ?>    
  </fieldset>
    </div></div>
  <!--President accordion div-->	
    
    
    
  <div>
  <h3><a href="#">Treasurer</a></h3>
  <div>
   
  <fieldset>
  <legend>Treasurer</legend>
    
    
  <?php	
	$all=$obj->selectall("treasurer");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>    <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_treasurer_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>

    
  <table border="0" width="100%">
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    
    
    <?php }?>
  </table>
    <?php } ?>
  </fieldset>
    </div></div>
  <!--President accordion div-->	
    
    
 
 
  <div>
  <h3><a href="#">Assistant Treasurer</a></h3>
  <div>
   
  <fieldset>
  <legend>Assistant Treasurer</legend>
    
    
  <?php	
	$all=$obj->selectall("asstreasurer");

	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{


?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_asstreasurer_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>

  <table border="0" width="100%">
    
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    
    
    <?php }?>
  </table>
    <?php } ?>
  </fieldset>
    </div></div>
  <!--President accordion div-->	
 
 
    
    
  <div>
  <h3><a href="#">Director of Research</a></h3>
  <div>
  <fieldset>
  <legend>Director of Research</legend>
    
    
    
    
  <?php	
	$all=$obj->selectall("research");

	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{


?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_research_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>

  <table border="0" width="100%">
        
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    
    
    <?php }?>
  </table>
    
    <?php } ?>
  </fieldset>
    
    </div></div>
  <!--President accordion div-->	
    
    
    
    
    
    
    
      <div>
  <h3><a href="#">Director of Sports</a></h3>
  <div>

  <fieldset>
  <legend>Director of Sports</legend>
    
    
    
  <?php	
	$all=$obj->selectall("sports");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_sports_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>

  <table border="0" width="100%">
    
    
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    
    
    <?php }?>
  </table>
    <?php } ?>
    
  </fieldset>
    </div></div>
  <!--President accordion div-->	
    
    
    
    
    
    
   
   
   
         <div>
  <h3><a href="#">Director of Socials</a></h3>
  <div>
 
  <fieldset>
  <legend>Director of Socials</legend>
    
    
    
    
  <?php	
	$all=$obj->selectall("socials");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_social_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>

  <table border="0" width="100%">
        
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    
    
    <?php }?>
  </table>
    <?php } ?>
    
  </fieldset>
    </div></div>
  <!--President accordion div-->	
    
    
    
    
    
    
    
         <div>
  <h3><a href="#">Public Relatios Officer I</a></h3>
  <div>
  <fieldset>
  <legend>Public Relations officer 1</legend>
    
    
  <?php	
	$all=$obj->selectall("pro1");

	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_pro1_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>
    

  <table border="0" width="100%">
    
    
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}}
?>
    </td>
    
    
    </tr>
    
    
    <?php }?>
  </table>
    <?php }?>
    
    
    
    
    
  </fieldset>
      </div></div>
  <!--President accordion div-->	

  
  
  
  
  
         <div>
  <h3><a href="#">Public Relatios Officer II</a></h3>
  <div>
  <fieldset>
  <legend>Public Relations officer 2</legend>
    
    
    
  <?php	
	$all=$obj->selectall("pro2");


	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        
    <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_pro2_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>
    

  <table border="0" width="100%">
       
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}
?>
    </td>
    
    
    </tr>
    
    
    <?php }}?>
  </table>
    <?php  }?>
    
    
    
  </fieldset>
      </div></div>
  <!--President accordion div-->	
    
   
   
   
   
   
            <div>
  <h3><a href="#">Wellfare Officer I</a></h3>
  <div>
 
  <fieldset>
  <legend>Welfare Officer 1</legend>
    
    
    
  <?php	
	$all=$obj->selectall("wellfare1");

	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_wellfare1_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>
    

  <table border="0" width="100%">
    
    
    
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}
?>
    </td>
    
    
    </tr>
    <?php }} ?> 
    
  </table>
    
    <?php } ?>
  </fieldset>
      </div></div>
  <!--President accordion div-->	






    
            <div>
  <h3><a href="#">Wellfare Officer II</a></h3>
  <div>
  <fieldset>
  <legend>Welfare Officer 2</legend>
    
    
    
  <?php	
	$all=$obj->selectall("wellfare2");

	  	  //if no contestant for this category
	  if(mysql_num_rows($all)==0){ echo "<h1>This Category is empty. Go to <a href='../setup/settings.php'>ballot setup</a> to add to this category</h1>";
	  }//END of IF
	  else{

?>
        <div id="testdiv">
      <ul>
        <li onclick="TINY.box.show({iframe:'http://127.0.0.1/ballot/edit/edit_wellfare2_frame.php',boxid:'frameless',width:750,height:450,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})" class="but">EDIT</li>
        </ul></div>
    

  <table border="0" width="100%">
        
  <?php while($row=mysql_fetch_array($all)){
	  	  if($row['name']!=""){

	  ?>
  <tr class="bigtr">
  <td style="font-size:26px; padding-left:10px;"><?php echo $row['name'];?></td>
  <?php
$idd=$row['id'];
$namee=$row['name'];
?>
  <td width="100" style="padding-right:10px;"><?php 
if($row['pic']==""){
echo "<img src='../images/voters_img.gif' width='100%' height='100%' />";
}

else{ 
echo "<img src='../uploads/{$row['pic']}'";?>  width='100%' height='100%'/>
    
  <?php 
}
?>
    </td>
    
    
    </tr>
    
    <?php }}?>
  </table>
<?php } ?>    
    
  </fieldset>
      </div></div>
  <!--President accordion div-->	
</div>    
  <!--End of accordion div-->
</div>
<!--End of body div-->






<!--Footer div-->
<div id="footer">
<p>Developed by National 
Association of Cyber-Security Students (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->









<!---End of wrapper div-->
</body>
</html>
<?php } else {
	header("location:../admin/admin_login.php?acess=denied");
} ?>