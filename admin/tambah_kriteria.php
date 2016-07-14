<?php
  $sql="select * from tabel_kriteria";
  $query=mysql_query($sql);
  $jumlah=mysql_num_rows($query);
  $urut = $jumlah + 1;
  	if($jumlah<10){$kodeauto="K0".$urut;}
	else if($jumlah>=10){$kodeauto="K".$urut;}
?>
<h3> Tambah Kriteria </h3><br />
<form role="form" method="post" action="" >
                  
              	<div class="form-group">
                <label for="kdkriteria">ID Kriteria</label>
            <input type="text" class="form-control" id="kode_krit" name="kode_krit" value="<?php echo $kodeauto ?>"  size="30" readonly="readonly"/>
              	</div><br />
               <div class="form-group">
               <label for="kriteria">Kriteria</label>
               <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Silahkan isi nama kriteria"  required/>
               </div>
               
              
               
               <div class="form-group"><br />
               </div>
               
              
                <button type="submit" class="btn btn-primary">Buat Kriteria</button>
      
                 </form>

<?php 	//menyimpan dan merubah data
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$kode_krit=$_POST["kode_krit"];
		$kriteria=$_POST["kriteria"];

			$sql="INSERT INTO tabel_kriteria SET
			id_kriteria = '$kode_krit',
            nama_kriteria = '$kriteria'";
			mysql_query($sql)
			or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
			echo "<script>alert('Data Berhasil Ditambahkan ');document.location.href='?menu=kriteria';</script>";
		}
?>