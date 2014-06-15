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
</head>
<body>
<table width="100%" align="center" border=0 bordercolor="#FFFFFF">
  <tr>
    <td colspan=2 align="center" bgcolor="#0000CC"><?php header_web();?></td>
  </tr>
  <tr>
    <td width="200px" valign="top" bgcolor="white"><?php menu();?></td>
    <td valign="top"><p class="judul">PENGEDITAN MERK</p>
      <p>
        <?php 
	$id_merk=$_POST['id_merk']; 
	$nama=$_POST['nama']; 
	$dihapus=$_POST['dihapus']; 
	$link=koneksi_db(); 
	$sql="update merk set nama='$nama' , dihapus='$dihapus' 
		  where id_merk='$id_merk'"; 
	$res=mysql_query($sql); 
	if($res){ 
?>
      
      <div class="info">Data Merk dengan ID
        <?=$id_merk?>
        telah diupdate. </div>
      <?php 
	} 
else{ 
?>
      <div class="error"> Data merk dengan ID
        <?=$id_merk?>
        gagal di update,dengan pesan kesalahan <b>
        <?=mysql_error()?>
        </b>. </div>
      <?php
  	} 
?>
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