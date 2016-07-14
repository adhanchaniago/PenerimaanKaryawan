<blockquote>
<h2 class="text-success">Tabel Perbandingan Antar Kriteria</h2>
</blockquote>
<form name="tahun" class="form-search">
<p><strong>Pilih Tahun Seleksi</strong></p>
      <select name="cbTahun" onchange="location=document.tahun.cbTahun.options[document.tahun.cbTahun.selectedIndex].value">
      <?php
	  $gettahun=$_GET["tahun"];
	  $qtahun=mysql_query("select * from tabel_tahun order by id_tahun asc");
	  echo"<option value='?menu=perbandingankriteria'>-- Pilih Tahun Seleksi --</option>";
	  while($d=mysql_fetch_array($qtahun)){
	  ?>
      <option value="?menu=perbandingankriteria&tahun=<?php echo $d["nama_tahun"] ?>" 
	  <?php if($gettahun==$d["nama_tahun"]) echo "selected";?> >
      Seleksi Tahun <?php echo $d["nama_tahun"] ?></option>
      <?php 
	   } 
	  ?>
      </select>
</form>
<?php 
$gettahun = $_GET["tahun"];
#===Periksa Ketersediaan Data =====
$cekdataperbandingan=mysql_query("select * from  tabel_perbkrit where tahun='$gettahun'");
$jumlahdataperbandingan = mysql_num_rows($cekdataperbandingan);
if($jumlahdataperbandingan==0){ 
?>
<div class="well"><center><h3 class="text-error"> Data belum Tersedia / Tahun Seleksi belum dipilih</h3>     
<a href='?menu=inputperbandingankriteria&tahun=<?php echo $gettahun ?>'>
<p class='btn btn-info'>Buat Perbandingan</p></a></div>
<?php } else{ ?>
<h2>Perbandingan Kriteria</h2>
              <table class='table table-bordered ' >                                       
              <tbody>
              <tr>            
					<?php
                    $qkriteria=mysql_query("select * from tabel_kriteria order by id_kriteria");
                    echo "<td width='8%' bgcolor='#EEEEEE'>&nbsp;</td>";
                    while($data=mysql_fetch_array($qkriteria))
                    {
                        echo "<td bgcolor='#EEEEEE'>$data[id_kriteria]</td>";
                    }
                    echo "</tr>";
                    $baris=0;
					
						$qkritmendatar=mysql_query("select * from tabel_kriteria order by id_kriteria");
						while($kritmendatar=mysql_fetch_array($qkritmendatar))
						{
							echo "<tr><td bgcolor='#EEEEEE'> $kritmendatar[id_kriteria]</td>";	
							$kolom=0;
								$qkritmenurun=mysql_query("select * from tabel_kriteria order by id_kriteria");
								while($kritmenurun=mysql_fetch_array($qkritmenurun))
								{
									if($kritmenurun['id_kriteria']<$kritmendatar['id_kriteria'])
									{
									$qperbandingan1=mysql_query("select * from  tabel_perbkrit where 
									id_kriteria1='$kritmenurun[id_kriteria]' and id_kriteria2='$kritmendatar[id_kriteria]' and tahun='$gettahun'");
										$dt=mysql_fetch_array($qperbandingan1);
										if($dt['nilai_perbandingan']==0){
										echo"<td> - </td>";
										}
										else{
										echo "<td>".number_format((1/$dt['nilai_perbandingan']),2)."</td>";
										$jml_k[$kolom]+=(1/$dt['nilai_perbandingan']);
										}
								  	}	
									else if($kritmenurun['id_kriteria']==$kritmendatar['id_kriteria'])
									  {
									  echo "<td bgcolor='#EFEFDE'>1</td>";
									  $jml_k[$kolom]+=1;
									  }
											
											else if($kritmenurun['id_kriteria']>$kritmendatar['id_kriteria'])
											{
												//echo "<td>c</td>";
												$q_isi=mysql_query("select * from tabel_perbkrit where id_kriteria1='$kritmendatar[id_kriteria]' and id_kriteria2='$kritmenurun[id_kriteria]' and tahun='$gettahun'");
										$dt=mysql_fetch_array($q_isi);
										if($dt['nilai_perbandingan']==0){
											echo"<td> - </td>";
										}
												else{
												echo "<td>$dt[nilai_perbandingan] </td>";
												$jml_k[$kolom]+=($dt['nilai_perbandingan']);
												}
										//echo "$kritmenurun[kode_kriteria]-$kritmendatar[kode_kriteria]";
											}
											$kolom++;
										}
										
										$baris++;
										}
										echo "</tr>";
										echo "<tr><td bgcolor='#EEEEEE'><strong>JUMLAH</strong></td>";
										for($a=0; $a<count($jml_k);$a++)
										{
											echo "<td  bgcolor='#FEFFD9'><strong>".number_format($jml_k[$a],2)."</strong></td>";	
										}
										
										echo "</tr>";
										?>
                                        </tbody>
                                        </table>
<!-- -->
<br>

<h2>Bobot Kriteria</h2>
                                    <table id='example2' class='table table-bordered  '  cellspacing="0" align="center">
                                        
                                        <tbody>
                                        <tr>
                                        
                                        <?php
										
										$q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
										echo "<td bgcolor='#EEEEEE'>&nbsp;</td>";
										while($data=mysql_fetch_array($q_tampil))
										{
											echo "<td bgcolor='#EEEEEE'>$data[id_kriteria]</td>";
										}
										
										echo "<td bgcolor='#EEEEEE'><strong>JUMLAH</strong></td></tr>";
										$baris=0;
										$q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
										while($kritmendatar=mysql_fetch_array($q_tampil))
										{
											echo "<tr>
											
											<td bgcolor='#EEEEEE'> $kritmendatar[id_kriteria]</td>
											
											";	
											$kolom=0;
											$q_col=mysql_query("select * from tabel_kriteria order by id_kriteria");
										
										while($kritmenurun=mysql_fetch_array($q_col))
										{
											
										
											if($kritmenurun['id_kriteria']<$kritmendatar['id_kriteria'])
											{
												
												$q_isi=mysql_query("select * from tabel_perbkrit where id_kriteria1='$kritmenurun[id_kriteria]' and id_kriteria2='$kritmendatar[id_kriteria]' and tahun='$gettahun'");
										$dt=mysql_fetch_array($q_isi);
										if($dt['nilai_perbandingan']==0){
											echo"<td> - </td>";
										}
												else{
												echo "<td>".number_format((1/$dt['nilai_perbandingan'])/$jml_k[$kolom],2)."</td>";
												$jml_bobotk[$baris]+=((1/$dt['nilai_perbandingan'])/$jml_k[$kolom]);
												}
												}
											
											else if($kritmenurun['id_kriteria']==$kritmendatar['id_kriteria'])
											{
												echo "<td>".number_format((1/$jml_k[$kolom]),2)."</td>";
												$jml_bobotk[$baris]+=(1/$jml_k[$kolom]);
												}
											
											else if($kritmenurun['id_kriteria']>$kritmendatar['id_kriteria'])
											{
												//echo "<td>c</td>";
												$q_isi=mysql_query("select * from tabel_perbkrit where id_kriteria1='$kritmendatar[id_kriteria]' and id_kriteria2='$kritmenurun[id_kriteria]' and tahun='$gettahun' ");
										$dt=mysql_fetch_array($q_isi);
										if($dt['nilai_perbandingan']==0){
											echo"<td> - </td>";
										}
												else{
												echo "<td>".number_format(($dt['nilai_perbandingan']/$jml_k[$kolom]),2)."</td>";
												$jml_bobotk[$baris]+=($dt['nilai_perbandingan']/$jml_k[$kolom]);
										//echo "$kritmenurun[kode_kriteria]-$kritmendatar[kode_kriteria]";
												}
											}
											$kolom++;
										}
										echo "<td  bgcolor='#FEFFD9'><strong>".number_format($jml_bobotk[$baris],2)."</strong></td>";
										$baris++;
										}
										echo "</tr>";
										/*
										echo "<tr><td></td>";
										for($a=0; $a<count($jml_bobotk);$a++)
										{
											echo "<td>".number_format($jml_bobotk[$a],2)."</td>";	
										}
										
										echo "</tr>";
										*/
										?>
                                        </tbody>
                                        </table>
<!-- -->

<br>
<?php 
if($gettahun==""){ $status = "style='display:none;'"; }
else{ $status = "&nbsp;"; } 
?>
<div <?php echo $status ?>>
<h2>Prioritas Kriteria</h2>
                                    <table id='example2' class='table table-bordered'  cellspacing="0" align="center">
                                    <tr>
                                    <td bgcolor='#EEEEEE'> Nama Kriteria </td>
                                    <td bgcolor='#EEEEEE' width="20%"> Nilai Prioritas Kriteria</td>
                                    </tr>    
                                        <tbody>
                                         <?php
										$no=0;
										$q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
										while($data=mysql_fetch_array($q_tampil))
										{
											
                                        echo "<tr>
										<td>$data[nama_kriteria] ( $data[id_kriteria] )</td>
										<td  bgcolor='#FEFFD9'><strong>".number_format(($jml_bobotk[$no]/$baris),2)."</strong></td>
										</tr>
										";
										$priokrit[$no]=($jml_bobotk[$no]/$baris);
										$no++;
                                         } ?>
                                        </tbody>
                                        </table>
                                        <?php } ?>