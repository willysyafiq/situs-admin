<?php
	session_start();
	if(($_SESSION['sudahlogin']==true)&&
	   ($_SESSION['username']!="")){
?>
<html>
<head>
<?php 
include("lib_func.php");
?>
<title>Situs e-Order</title>
<link rel="SHORTCUT ICON" href="favicon.ico">
<link href="css.css" rel="stylesheet" type="text/css">
</head><body>
<table width="100%" align="center" border=0 bordercolor="#FFFFFF">
  <tr>
    <td colspan=2 align="center" bgcolor="#0000CC"><?php header_web();?></td>
  </tr>
  <tr>
    <td width="200px" valign="top" bgcolor="white"><?php menu();?></td>
    <td valign="top"><p class="judul">PENGEDITAN MERK</p>
      <p>
      
      <div align="center">
        <form method="post" action="merk_edit.php">
          ID Merk yang akan di edit
          <input type="text" name="id_merk" size=10 maxlength="10">
          <input type="submit" value="Edit">
        </form>
      </div>
      </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan=2 bgcolor="#FFCC00"><?php footer_web();?></td>
  </tr>
</table>
</body>
</html>
<?php
	   }
	   else {
		   header("Location: belumlogin.php");
	   }
?>