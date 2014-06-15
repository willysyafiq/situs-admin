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
    <td valign="top"><p class="judul">PROSES TAMBAH PRODUK</p>
      <?php
if($_FILES['filegambar']['error']==0){
$link=koneksi_db();
$nama=addslashes($_POST['namaproduk']);
$id_merk=$_POST['id_merk'];
$id_kategori=$_POST['id_kategori'];
$harga=$_POST['harga'];
$berat=$_POST['berat'];
$diskon=$_POST['diskon'];
$stok=$_POST['stok'];
$deskripsi=$_POST['deskripsi'];
$filegambar=$_FILES['filegambar']['name'];
$namafilebaru="gambar/".$filegambar;
if(move_uploaded_file($_FILES['filegambar']['tmp_name'],
$namafilebaru)==true){
$sql="INSERT INTO produk
VALUES(
null,
'$id_kategori',
'$id_merk',
'$nama',
'$harga',
'$berat',
'$diskon',
'$stok',
'Y',
'$deskripsi',
'$filegambar',
'T')";
$res=mysql_query($sql);
if($res){
$id_produk=mysql_insert_id($link);
echo "Data produk baru telah disimpan dengan ID $id_produk";
}
else{
echo "Data produk baru gagal disimpan dengan kesalahan ".mysql_error();
}
}
}
else
echo "Penambahan produk gagal karena upload file gambar gagal";
?>
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