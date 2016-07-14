<?php
  session_start();
  include "../koneksi.php";

?>
<?php
  if(isset($_SESSION['username'])){
	   $username = $_SESSION['username'];
  }
  else{
  header('location:login.php'); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
	<title>SPK AHP - Seleksi Karyawan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link rel="shortcut icon" href="../favicon.gif" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css" type="text/css"/>
  </head>
  <body>
 <div class="container">
	<div class="row-fluid">
		<img src="../images/header.jpg" />
	</div>
        <div class="navbar-inner">
        <div class="navbar"> 
					<ul class="nav">
                   <li><a href="?menu=">Home</a></li>
            		<!--<li><a href="index.php?menu=lihat_hasil">Skor Karyawan</a></li>-->
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp; Data Utama &nbsp;<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                         <li><a href="index.php?menu=tahun">Tahun Seleksi Karyawan</a></li>
                        <li><a href="index.php?menu=daftarkaryawan">Data Calon Karyawan</a></li>
                         <li><a href="index.php?menu=kriteria">Kriteria</a></li>
                     </ul>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp; Perbandingan  &nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="index.php?menu=perbandingankriteria">Perbandingan Antar Kriteria</a></li>
			 			  <li><a href="index.php?menu=perbandinganalternatif">Perbandingan Antar Alternatif</a></li>
                        </ul>
                    </li>
                   <li><a href="index.php?menu=hasilakhir">Hasil Akhir</a></li>
                   <li><a href="index.php?menu=logout">Logout</a></li>
					</ul>
                    </div>
				</div>
                 
	 	<div class="row-fluid"><div class="isihalaman">
        <!-- END LOGIN FORM -->
        <?php $menu=$_GET["menu"]; 
		if ($menu==""){ include"welcome.php";}
		else if($menu=="daftarkaryawan"){include"daftarkaryawan.php";}
		else if($menu=="lihathasil"){include"lihat_hasil.php";}
		else if($menu=="perhitungankriteria"){include "per_kriteria.php";}
		else if($menu=="per_alternatif"){include "per_alternatif.php";}
		else if($menu=="logout"){include"logout.php";}
		else if($menu=="kriteria"){include"kriteria.php";}
		else if($menu=="editkriteria"){include"edit_kriteria.php";}
		else if($menu=="tambahkriteria"){include"tambah_kriteria.php";}
		else if($menu=="skor"){include"skor.php";}
		else if($menu=="inputperbandingankriteria"){include"input_perbandingankriteria.php";}
		else if($menu=="tahun"){include"tahun.php";}
		else if($menu=="tambahtahun"){include"tambah_tahun.php";}
		else if($menu=="edittahun"){include"edit_tahun.php";}
		else if($menu=="tampilskor"){include"tampil_skor.php";}
		else if($menu=="hasilakhir"){include"hasilakhir.php";}
		else if($menu=="detailperhitungan"){include"detailperhitungan.php";}
		else if($menu=="perbandingankriteria"){include"perbandingan_kriteria.php";}
		else if($menu=="perbandinganalternatif"){include"perbandingan_alternatif.php";}
		else if($menu=="userpassword"){include"system/adminsystem/userpassword.php";}	?>
     
			<!--- Isi Content -->
	</div></div>
	<div class="navbar-inner" style="color:#FFFFFF; font-size:12px;" >
        </br> 
        <p align="center">
        &copy; 2014  -  SPK AHP Penerimaan Karyawan PG Kebon Agung  | &reg; Chriestan Dwi Kurniawan</p>
        </div>
  </div>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap-dropdown.js"></script>
      <script language='javascript' src='../js/FusionCharts.js'></script>
  </body>
</html>




