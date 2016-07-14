<?php
  $sql="select * from tabel_tahun";
  $query=mysql_query($sql);
  $jumlah=mysql_num_rows($query);
  $urut = $jumlah + 1;
  	if($jumlah<10){$kodeauto="t0".$urut;}
	else if($jumlah>=10){$kodeauto="t".$urut;}
?>
<blockquote><h3 class="text-success"> Tambah Tahun Seleksi Karyawan</h3></blockquote>
<form role="form" method="post" action="" >
                  
              	<div class="form-group">
            <input type="hidden" class="form-control" id="id_tahun" name="id_tahun" value="<?php echo $kodeauto ?>"  size="30" readonly="readonly"/>
              	</div>
               <div class="form-group">
               <label for="kriteria">Tahun Seleksi Karyawan</label>
               <br />
               <input type="text" class="form-control" id="nama_tahun" name="nama_tahun" placeholder="Isikan Tahun Seleksi"  required/>
               </div>
               
              
               
               <div class="form-group"><br />
               </div>
               
              
                <button type="submit" class="btn btn-success">Tambahkan Tahun</button>
      			 <a href="?menu=tahun"> <button type="button" class="btn btn-primary">Batal</button></a>
                 </form>

<?php 	//menyimpan dan merubah data
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$id_tahun=$_POST["id_tahun"];
		$nama_tahun=$_POST["nama_tahun"];

			$sql="INSERT INTO tabel_tahun SET
			id_tahun = '$id_tahun',
            nama_tahun = '$nama_tahun'";
			mysql_query($sql)
			or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
			echo "<script>alert('Data Berhasil Ditambahkan ');document.location.href='?menu=tahun';</script>";
		}
?>