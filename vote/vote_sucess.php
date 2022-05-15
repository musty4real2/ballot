<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>

<fieldset>
<p><img src="../images/added.gif" width="78" height="69" /><span style="font-size:18px; color:#F90;"><?php echo $_SESSION['name'];?> </span>Your Vote was Sucesssful and has been registered. Please leave the hall quitely</p>
</fieldset>
<?php 
$_SESSION['voted']=array();
?>
</body>
</html>