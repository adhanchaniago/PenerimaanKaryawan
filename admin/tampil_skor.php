<blockquote><h3 class="text-success">Skor Penilaian</h3></blockquote>
<a href='?menu=daftarkaryawan'><input type='button' class='btn btn-primary' value='Kembali'/></a></br></p>
<?php
	$getid = $_GET["id"];
	  $sqlk="select * from tabel_kriteria order by id_kriteria asc";
	  $queryk=mysql_query($sqlk);
	 
	 $no=1;
	  echo"
	  <table class='table table-bordered table-striped'>
	  <tr>
	  <td  style='background-color:#fbcf61;'><strong>Nama Kriteria Penilaian</strong></td>
	  <td  style='background-color:#fbcf61;' width='20%'><strong>Skor</strong></td>
	  </tr>";
	  while($dk=mysql_fetch_array($queryk)){
	  $id_kriteria=$dk["id_kriteria"];
	  $kriteria=$dk["nama_kriteria"];
	  		$sqlskor="select * from tabel_skor where id_user='$getid' and id_kriteria='$id_kriteria'";
			$queryskor=mysql_query($sqlskor);
			while($dskor=mysql_fetch_array($queryskor)){
			echo"
			<tr>
				<td>
				<input type='hidden' name='urut[]' value='".$no++."'/>
				<input type='hidden' name='nip[]' value='$getidnip'/>
				<input type='hidden' name='idkrit[]' value='$kode_krit'/>
				Total Skor $kriteria</td>
				<td>$dskor[skor]</td>
			</tr>
			";
			}
	  }
	  echo"</table>";
?>					