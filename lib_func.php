<?php function header_web() {
?>

<font color="white" size=6> Situs Administrator</font>
<?php
}

function footer_web() {
?>
<center>
  <small> Developed by mahasiswa IF - [10111375] Willy Ahmad Syafiq</small>
</center>
<?php
}

function form_login() {
?>
<form method=post action="login.php">
  <table boder=0 width="100%" bgcolor="white" align="center">
    <tr>
      <td colspan=2 align="center"bgcolor="#CCCCCC"><b>LOGIN USER</b></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" name="username" maxlength="8" size="9"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="userpass" maxlength="8" size="9"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="btn_submit" value="Login"></td>
    </tr>
  </table>
</form>
<?php
}
function menu_admin(){ ?>
<table border=0 width="100%" bgcolor="white">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><b>MENU ADMIN</b></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFCC00" height=2></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFCC00"><b>DATA MERK</b></td>
  </tr>
  <tr>
    <td align="center"><a href="merk_form_tambah.php">Tambah</a></td>
  </tr>
  <tr>
    <td align="center"><a href="merk_form_edit.php">Edit</a></td>
  </tr>
  <tr>
    <td align="center"><a href="merk_form_hapus.php">Hapus</a></td>
  </tr>
  <tr>
    <td align="center"><a href="merk_view.php">View</a></td>
  </tr>
  <tr>
    <td align="center"><a href="merk_pencarian.php">Pencarian</a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFCC00" height=2></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFCC00"><b>DATA KATEGORI</b></td>
  </tr>
  <tr>
    <td align="center"><a href="kategori_form_tambah.php">Tambah</a></td>
  </tr>
  <tr>
    <td align="center"><a href="kategori_form_edit.php">Edit</a></td>
  </tr>
  <tr>
    <td align="center"><a href="kategori_form_hapus.php">Hapus</a></td>
  </tr>
  <tr>
    <td align="center"><a href="kategori_view.php">View</a></td>
  </tr>
  <tr>
    <td align="center"><a href="kategori_pencarian.php">Pencarian</a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFCC00"><b>DATA PRODUK</b></td>
  </tr>
  <tr>
    <td align="center"><a href="produk_form_tambah.php">Tambah</a></td>
  </tr>
  <tr>
    <td align="center"><a href="produk_form_edit.php">Edit</a></td>
  </tr>
  <tr>
    <td align="center"><a href="produk_form_hapus.php">Hapus</a></td>
  </tr>
  <tr>
    <td align="center"><a href="produk_view.php">View</a></td>
  </tr>
  <tr>
    <td align="center"><a href="produk_pencarian.php">Pencarian</a></td>
  </tr>

  <?php
      if(($_SESSION['level']=="SUPERADMIN")){
        echo "<td align='center' bgcolor='#FFCC00'><b>SUPER ADMIN</b></td>";
        echo "<tr><td align='center' bgcolor='#FFCC00' height=2></td></tr>";
        echo "<tr><td align='center'><a href='#'>Tambah</a></td></tr>";
        echo "<tr><td align='center'><a href='#'>Edit</a></td></tr>";
        echo "<tr><td align='center'><a href='#'>Delete</a></td></tr>";
        echo "<tr><td align='center'><a href='#'>View</a></td></tr>";
      }
    ?>
    <?php
      if(($_SESSION['level']=="ADMIN"))
      {
        echo "<td align='center' bgcolor='#FFCC00'><b>DATA MEMBER</b></td>";
        echo "<tr><td align='center'><a href=>View Member</a></td></tr>";
        echo "<td align='center' bgcolor='#FFCC00'><b>DATA ADMIN</b></td>";
        echo "<tr><td align='center'><a href=>View Admin</a></td></tr>";
      }
    ?>


<!-- bagian data member           
    <tr>
      <td align="center" bgcolor="#FFCC00" height=2></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#FFCC00"><b>DATA MEMBER</b></td>
    </tr>
    <tr>
        <td align="center"><a href="member_view.php">View</a></td>
    </tr>
    <tr>
        <td align="center"><a href="member_form_tambah.php">Tambah</a></td>
    </tr>
 
 bagian data member-->                

  
  <tr>
    <td align="center" bgcolor="#FFCC00" height=2></td>
  </tr>
  <tr>
    <td align="center"><a href="logout.php">LOGOUT</a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFCC00" height=2></td>
  </tr>
  
</table>
</form>
<?php }


function menu(){ 
 $telahlogin=@$_SESSION['sudahlogin']; //Nanti diisi perintah pemeriksaan status login
 if($telahlogin==false) 
 		form_login(); 
 else 
		menu_admin(); 
 } 
 
function koneksi_db(){ $host="localhost"; 
 			  $database="dbeorder_10111375"; 
			  $user="root"; 
			  $password=""; 
$link=mysql_connect($host,$user,$password); 
mysql_select_db($database,$link);
  if(!$link) echo "Error:".mysql_error(); return $link; 
  } 
?>
