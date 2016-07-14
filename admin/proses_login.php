<?php
  session_start();
  require_once("../koneksi.php");   
  $username = $_POST['username'];
  $password = $_POST['password'];  
  $cekuser = mysql_query("SELECT * FROM admin WHERE username = '$username'");
  $jumlah = mysql_num_rows($cekuser);
  $hasil = mysql_fetch_array($cekuser);  
  if($jumlah == 0) {
		echo "User ID Belum Terdaftar!<br/>";
		echo "<a href=\"index.php\">&laquo; Back</a>";
	} else {
		if($password <> $hasil['password']) {
			echo "Password Salah!<br/>";
			echo "<a href=\"index.php\">&laquo; Back</a>";
		} else {
			$_SESSION['username'] = "$username";
			echo "<script>alert('Login Berhasil, Selamat Datang $username !');document.location.href='index.php';</script>";
		}	
	}
?>