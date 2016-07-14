<h3> Kriteria Karyawan</h3>
<div> <a class='btn btn-md btn-info'  href='?menu=tambahkriteria'>Tambah Data Kriteria</a></div><br />
<table id='example2' class='table table-bordered table-striped' cellspacing="0" align="center">
  <thead>
      <tr>
          <th>No</th>
          <th>Kode Kriteria</th>
          <th>Nama Kriteria</th>
         <th width="20%">Aksi</th>
      </tr>
  </thead>
  <tbody>
  <?php
  $no=1;
  $q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
  $jum = mysql_num_rows($q_tampil);
  if($jum==0){
	  echo"<tr><td colspan='5'><center><h3 class='text-error'> Data Kriteria Belum Terisi</h3><center></td></tr>";
  }
  else{
  while($data=mysql_fetch_array($q_tampil))
  {
      echo "<tr>
      <td>$no</td>
      <td>$data[id_kriteria]</td>
      <td>$data[nama_kriteria]</td>
      <td><center>
      <a href='?menu=kriteria&pro=hapus&id=$data[id_kriteria]' onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>
	  <span class='btn btn-danger' >  Hapus</span></a>
      <a class='btn btn-sm btn-warning'  href='?menu=editkriteria&id=$data[id_kriteria]'>Edit</a>
      </td></center>
      </tr>
      ";	
      $no++;
  	}
  }
  ?>
  </tbody>
  </table>

<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$idkas=$_GET["id"];
		$s="delete from tabel_kriteria where id_kriteria='$idkas' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=kriteria';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=kriteria';</script>";
		}
	}
?>