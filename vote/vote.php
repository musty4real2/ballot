<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if($_SESSION['cur_voter']==1){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ballot::e-vote system</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- Begin Stylesheets -->
		<link rel="stylesheet" href="../css/coda-slider-2.0.css" type="text/css" media="screen" />
	<!-- End Stylesheets -->
	
	<!-- Begin JavaScript -->
    <style type="text/css">
    span.counter {
   color: red;
   cursor: default;
   font-size: 10em;
}

div.info {
   margin: 0 auto;
   text-align: left;
   font-size: smaller;
   width: 80%;
   position:relative;
   top:-120px;
   left:400px;
}
</style>

<script src="countdownRedirect.js" type="text/javascript"></script>

		<script type="text/javascript" src="../js/jquery-1.3.2coda.min.js"></script>
		<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="../js/jquery.coda-slider-2.0.js"></script>
		 <script type="text/javascript">
			$().ready(function() {
				$('#coda-slider-1').codaSlider();
			});
		 </script>

</head>

<body onload='countdownRedirect("http://localhost/ballot/vote/login_vote.php", "You have been forced to logout")'>

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
  
  
  
  <p style="color:#999;"><img src="../images/like.gif" width="150" height="110" />
   Welcome <span style="color:#30a3e4; font-size:36px;"> <?php echo $_SESSION['name'];?></span>. Please cast your vote</p>

<div class="info" style="color:#999;"><center> <span class="counter" id="COUNTDOWN_REDIRECT">300</span> seconds left.</center>
</div>

  <p>Click on the link below to see voting categories</p>
  <form action="process_vote.php" method="post">

  
  <div class="coda-slider-wrapper">
    <div class="coda-slider preload" id="coda-slider-1">
      
      
        
        
  <?php
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	
	$obj=new ballot;
?>

        <input type="hidden" name="voterid" value="<?php echo $_SESSION['voterid'];?>"/>
        <input type="hidden" name="matric" value="<?php echo $_SESSION['username'];?>"/>
        <input type="hidden" name="dept" value="<?php echo $_SESSION['branch'];?>"/>
        <input type="hidden" name="name" value="<?php echo $_SESSION['name'];?>"/>
        
     			  
				  <?php 
	$all=$obj->selectall("pres_single");
	 //if no contestant for this category
		  

              if(mysql_num_rows($all)!=0){ 
   ?>
        <div class="panel">
          <div class="panel-wrapper">
        	  

    
  <h2 class="title">President</h2>
  <table width="100%" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  
	  
	  
	  //ensure no empty row is displayed
	  if($row['name']!=""){?>
    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input  type="radio" name="pres" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
       <div id="caleb"></div></label>
  </td>
      </tr>
    
    <?php
		}}
		?>
    
    
  </table>
            
            
  </div>
          
          
          
        </div>
                    <?php }// END of IF?>

        
        
        
        
        
                   <?php
	$obj=new ballot;
	$all=$obj->selectall("vpres");
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
 
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Vice-President</h2>
            

  <table width="100%" border="0">
    
  <?php while($row=mysql_fetch_array($all)){


	 
	 
	 //ensure no empty row is displayed
	  if($row['name']!=""){?>
    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="vpres" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
       <div id="caleb"></div></label>
  </td>
      </tr>
    
    <?php
		}}
		?>
    
  </table>
            
            
            
            
            
            </div>
        </div>
        <?php } //end of IF ?>
        
        
   
   
        
         <?php
     
     	$obj=new ballot;
	$all=$obj->selectall("presgroup");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){ 
?>
   
        
        
  <div class="panel">
    <div class="panel-wrapper">
      <h2 class="title">President</h2>
      
  <table width="100%" border="0">
    
  <?php while($row=mysql_fetch_array($all)){


	  	  //ensure no empty row is displayed
	  if($row['presname']!=""){?>

	  
    <tr class="bigtr">
      <td width="100">
      <?php 
	  if($row['prespic']==""){
		  echo "<img src='../images/voters_img.gif' width='50%' height='50%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['prespic'];?>" width="100%" height="100%" /></td>
      <td style="font-size:22px;"> <?php echo $row['presname'];?></td>
      <td width="100">
      <?php
	  if($row['vprespic']==""){
		  echo "<img src='../images/voters_img.gif' width='50%' height='50%' />";
		  }
		  ?>
      <img src="<?php echo "../uploads/".$row['vprespic'];?>" width="100%" height="100%" /></td>
      <td style="font-size:22px;"><?php echo $row['vpresname'];?></td>
      <td>
        <label>
        <input type="radio" name="presgroup" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "vpres_".$i;}?>"  />
       </label>
  </td>
      </tr>
    
    <?php
		}}
		?>
    
  </table>
      
      
      
      
      
      </div>
    </div>
        <?php } //end of if?>
        
        
        
        
        
        
        
        
                 <?php $obj=new ballot;
	$all=$obj->selectall("gensec");
   	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){ ?>

   
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">General Secretary</h2>
	

            
            
  <table width="100%" border="0" >
    
  <?php while($row=mysql_fetch_array($all)){
	  
	  //ensure no empty row is displayed
	  if($row['name']!=""){?>
    
    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="gensec" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
    </label>
  </td>
      </tr>
    
    <?php
	  }}
		?>
    
    
  </table>
            
            
            </div>
        </div>
<?php 	  }//END of IF ?>



        
        
            <?php $obj=new ballot;
	$all=$obj->selectall("assgensec");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){?>
            
        
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Assistant General Secretary</h2>
            
  <table width="100%" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  
	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="assgensec" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
     </label>
  </td>
      </tr>
    
    
    <?php
		}}
		?>
    
    
  </table>
            
            </div>
        </div>
        
        <?php 	  }//END of IF ?>
        
        
        
        
        
        
        
            <?php $obj=new ballot;
	$all=$obj->selectall("treasurer");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
        
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Treasurer</h2>
            
            
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
    
    	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    
    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="treasurer" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
      </label>
  </td>
      </tr>
    
    
    <?php
		}}
		?>
    
    
  </table>
            
            </div>
        </div>
        
