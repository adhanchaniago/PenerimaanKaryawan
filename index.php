<?php 
session_start();
include"koneksi.php";
include("class/FusionCharts_Gen.php");
?>
<!DOCTYPE html>
<html>
  <head>
	<title>SPK AHP - Seleksi Karyawan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
     <link rel="shortcut icon" href="favicon.gif" type="image/x-icon">
    <link type="text/css" href="css/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
  </head>
  <body>
 <div class="container">
	<div class="row-fluid">
		<img src="images/header.jpg" />
	</div>
		<div class="navbar-inner">
        <div class="navbar"> 
					<ul class="nav">   
						<li><a href="?menu=home"> Home</a></li>                     
                        <?php
                        if(isset($_SESSION['id_user'])){?>
                        <?php 
						$ceknilai=mysql_query("select * from tabel_nilai where id_user='$_SESSION[id_user]'");
						$jumlah=mysql_num_rows($ceknilai); 
						if($jumlah==0){
						?>
                        <li><a href="?menu=ujian">Ujian</a> </li>
                        <?php }?>
                        <li><a href="?menu=edit_data">Edit Data Karyawan</a></li>
						<li><a href="?menu=nilai">Nilai Test</a></li>
                       <li><a href="?menu=logout">Logout</a></li>
                       <?php } else { ?>
                        <li><a href="?menu=login"> Login</a></li>
                        <li><a href="?menu=daftar"> Daftar</a></li>
                        <li><a href="?menu=rangkingkaryawan"> Rangking Karyawan</a></li>    
                       <?php } ?>
					</ul>
                    </div>
				</div>
                 <?php $menu=$_GET["menu"]; 
		if ($menu==""){ include"welcome.php";}
		else if($menu=="ujian"){include"ujian.php";}
		else if($menu=="login"){include"login.php";}
		else if($menu=="home"){include "welcome.php";}
		else if($menu=="nilai"){include "nilai.php";}
		else if($menu=="edit_data"){include"edit_data.php";}
		else if($menu=="logout"){include"logout.php";}
		else if($menu=="daftar"){include"daftar.php";}
		else if($menu=="upload"){include"upload.php";}
		else if($menu=="jawaban"){include"jawaban.php";}
		else if($menu=="simpanskor"){include"simpan.php";}
		else if($menu=="rangkingkaryawan"){include"rangkingkaryawan.php";}
		else if($menu=="userpassword"){include"system/adminsystem/userpassword.php";}	?>
			<!--- Isi Content -->         
 		<div class="navbar-inner" style="color:#FFFFFF;" >
        </br> 
        <p align="center">
        <small>&copy; 2014 - SPK AHP Penerimaan Karyawan PG Kebon Agung </small> | <small>&reg; Chriestan Dwi Kurniawan</small></p>
        </div></div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/javascript">
		jQuery(function($){
		$.datepicker.regional['vi'] = {
			closeText: 'Tutup',
			prevText: 'Sebelum',
			nextText: 'Sesudah',
			currentText: 'Sekarang',
			monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
			'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
			'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
			dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&acute;at', 'Sabtu'],
			dayNamesShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sbt'],
			dayNamesMin: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb' ],
			dateFormat: 'dd/mm/yy',
			firstDay: 0,
			isRTL: false,
			showMonthAfterYear: false,
			changeMonth: true,
			changeYear: true,
			yearSuffix: ''};
		$.datepicker.setDefaults($.datepicker.regional['vi']);
	  	$(function(){
				$('#brothergiez').datepicker({
					inline: true
				});
	    });
       });
</script>
  </body>
</html>




