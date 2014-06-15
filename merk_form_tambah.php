<?php
	session_start();
	if(($_SESSION['sudahlogin']==true)&&
	   ($_SESSION['username']!="")){
?>
<html>
<head>
<?php include("lib_func.php"); ?>
<title>Situs e-Order</title>
<link rel="SHORTCUT ICON" href="favicon.ico">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" align="center" border=0 bordercolor="#FFFFFF">
  <tr>
    <td colspan=2 align="center" bgcolor="#0000CC"><?php header_web();?></td>
  </tr>
  <tr>
    <td width="200px" valign="top" bgcolor="white"><?php menu();?></td>
    <td valign="top"><p class="judul">PENAMBAHAN MERK</p>
      <p> 
        
        <!-- Awal form penambahan data merk-->
        
      <form method=post action="merk_proses_tambah.php">
        <table align="center" bgcolor="white" border=0>
          <tr>
            <td colspan=2 align=center class="judultable"><b>TAMBAH MERK BARU</b></td>
          </tr>
          <tr>
            <td>Nama Merk</td>
            <td><input type=text name="namamerk" size=31 maxlength=30></td>
          </tr>
          <tr>
            <td></td>
            <td><input type=submit value="Simpan">
              <input type=reset></td>
          </tr>
        </table>
      </form>
      
      <!--Awal form penambahan data merk-->
      
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