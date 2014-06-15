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
    <td valign="top"><p class="judul">PENGEDITAN MERK</p>
      <p>
        <?php 
	$id_merk=$_POST['id_merk']; 
	$link=koneksi_db(); 
	$sql=" select * from merk where id_merk='$id_merk'"; 
	$res=mysql_query($sql); 
	if(mysql_num_rows($res)==1)
		{ $data=mysql_fetch_array($res); 
?>
      
      <form method='post' action="merk_proses_update.php">
        <table align="center" bgcolor="white" border=0>
          <tr>
            <td colspan=2 align=center class="judultable"><b>EDIT MERK</b></td>
          </tr>
          <tr>
            <td>ID Merk</td>
            <td><input type=text name="id_merk" value="<?php echo $data['id_merk']?>"readonly></td>
          </tr>
          <tr>
            <td>Nama Merk</td>
            <td><input type=text name="nama" value="<?php echo $data['nama']?>" size=31maxlength=30></td>
          </tr>
          <tr>
            <td valign=top>Status Di hapus</td>
            <td><input type='radio' name="dihapus" value="Y" <?php if($data['dihapus']=="Y")echo"checked";?>>
              Ya <br>
              <input type=radio name="dihapus" value="T" <?php if($data['dihapus']=="T")echo"checked";?>>
              Tidak </td>
          </tr>
          <tr>
            <td></td>
            <td><input type=submit value="Update">
              <input type="button" onClick="javascript:history.back()"
     value="Batal"></td>
          </tr>
        </table>
      </form>
      <?php } else{ ?>
      <div class="warning">Data merk tidak ditemukan!.</div>
      <?php } ?>
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