<?php 	  }//END of IF
?>        
        
        
        
  
  
  
  
            <?php $obj=new ballot;
	$all=$obj->selectall("asstreasurer");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){ 
?>
  
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Assistant Treasurer</h2>
            
            
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  
	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="asstreasurer" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
      </label>
  </td>
      </tr>
    
    
    <?php
		}}
		?>
    
    
  </table>
            
            </div>
        </div>
        
<?php 	  }//END of IF
?>        
        
        
        
        
        
        
        
        
            <?php $obj=new ballot;
	$all=$obj->selectall("finsec");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
        
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Financial Secretary</h2>
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  
	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

	  
    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="finsec" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
      </label>
  </td>
      </tr>
    
    
    <?php
		}}
		?>
    
    
  </table>
            
            </div>
        </div>
<?php 		  }//END of IF
?>        
        
        
       
        
        
            <?php $obj=new ballot;
	$all=$obj->selectall("assfinsec");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
  
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Assistant Financial Secretary</h2>
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  
	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="assfinsec" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
     </label>
  </td>
      </tr>
    
    
    <?php
		}}
		?>
    
    
    
  </table>
            
           </div>
        </div>
        
<?php 	  }//END of IF
?>        
        
        
        
  
  
            <?php $obj=new ballot;
	$all=$obj->selectall("research");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Director of Research</h2>
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  
	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    
    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="research" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
       </label>
  </td>
      </tr>
    
    
    <?php
	  }}
		?>
    
    
  </table>
            
            </div>
        </div>
<?php 	  }//END of IF
?>        
        
        
        
  
  
            <?php $obj=new ballot;
	$all=$obj->selectall("pro1");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Public Relations Officer I</h2>
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="pro1" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
      </label>
  </td>
      </tr>
    
    
    <?php
		}}
		?>
    
    
  </table>
            
            </div>
        </div>
        <?php 		  }//END of IF
