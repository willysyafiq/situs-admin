<html>
<head>
<title>Upload File</title>
<body>
<form name="f" enctype="multipart/form-data" method="POST" action="proses_file.php">
  <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
  File:
  <input name="userfile" type="file" />
  <input type="submit" value="Kirim File" name="tbl" />
</form>
</body>
</html>