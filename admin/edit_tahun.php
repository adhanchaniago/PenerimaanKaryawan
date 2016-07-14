<div class="content">
<?php
  $getID = $_GET["id"];
  $sql="select * from tabel_tahun where id_tahun='$getID' ";
  $q=mysql_query($sql);
  $d=mysql_fetch_array($q);
  $id_kompetisi=$d["id_tahun"];
  $nama_kompetisi=$d["nama_tahun"];
  $status=$d["status"];
?>
  <h3>Ubah Tahun Penilaian</h3></br>
  <form class="form-horizontal" role="form" method="POST" action="">
      
            <input name="id_kompetisi" type="hidden" value="<?php echo $id_kompetisi ?>" class="form-control" readonly="readonly">
            <div class="form-group">
        Status Tahun Penilaian</br>
          <select name="status"  class="form-control">
          <option value="0" <?php if($status==0) echo "selected";?>> Non Aktif </option>
          <option value="1" <?php if($status==1) echo "selected";?>> Aktif </option>
            </select>
            </div></p></br>
        <div class="form-group">
        Tahun Penilaian</br>
            <div class="col-md-4">
            <input name="nama_kompetisi" type="text" value="<?php echo $nama_kompetisi ?>" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">
                <button type="submit" class="btn btn-info">Ubah</button>
                <a href="?menu=tahun"><button type="button" class="btn btn-primary">Batal</button></a>
              </div>
    </fieldset>
  </form>
 
<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_kompetisi = $_POST['id_kompetisi'];
	$nama_kompetisi = $_POST['nama_kompetisi'];
	$statuskomp = $_POST['status'];
	$qcekstatus=mysql_query("select * from tabel_tahun where status='1' and id_tahun!='$getID'");
	$jumlahstat = mysql_num_rows($qcekstatus);
	if($jumlahstat==0){

      $sqlsimpan = "UPDATE tabel_tahun SET
                    id_tahun = '$id_kompetisi',
                    nama_tahun = '$nama_kompetisi',
					status = '$statuskomp'
					WHERE  id_tahun = '$getID'";
      mysql_query($sqlsimpan)
       or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Data Berhasil Diubah ');document.location.href='?menu=tahun';</script>";
	}
	else { echo "<script>alert('Tahun Lain Masih Aktif , Nonaktifkan Dulu Tahun yang aktif saat ini');document.location.href='?menu=tahun';</script>"; }
  }
?>

</div>