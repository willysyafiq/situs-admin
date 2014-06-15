<?php
	include("lib_func.php");
	$username=$_POST['username'];
	$userpass=$_POST['userpass'];
	$link=koneksi_db();
	$sql="select * from admin where username='$username' and userpass=password('$userpass')";
	$res=mysql_query($sql,$link);
	if(mysql_num_rows($res)==1){ // Jika username dan userpass benar
		$data=mysql_fetch_array($res);
		session_start();
		session_register("username","nama","level");
		$_SESSION['username']=$data['username']; // isi variabel username
		$_SESSION['nama']=$data['nama']; // isi vareiabel nama
		$_SESSION['level']=$data['level']; // isi variabel level
		$_SESSION['sudahlogin']=true; // variabel status sudah login
		header("Location: index.php"); // pindah ke halaman index.php
	}else{
		header("Location: gagallogin.php"); // pindah ke halaman gagallogin.php
	}
?>