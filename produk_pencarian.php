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
		<td valign="top"><p class="judul">PENCARIAN PRODUK</p>
		<div align="center">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			PENCARIAN
			<select name="fieldcari">
				<option value="id_produk" <?php if(isset($_POST['tblcari'])) if($_POST['fieldcari']=="id_produk") echo "selected";?>>ID Produk</option>
				<option value="nama" <?php if(isset($_POST['tblcari'])) if($_POST['fieldcari']=="nama") echo "selected";?>>Nama Produk</option> 
			</select>
		<input type="text" name="keyword" size="10" maxlength="30" values="<?php if(isset($_POST['tblcari'])) echo $_POST['keyword'];?>" />
		<input type="submit" name="tblcari" value="Cari" name="tblcari"/>
		</form>
		</div>
		<p>
		<?php
			$link=koneksi_db();
			$sql="select * from produk";
			if(isset($_POST['tblcari']))
			{
			$fieldcari=$_POST['fieldcari'];
			$keyword=$_POST['keyword'];
			$sql=$sql." where $fieldcari like '%$keyword%' ";
			$sql.=" order by nama";
			}
			$res=mysql_query($sql,$link);
			$banyakrecord=mysql_num_rows($res);
			if($banyakrecord>0){
				?>
				<div class="info">Data Kategori ditemukan sebanyak : <b><?=$banyakrecord?></b> Record</div>
				<table border="0" align="center">
				<tr class="judultable"><td colspan="3">DAFTAR PRODUK</td></tr>
				<tr class="judultable"><td>ID PRODUK</td><td>NAMA</td><td>DIHAPUS</td></tr>
				<?php
					$i=0;
					while($data=mysql_fetch_array($res)){
						$i++;
						?>
						<tr class="<?php if($i%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
							<td align="center"><?php echo $data['id_produk'];?></td>
							<td><?php echo $data['nama'];?></td>
							<td align="center"><?php echo $data['dihapus'];?></td>
						</tr>
						<?php
					}
				?>
				</table>
				<?php
			}
			else {
				?>
				<div class="warning">Data Kategori tidak ditemukan!.</div>
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