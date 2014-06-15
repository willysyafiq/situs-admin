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
    <td valign="top"><p class="judul">PENAMBAHAN MERK</p>
      <p>
        <?php $nama=$_POST['namamerk']; //Ambil data dari Form 
$link=koneksi_db(); $sql="insert into merk values(null,'$nama','T')";// susunSQL
$res=mysql_query($sql,$link); 
//Eksekusi SQL 
if($res){ //Jika berhasil
$id_merk=mysql_insert_id($link); ?>
      
      <div class="info">Data Merk <b>
        <?=$nama;?>
        </b> telah disimpan dengan id merk <b>
        <?=$id_merk?>
        </b></div>
      <?php
	} else{ //Jika gagal
?>
      <div class="error"> Terjadi kesalahan dalam penyimpanan data merk baru. Silahkan diulang lagi.<br>
      </div>
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