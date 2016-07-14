<blockquote>
<?php
$gettahun = $_GET["tahun"]; 
if($_GET["tahun"]==""){ 
	echo "<h2 class='text-success'>Data Semua Calon Karyawan</h2>";
}
else{
	echo "<h2 class='text-success'>Data Calon Karyawan Tahun ".$_GET['tahun']."</h2>";
}
?>

</blockquote>
<form name="tahun" class="form-search">
<p><strong>Pilih Tahun Seleksi</strong></p>
      <select name="cbTahun" onchange="location=document.tahun.cbTahun.options[document.tahun.cbTahun.selectedIndex].value">
      <?php
	  $qtahun=mysql_query("select * from tabel_tahun order by id_tahun asc");
	  echo"<option value='?menu=daftarkaryawan'>-- Semua Calon Karyawan --</option>";
	  while($d=mysql_fetch_array($qtahun)){
	  ?>
      <option value="?menu=daftarkaryawan&tahun=<?php echo $d["nama_tahun"] ?>" 
	  <?php if($gettahun==$d["nama_tahun"]) echo "selected";?> >
      Calon Karyawan Tahun <?php echo $d["nama_tahun"] ?></option>
      <?php 
	   } 
	  ?>
      </select>
</form>
 <?php
  if($_GET["tahun"]==""){
	  $result = mysql_query("SELECT * FROM tabel_user order by id_user");
	  $jumlahdatakaryawan = mysql_num_rows($result);
	  }
  else{
	   $result = mysql_query("SELECT * FROM tabel_user where tahun='$gettahun'");
	   $jumlahdatakaryawan = mysql_num_rows($result);
  }
	  echo "<table class='table table-striped table-bordered'>
			<tr>
			<td style='background-color:#fbcf61;'><strong>Nama Pendaftar</strong></td>
			<td style='background-color:#fbcf61;'><strong>Jenis Kelamin</strong></td>
			<td style='background-color:#fbcf61;'><strong>Tgl Lahir</strong></td>
			<td style='background-color:#fbcf61;'><strong>Pendidikan</strong></td>
			<td style='background-color:#fbcf61;'><strong>No.Telp</strong></td>
			<td style='background-color:#fbcf61;'><strong>Pengalaman</strong></td>
			<td style='background-color:#fbcf61;'><strong>Menu</strong></td>
			</tr>";
					if($jumlahdatakaryawan!=0){
					while($row = mysql_fetch_array($result)){
					echo "<tr>";
					echo "<td>" . $row['nama_user'] . "</td>";
					echo "<td>" . $row['jk'] . "</td>";
					echo "<td>" . $row['tgl'] . "</td>";
					echo "<td>" . $row['pendidikan_terakhir'] . "</td>";
					echo "<td>" . $row['telepon'] . "</td>";
					echo "<td>" . $row['pengalaman'] . "</td>";

?>
<?php
$qskor=mysql_query("select * from tabel_skor where id_user='$row[id_user]'");
$jumlah=mysql_num_rows($qskor);
if($jumlah==0){
echo "<td><center><a href='?menu=skor&id=$row[id_user]'><input type='button' value='Isi Skor Karyawan' class='btn  btn-success'/></a></center></td>";
}
else{
echo "<td><center><a href='?menu=tampilskor&id=$row[id_user]'><input type='button' value='Lihat Skor Karyawan' class='btn  btn-primary'/></a></center></td>";
}
?>
<?php 
	}
}
else{ echo"<tr bgcolor='#F7F7F7'><td colspan='8'><center><h3 class='text-muted'>== Tidak ada karyawan terdaftar di tahun ini ==</h3></center></td>"; }
echo "</tr></table>";
?>