<blockquote><h3 class="text-success">Input Perbandingan Antar Kriteria</h3></blockquote>
</br>
<?php
  $sql="select * from tabel_perbkrit";
  $query=mysql_query($sql);
  $jumlah=mysql_num_rows($query);
  $urut = $jumlah + 1;
  
		if($jumlah > 0){
			 $no = $urut;
		}
		else{
			 $no=1;
			}
	
?>
<form  method="post" action="" >
<table width="654" border="0" align="center">
<thead>
  <tr>
    <th height="38" align="left">Kriteria 1</th>
    <th align="center">Perbandingan</th>
    <th align="left">Kriteria 2</th>
  </tr>
    <tr>
        <th colspan="3"><hr/></th>
    </tr>
</thead>
<tbody>                                  
    <?php
	$queryk1=mysql_query("select * from tabel_kriteria");
	while($datakrit1=mysql_fetch_array($queryk1))
	{
		$queryk2=mysql_query("select * from tabel_kriteria");
		while($datakrit2=mysql_fetch_array($queryk2))
		{
			if($datakrit2['id_kriteria'] > $datakrit1['id_kriteria'])
			{
			?>
            <tr>
                <td><input type="hidden" value="<?php echo"".$no++.""; ?>" name="urut[]"/>
                <?php echo "$datakrit1[nama_kriteria]"; ?>
                <input name="kriteria_pembanding[]" type="hidden" value="<?php echo "$datakrit1[id_kriteria]"; ?>"  />
                </td>
                    <td>                             
                      <center>
                      <select name="bobot[]" id="bobot[]" required >
                      <option></option>
                        <option value="1" >Sama Penting (1)</option>
                        <option value="2" >Hampir Sedikit Lebih Penting (2)</option>
                        <option value="3" >Sedikit Lebih Penting (3)</option>
                        <option value="4" >Hampir Lebih Penting (4)</option>
                        <option value="5" >Lebih Penting (5)</option>
                        <option value="6" >Hampir Sangat Lebih Penting (6)</option>
                        <option value="7" >Sangat Lebih Penting (7)</option>
                        <option value="8" >Hampir Jauh Lebih Penting (8)</option>
                        <option value="9" >Jauh Lebih Penting (9)</option>
                      </select>
                      </center>
                     </td>
                <td>
                <?php echo "$datakrit2[nama_kriteria]"; ?>
                <input name="kriteria_ygdibanding[]" type="hidden" value="<?php echo "$datakrit2[id_kriteria]"; ?>" />
                <input name="tahun[]" type="hidden" value="<?php echo $_GET["tahun"] ?>" />
                </td>
			</tr>
            <?php
			}
		}
		echo "<tr ><td colspan=3></td></tr>";
	}
	?>
</tbody>
</table></br>
    <center><input type="submit" name="submit" id="submit" value="Simpan Perbandingan" class="btn btn-success span3" /> </center>
</form>

<?php 	//menyimpan dan merubah data
	if(isset($_POST['submit'])){ 
    foreach($_POST['urut'] as $key => $urut){  
    $sql = "insert into tabel_perbkrit (id_perbandingankriteria,id_kriteria1,id_kriteria2,nilai_perbandingan,tahun) values 
	('{$_POST['urut'][$key]}', '{$_POST['kriteria_pembanding'][$key]}', '{$_POST['kriteria_ygdibanding'][$key]}', '{$_POST['bobot'][$key]}', '{$_POST['tahun'][$key]}')";  
    mysql_query($sql)
	or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Bobot Berhasil Disimpan');
	  document.location.href='?menu=perbandingankriteria';</script>";  
    } 
	}
?>