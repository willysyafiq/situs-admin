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
    <td valign="top"><p class="judul">VIEW MERK</p>
      <p>
        <?php
	$link=koneksi_db();
	$sql="select * from merk order by nama";
	$res=mysql_query($sql,$link);
	$banyakrecord=mysql_num_rows($res);
	if($banyakrecord>0){
?>
      
      <div class="info"> Data Merk Ditemukan Sebanyak : <b>
        <?=$banyakrecord?>
        </b> Record </div>
      <table border="0" align="center">
        <tr class="judultable">
          <td colspan="3">DAFTAR MERK</td>
        </tr>
        <tr class="judultable">
          <td>ID MERK</td>
          <td>NAMA</td>
          <td>HAPUS</td>
        </tr>
        <?php
		$i=0;
		while($data=mysql_fetch_array($res)){
			$i++;
	?>
        <tr class="<?php if($i%2==1) 
		echo "isitabelganjil"; else 
		echo "isitabelgenap";?>">
          <td align="center"><?php echo $data['id_merk'];?></td>
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
      <div class="warning"> Data Merk Tidak Ditemukan!.</div>
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