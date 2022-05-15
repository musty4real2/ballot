<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="inc/ajaxupload.js"></script>

</head>

<body>
<div id="body">
<h1>Upload Picture</h1>
<?php

echo $_GET['name'];

echo "POSITION:".$_GET['position'];


?>










<form action="upload-file.php"  onSubmit="return disableForm(this);" method="post" enctype="multipart/form-data" >
  <table width="800" border="1">
  <input type="hidden" name="MAX_FILE_SIZE" value="100000000" /> 
    <tr>
      <td>Picture:</td>
      <td><label>
        <input name="picture" type="file" id="fileField" size="10" />
      </label>
      <input type="hidden" name="table" value="<?php echo $_GET['table'];?>" />
      <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button onClick="return disableForm(this),ajaxUpload(this.form,'wizecho_upload.php', '&lt;br&gt;Uploading image please wait.....&lt;br&gt;'); return false;">Upload</button></td>
    </tr>
  </table>
</form>

</nobr>
<div id="UPLOAD"></div>

</div>



</body>
</html>