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
<title>Tambah Produk</title>
<link rel="SHORTCUT ICON" href="favicon.ico">
<link href="css.css" rel="stylesheet" type="text/css">
</head><body>
<table width="100%" align="center" border=0 bordercolor="#FFFFFF">
  <tr>
    <td colspan=2 align="center" bgcolor="#0000CC"><?php header_web();?></td>
  </tr>
  <tr>
    <td width="200px" valign="top" bgcolor="white"><?php menu();?></td>
    <td valign="top"><p class="judul">TAMBAH PRODUK</p>
      <?php $link=koneksi_db(); ?>
      <form method="post" enctype="multipart/form-data" action="produk_proses_tambah.php">
        <table align="center" bgcolor="white" border=0>
          <tr>
            <td colspan=2 align=center class="judultable"><b>TAMBAH PRODUK</b></td>
          </tr>
          <tr>
            <td>Nama Produk</td>
            <td><input type=text name="namaproduk" size=50 maxlength=100></td>
          </tr>
          <tr>
            <td>Kategori</td>
            <td><select name="id_kategori">
                <option value="">Pilih Kategori</option>
                <?php
$res=mysql_query("SELECT id_kategori,nama FROM kategori
WHERE dihapus='T'
ORDER BY nama");
while($data=mysql_fetch_array($res)){
echo "<option value=\"".$data['id_kategori']."\">".$data['nama']." </option>";
}
?>
              </select></td>
          </tr>
          <tr>
            <td>Merk</td>
            <td><select name="id_merk">
                <option value="">Pilih Merk</option>
                <?php
$res=mysql_query("SELECT id_merk,nama FROM merk
ORDER BY nama");
while($data=mysql_fetch_array($res)){
echo "<option value=\"".$data['id_merk']."\">".$data['nama']." </option>";
}
?>
              </select></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td><input type=text name="harga" size=16 maxlength=15></td>
          </tr>
          <tr>
            <td>Berat</td>
            <td><input type=text name="berat" size=16 maxlength=15></td>
          </tr>
          <tr>
            <td>Diskon</td>
            <td><input type=text name="diskon" size=7 maxlength=6>
              %</td>
          </tr>
          <tr>
            <td>Stok</td>
            <td><input type=text name="stok" size=7 maxlength=6></td>
          </tr>
          <tr>
            <td>Deskripsi</td>
            <td><textarea name="deskripsi" cols="40" rows="5"></textarea></td>
          </tr>
          <tr>
            <td>File Gambar</td>
            <td><input type=file name="filegambar"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type=submit value="Simpan">
              <input type=reset></td>
          </tr>
        </table>
      </form>
      <p>&nbsp; </p></td>
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