<blockquote><h3 class="text-success"> Tahun Seleksi Karyawan</h3></blockquote>
<a href="?menu=tambahtahun"><input type="button" value="Tambah Tahun Seleksi" class="btn btn-success" /></a></br></p>
<table id='example2' class='table table-bordered table-striped' cellspacing="0" align="center">
  <thead>
      <tr style='background-color:#fbcf61;'>
          <th width="5%">No</th>
          <th>Tahun</th>
           <th>Status</th>
         <th width="25%"style="text-align:center;">Menu</th>
      </tr>
  </thead>
  <tbody>
  <?php
  $no=1;
  $q_tampil=mysql_query("select * from tabel_tahun order by id_tahun");
  while($data=mysql_fetch_array($q_tampil))
  {
	  if($data["status"] == 1){ $statusaaktif = "aktif"; }
	  else { $statusaaktif="Tidak Aktif"; }
      echo "<tr>
      <td>$no</td>
      <td>$data[nama_tahun]</td>
	   <td>$statusaaktif</td>
      <td><center>
	  <a class='btn btn-sm btn-warning'  href='?menu=edittahun&id=$data[id_tahun]'> Edit</a>
       <a href='?menu=tahun&pro=hapus&id=$data[id_tahun]' 
	   onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>
	  <span class='btn btn-danger' >  Hapus</span></a>
      </center></td>
      </tr>
      ";	
      $no++;
  }
  ?>
  </tbody>
  </table>

<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$idkas=$_GET["id"];
		$s="delete from tabel_tahun where id_tahun='$idkas' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=tahun';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=tahunpendidikan';</script>";
		}
	}
?>