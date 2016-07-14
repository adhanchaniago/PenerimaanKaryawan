<blockquote><h3 class="text-success">Skor Penilaian</h3></blockquote>
<?php
	$getidnip = $_GET["id"];
	  $sqlk="select * from tabel_kriteria order by id_kriteria asc";
	  $queryk=mysql_query($sqlk);
	  		$qskor=mysql_query("select * from tabel_skor");
			$jumlah=mysql_num_rows($qskor);
			if ($jumlah==0){
				$no=1;
				}
			else{
				$no = $jumlah+1;
				}
	  echo"<form role='form' method='post' action=''><table border='0'>";
	  while($dk=mysql_fetch_array($queryk)){
	  $kode_krit=$dk["id_kriteria"];
	  $kriteria=$dk["nama_kriteria"];
	  echo"
	  <tr>
		  <td>
		  <input type='hidden' name='urut[]' value='".$no++."'/>
		  <input type='hidden' name='nip[]' value='$getidnip'/>
		  <input type='hidden' name='idkrit[]' value='$kode_krit'/>
		  <strong>Total Skor $kriteria </strong></td>
		  <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>";
		  ?>
          <?php
		  if($kriteria=="Tes / Ujian"){
			  $sskor="select * from tabel_nilai where id_user='$getidnip'";
	  		  $qskor=mysql_query($sskor);
			  $dskor=mysql_fetch_array($qskor);
			echo"
		  <td><input type='text' name='total[]' value='$dskor[point]' readonly/></td>";  
		  }
		  else{
		  echo"
		  <td><input type='text' name='total[]' value='' required/></td>";}
		  echo"</tr>
	  ";
	  }
	  echo"</table></br>";
	  echo"
	  <input type='submit' name='submit' id='submit' value='Simpan Skor' class='btn btn-success'/>
	  <a href='?menu=daftarkaryawan'> <button type='button' class='btn btn-primary'>Batal</button></a>
	  </form>";
?>					
<?php 	//menyimpan dan merubah data
	if(isset($_POST['submit'])){ 
    foreach($_POST['urut'] as $key => $urut){  
    $sql = "insert into tabel_skor (id_skor,id_kriteria,id_user,skor) values 
	('{$_POST['urut'][$key]}','{$_POST['idkrit'][$key]}','{$_POST['nip'][$key]}','{$_POST['total'][$key]}')";  
    mysql_query($sql)
	  or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Skor Berhasil Disimpan');document.location.href='?menu=tampilskor&id=$getidnip';</script>";  
    } 
	}
?>