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
		<form method=post action="member_proses_tambah.php">
		<table align="center" bgcolor="white" border="0">
			<tr>
				<td colspan=2 align=center class="judultable"><b>TAMBAH MEMBER BARU</b></td>
			</tr>
			<tr>
				<td>ID Member</td>
				<td><input type="text" name="idmember" size=31 maxlength="50" /></td>
			</tr>
			<tr>
				<td>Nama Member</td>
				<td><input type="text" name="nama" size=31 maxlength="50" /></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" size=31 maxlength="250" /></td>
			</tr>
			<tr>
				<td>Kata Sandi</td>
				<td><input type="text" name="katasandi" size=31 maxlength="50" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan" /><input type="reset" /></td>
			</tr>
		</table>
		</form>
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