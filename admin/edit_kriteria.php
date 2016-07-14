<?php
$getnip = $_GET["id"];
$sql="select * from tabel_kriteria where id_kriteria='$getnip' ";
  $q=mysql_query($sql);
  $d=mysql_fetch_array($q);
  $kode_krit=$d["id_kriteria"];
  $nama_krit=$d["nama_kriteria"];
?>
<h3> Edit Kriteria </h3><br />
<form role="form" method="post" action="" >
              	<div class="form-group">
                <label for="kdkriteria">Kode Kriteria</label>
                <br />
            <input type="text" class="form-control" id="kode_krit" name="kode_krit" value="<?php echo $kode_krit ?>"  size="30" readonly="readonly"/>
              	</div>
               <div class="form-group">
               <label for="kriteria">Kriteria</label>
               <br />
               <input type="text" class="form-control" id="kriteria" name="kriteria" value="<?php echo $nama_krit ?>"/>
               </div>
               
              
               
               <div class="form-group"><br />
               </div>
               
              
                <button type="submit" class="btn btn-primary">Ubah Kriteria</button>
      <a href="?menu=kriteria"> <button type="button" class="btn btn-default">Batal</button></a>
                 </form>

<?php 	//menyimpan dan merubah data
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$kode_krit=$_POST["kode_krit"];
		$kriteria=$_POST["kriteria"];

			$sql="UPDATE tabel_kriteria SET
			nama_kriteria = '$kriteria' WHERE id_kriteria = '$kode_krit'";
			mysql_query($sql)
			or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
			echo "<script>alert('Data Berhasil Diubah ');document.location.href='?menu=kriteria';</script>";
		}
?>