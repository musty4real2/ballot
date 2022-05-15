<?php
 

if($_POST['upload']){
	
	$table=$_POST['table'];
	$id=$_POST['id'];
	
	if(isset($_FILES['picture'])){
		$allowed=array('image/pjpeg','image/jpeg', 'image/jpeg','image/JPG', 'image/X-PNG','image/PNG', 'image/png','image/x-png');
		if(in_array($_FILES['picture']['type'], $allowed)){
			
			if(move_uploaded_file($_FILES['picture']['tmp_name'], "../uploads/{$_FILES['picture']['name']}")){
				$file="uploads/{$_FILES['picture']['name']}";
				include "connect.php";
				$query="UPDATE `{$table}` SET `pic`='{$file}' WHERE `id`='{$id}'";
				if(!$query=mysql_query($query)){
					die (mysql_error());
					}
				
				
				
				
				echo "The file has been moved";
				
				
				
				}
		}else{
			echo "Please upload a jpeg or gif image";
			}
		}
		if($_FILES['picture']['error']>0){
			echo "file could not be uploaded because:";
			switch ($_FILES['picture']['error']){
				case 1:
					echo "The file exceeds theupload_max_filesize setting in php.ini.";
					break;	
				case 2:
					echo "The file exceeds theMAX_FILE_SIZE setting in the HTML form.";
					break;
				case 3:
					echo "The file was only partially uploaded";
				break;
				default :"A system error occurred.";
				}
			}
		if (file_exists($_FILES['picture']['tmp_name'])&& is_file($_FILES['picture']['tmp_name'])){
			unlink($_FILES['picture']['tmp_name']);
			}	
	}
?>
?>