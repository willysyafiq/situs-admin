<?php
	session_start();
	if(($_SESSION['sudahlogin']==true)&&
	   ($_SESSION['username']!="")){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
	include("lib_func.php");
?>
<title>Situs e-Order</title>
<link rel="SHORTCUT ICON" href="favicon.ico" />
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" align="center" border="0" bordercolor="#FFFFFF">
	<tr>
		<td colspan="2" align="center" bgcolor="#0000CC"><?php header_web(); ?></td>
	</tr>
	<tr>
		<td width="200px" valign="top" bgcolor="white"><?php menu(); ?></td>
		<td valign="top"><p class="judul">PENAMBAHAN KATEGORI</p>
		<p>
		<?php
			$nama=$_POST['namakategori'];
			$link=koneksi_db();
			$sql="insert into kategori value(null,'$nama','T')";
			$res=mysql_query($sql,$link);
			if($res){
				$id_kategori=mysql_insert_id($link);
			?>
				<div class="info">Data Kategori <b><?=$nama;?></b> Telah disimpan dengan id Kategori <b><?=$id_kategori?></b></div>
				<?php
			}
			else {
			 ?>
			 	<div class="error"> Terjadi kesalahan dalam penyimpanan data kategori baru.Silakan diulangi lagi. <br /></div>
				<?php
			}
			?>
				 
		</p>
		<p>&nbsp;</p></td>
	</tr>
	<tr>
		<td colspan=2 bgcolor="#FFCC00"><?php footer_web(); ?></td>
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