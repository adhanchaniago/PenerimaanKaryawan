<div>
<?php
//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan keterangan
if (isset($_POST['submit']))
{
	include "koneksi.php";
	
	$nama=ucwords($_POST['nama']);
	$jk=$_POST['jk'];
	$tgl=$_POST['tgl'];
	$alamat=$_POST['alamat'];
	$tlp=$_POST['tlp'];
	$tahun = $_POST['tahun'];
	$pend_terakhir=$_POST['pend_terakhir'];
	$pengalaman=$_POST['pengalaman'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	
	//periksa jika data yang dimasukan belum lengkap
	if ($username=="" || $password=="")
	{
		//jika ada inputan yang kosong
		echo "<p>Data Anda belum lengkap</p>";
		
	}else{
		
			//catat data file yang berhasil di upload
			$upload=mysql_query("INSERT INTO tabel_user VALUES('','$nama','$jk','$tgl','$alamat','$tlp','$pend_terakhir','$pengalaman', $tahun,'$username','$password')");
			
			if($upload){
				//jika berhasil
				echo "<script>alert('Akun Berhasil Didaftarkan, Silahkan Login ');document.location.href='?menu=login';</script>";
			}else{
				echo "gagal simpan data";
			}
	}
	
}
else
{
	unset($_POST['submit']);
}
?>
</div>