<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
//** Wizecho ajax image/file uploader**//

//******** START SETTINGS ****************//

$base 					= "http://localhost/ballot";
$up_size 				= 500; //upload size in KB
$img_path 				= "/setup/uploads/";  //url where the images are stored
$icons 					= "{$base}/images"; //url where icons for uplod are stored - no trailing slash

require_once('inc/SimpleImage.class.php');	//used for thumbnails

$use_tmb				= 1; // Use thumb resizing 1 = yes, 0 = no

$tmb_w 					= 170; // Thumb size eg 170px wide 140px height
$tmb_h 					= 140;

$server 				= 0; // Transfer files to remote server via ftp 1 = yes, 0 = no

$target_ftp_server		= "server ip address"; //eg. 45.987.987.76
$target_ftp_user		= "user";
$target_ftp_pass		= "pass";
$target_ftp_path_thumb	= "/thumbs/"; //directory on remote serer from login via ftp


//******* END SETTINGS ********************//



$path = getcwd().$img_path;




if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg"))){
  
  if($_FILES["file"]["size"] > ($up_size* 1024)){
  echo "<img src ='{$icons}/error.gif'> Filesize ".($_FILES["file"]["size"] / 1024) ." Kb is too big. Allowable upload size is {$up_size} KB - Please upload a smaller one";
  }else{
  
  if ($_FILES["file"]["error"] > 0){
  
  echo "<img src ='{$icons}/error.gif'>  Return Code: " . $_FILES["file"]["error"] . "<br />";
  }else{
  
  
  			
			

  
  
  
  echo "<img src ='{$icons}/accept.png'>  Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "<img src ='{$icons}/accept.png'>  Size: " . ($_FILES["file"]["size"] / 1024) ." Kb<br />";
  echo "<img src ='{$icons}/accept.png'>  Image Type: " . $_FILES["file"]["type"] . "<br />";
           
  move_uploaded_file($_FILES["file"]["tmp_name"], $path . $_FILES["file"]["name"]);
    
  echo "<img src ='{$icons}/accept.png'>  Succesfully Uploaded. Creating thumb...<br>";     

	$dir = $path;
	$file = $_FILES["file"]["name"];
	
		$image = new SimpleImage();
		$image->load($dir.$file);
		
		//skip resizing and renaming gif images
		if ( ($_FILES["file"]["type"]) != 'image/gif' && $use_tmb==1){
		
		$new_file = time().rand().".jpg";
		$image->resize($tmb_w,$tmb_h);
		}else{
		
		$new_file = time().$file;
		}//end if not gif
				
	    $new_file= strtolower(str_replace(' ', '_', $new_file));
		$image->save($dir.$new_file);
		$image->load($dir.$file);
		
		if (file_exists($dir.$new_file)) {

	        if($server == 1){
	        
			echo "Sending file..<br>";
			
			// connect to target ftp server
			$target_conn = ftp_connect($target_ftp_server) or die("Could not connect to server try again!");
			ftp_login($target_conn, $target_ftp_user, $target_ftp_pass);
		
			// switch to passive mode if behind a firewall - REMOVE THIS IF YOU RUN INTO PROBLEMS
			ftp_pasv($target_conn, true );
		
			// change to the target path
			ftp_chdir($target_conn, $target_ftp_path_thumb);
		
			// upload the thumbnail
			ftp_put($target_conn, $new_file, $dir.$new_file, FTP_BINARY) or die("There was an error uploading the thumbnail. Please try again");
			
			unlink ($dir.$new_file); //delete the new file from local server
			
			ftp_close($target_conn);
			}//end if server yes


		echo "<img src ='{$icons}/accept.png'>  All done!<br><br>Thankyou {$nick}, Here is a prieview of you photo. <br>";	
		echo "<img src='{$base}{$img_path}{$new_file}' border='0' />";
		
		unlink($dir.$file); //delete the original (full size) file from local server
		
		//**Add some database options here if you want**//
		
	//include database connect script
	include_once("connect.php");
	
	//include class that has all the method
	include_once("../ballot_class.php");
	

		$picpath=$path . $_FILES["file"]["name"];	
			$insertpic="UPDATE `client` SET `logo`='$picpath'";
			if(!$insert=mysql_query($picpath)){die(mysql_error());}			
			
			
							
		} else {
		echo "<img src ='{$icons}/error.gif'> There was an error creating the thumbnail. Please try again ";
		}//end if file exists
		
	}//end if file error
	}//end if filesize
	
}else{
echo "<img src ='{$icons}/error.gif'> Invalid file";
}
?>