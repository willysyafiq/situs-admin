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
		<td valign="top"><p class="judul">PENAMBAHAN MEMBER</p>
		<p>
		<?php
			
			$id_member=$_POST['idmember'];
			$nama=$_POST['nama'];
			$alamat=$_POST['alamat'];
			$katasandi=$_POST['katasandi'];
			$link=koneksi_db();
			$sql="insert into member value('$id_member','$nama','$alamat','$katasandi',null";
			$res=mysql_query($sql,$link);
			if($res){
				$id_member=mysql_insert_id($link);
			?>
				<div class="info">Data Member <b><?=$nama;?></b> Telah disimpan dengan id member <b><?=$id_member?></b></div>
				<?php
			}
			else {
			 ?>
			 	<div class="error"> Terjadi kesalahan dalam penyimpanan data member baru.Silakan ulangi. <br /></div>
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