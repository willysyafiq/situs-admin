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
    <td valign="top"><p class="judul">DATA PRODUK</p>
      <?php
$link=koneksi_db();
$sql="SELECT p.id_produk,p.nama NamaProduk,
m.nama NamaMerk,k.nama NamaKategori,
p.harga,p.diskon,p.stok,p.filegambar,p.dijual
FROM produk p JOIN merk m ON p.id_merk=m.id_merk
JOIN kategori k ON p.id_kategori=k.id_kategori
ORDER BY p.nama";
$res=mysql_query($sql,$link) or die(mysql_error());
$banyakrecord=mysql_num_rows($res);
if($banyakrecord>0){
?>
      <div class="info">Data Produk ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
      <table border=0 align="center">
        <tr class="judultable">
          <td colspan=10>DAFTAR PRODUK</td>
        </tr>
        <tr class="judultable">
          <td>Gambar</td>
          <td>ID</td>
          <td>NAMA</td>
          <td>Merk</td>
          <td>Kategori</td>
          <td>Harga</td>
          <td>Stok</td>
          <td>Diskon</td>
          <td>Dijual</td>
          
        </tr>
        <?php
$i=0;
while($data=mysql_fetch_array($res)){
$i++;
?>
        <tr class="<?php if($i%2==1) echo "isitabelganjil";else echo "isitabelgenap";?>">
          <td align="center"><img src="../situs_admin/gambar/<?php echo $data['filegambar'];?>" width="70px" height="70px"></td>
          <td align="center"><?php echo $data['id_produk'];?></td>
          <td><?php echo $data['NamaProduk'];?></td>
          <td><?php echo $data['NamaMerk'];?></td>
          <td><?php echo $data['NamaKategori'];?></td>
          <td align="right"><?php echo number_format($data['harga'],0);?></td>
          <td align="right"><?php echo number_format($data['stok'],0);?></td>
          <td align="right"><?php echo number_format($data['diskon'],0);?>%</td>
          <td align="center"><?php echo $data['dijual'];?></td>
          
        </tr>
        <?php
}
?>
      </table>
      <?php
}
else{

?>
      <div class="warning">Data produk tidak ditemukan!.</div>
      <?php
}
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