?>



        
            <?php $obj=new ballot;
	$all=$obj->selectall("pro2");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Public Relations Officer II</h2>
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    
    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="pro2" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
       </label>
  </td>
      </tr>
    
    <?php
		}}
		?>
    
    
  </table>
            
            </div>
        </div>
<?php 	  }//END of IF
?>


        
        
        
      
            <?php $obj=new ballot;
	$all=$obj->selectall("sports");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Director Of Sports</h2>
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  	 
		 
		 //ensure no empty row is displayed
	  if($row['name']!=""){?>

    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="sports" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
      </label>
  </td>
      </tr>
    
    
    <?php
		}}
		?>
    
    
  </table>
            
            </div>
        </div>
        <?php 	  }//END of IF
?>
        
  
  
  
  
        
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Director of Socials</h2>
            <?php $obj=new ballot;
	$all=$obj->selectall("socials");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="socials" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
      </label>
  </td>
      </tr>
    
    <?php
		}}
		?>
    
  </table>
            
            
            </div>
        </div>
        
<?php 	  }//END of IF
?>


  
            <?php $obj=new ballot;
	$all=$obj->selectall("wellfare1");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){ 
?>
        
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Wellfare Director I</h2>
  <table width="800" border="0">
    
  <?php while($row=mysql_fetch_array($all)){
	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="wellfare1" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
       </label>
  </td>
      </tr>
    
    
    <?php
		}}
		?>
    
    
  </table>
            
          </div>
        </div>
<?php 	  }//END of IF
?>        
        
        
  
  
            <?php $obj=new ballot;
	$all=$obj->selectall("wellfare2");
	
	  	  //if no contestant for this category
	  if(mysql_num_rows($all)!=0){
?>
        <div class="panel">
          <div class="panel-wrapper">
            <h2 class="title">Wellfare Director II</h2>
  <table width="800" border="0">
    
    
  <?php while($row=mysql_fetch_array($all)){
	  

	  	  //ensure no empty row is displayed
	  if($row['name']!=""){?>

    <tr class="bigtr">
      <td width="250" style="padding-top:5px;">
      <?php 
	  if($row['pic']==""){
		  echo "<img src='../images/voters_img.gif' width='40%' height='40%' />";
		  }
		  ?>
          <img src="<?php echo "../uploads/".$row['pic'];?>" width="50%" height="50%" /></td>
      <td  style="font-size:3em;"><?php echo $row['name'];?></td>
      <td>
        <label>
        <input type="radio" name="wellfare2" value="<?php echo $row['id'];?>" id="
        <?php
		
		$i=0;
		while ($i<mysql_num_rows($row['id'])){
			echo "gensec_".$i;}?>"  />
      </label>
  </td>
      </tr>
    
    <?php
		}}
		?>
    
    
  </table>
            
            </div>
        </div>
        
<?php 	  }//END of IF
?>        
        
        
        
        
        
        
        
        
        
        
        <div class="panel">
        
        <div class="panel-wrapper">
        <h2 class="title">Finish</h2>
        <p style="margin:20px 0 30px 0;">Click the button below to cast your vote</p>
  <input type="submit" class="but"  style="width:400px; height:70px; font-size:26px;" value="CLICK TO CAST YOUR VOTE" name="vote" />
        
      
      
      </div>
    </div>
  
  
  
  
  
  <div class="panel">
    <div class="panel-wrapper">
      <h2 class="title"></h2>
    </div>
    </div>
  
  
  
  
  
</div><!-- .coda-slider -->

</div><!-- .coda-slider-wrapper -->





  </form>


</div>
<!--End of body div-->















</div>
<!---End of wrapper div-->
<!--Footer div-->
<div id="footer">
<p>Developed by National 
Association of Cyber-Security Science (NACSS). &copy;2012. All Rights Reserved. Managed by Webgeeks Technologies +234-7037385018</p>
</div>
<!--End of footer div-->
</body>
</html>
<?php 
} elseif($_SESSION['cur_voter']!=1){
	header("location:login_vote.php?acess=denied");
	}
?>