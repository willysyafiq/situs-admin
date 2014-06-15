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
		<td valign="top"><p class="judul">PENGHAPUSAN PRODUK</p>
		<p>
        <?php
			$id_produk=$_POST['id_produk'];
			$link=koneksi_db();
			$sql="select * from produk where id_produk='$id_produk'";
			$res=mysql_query($sql);
			if(mysql_num_rows($res)==1){
				$data=mysql_fetch_array($res);
			?>
            	<form method="post" action="produk_proses_hapus.php">
                <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']?>" />
                <table align="center" bgcolor="white" border="0">
                	<tr>
                    	<td colspan="2" align="center" class="judultable"><b>HAPUS KATEGORI</b></td>
                    </tr>
                    <tr>
                    	<td>ID Produk</td>
                        <td><b><?php echo $data['id_produk']?></b></td>
                    </tr>
                    <tr>
                    	<td>Nama Produk</td>
                        <td><b><?php echo $data['nama']?></b></td>
                    </tr>
                    <tr>
                    	<td>Status Hapus</td>
                        <td><b><?php echo $data['dihapus']?></b></td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td><input type="submit" value="Hapus" />
                        	<input type="button" onclick="javascript:history.back()" value="Batal" /></td>
                    </tr>
                </table>
        	    </form>
        	<?php
		}
        else {
			?>
            <div class="warning">Data Kategori yang akan diedit tiket ditemukan!.</div>
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