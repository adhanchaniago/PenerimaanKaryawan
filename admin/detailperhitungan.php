<?php 
$getTahun=$_GET["tahun"];
$gettahun=$_GET["tahun"]; 
?>
<blockquote><h3 class="text-success">Detail Hasil Akhir Perhitungan</h3></blockquote>
<div><h2>Perbandingan Antar Kriteria</h2>
          <table id='example2' class='table table-bordered table-striped'  cellspacing="0" align="center"                                    	
            <tr>
              <?php
              
              $q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
              echo "<td>&nbsp;</td>";
              while($data=mysql_fetch_array($q_tampil))
              {
                  echo "<td>$data[id_kriteria]</td>";
              }
              
              echo "</tr>";
              $baris=0;
              $q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
              while($datarow=mysql_fetch_array($q_tampil))
              {
                  echo "<tr>
                  
                  <td> $datarow[id_kriteria]</td>
                  
                  ";	
                  $kolom=0;
                  $q_col=mysql_query("select * from tabel_kriteria order by id_kriteria");
              
              while($datacol=mysql_fetch_array($q_col))
              {
                  if($datacol['id_kriteria']<$datarow['id_kriteria'])
                  {
                      
                      $q_isi=mysql_query("select * from tabel_perbkrit where id_kriteria1='$datacol[id_kriteria]' and 
					id_kriteria2='$datarow[id_kriteria]' and tahun='$getTahun'");
              $dt=mysql_fetch_array($q_isi);
                      echo "<td>".number_format((1/$dt['nilai_perbandingan']),2)."</td>";
                      $jml_k[$kolom]+=(1/$dt['nilai_perbandingan']);
                      }
                  
                  else if($datacol['id_kriteria']==$datarow['id_kriteria'])
                  {
                      echo "<td>1</td>";
                      $jml_k[$kolom]+=1;
                      }
                  
                  else if($datacol['id_kriteria']>$datarow['id_kriteria'])
                  {
                      //echo "<td>c</td>";
                      $q_isi=mysql_query("select * from tabel_perbkrit where id_kriteria1='$datarow[id_kriteria]' and 
					  id_kriteria2='$datacol[id_kriteria]'  and tahun='$getTahun'");
              $dt=mysql_fetch_array($q_isi);
                      echo "<td>$dt[nilai_perbandingan]</td>";
                      $jml_k[$kolom]+=($dt['nilai_perbandingan']);
              //echo "$datacol[kode_kriteria]-$datarow[kode_kriteria]";
                  }
                  $kolom++;
              }
              
              $baris++;
              }
              echo "</tr>";
              echo "<tr><td>JUMLAH</td>";
              for($a=0; $a<count($jml_k);$a++)
              {
                  echo "<td><b>".number_format($jml_k[$a],2)."</b></td>";	
              }
              
              echo "</tr>";
              ?>
              </tbody>
              </table>
<!-- -->
<br>

<h2>Bobot Kriteria</h2>
                                    <table id='example2' class='table table-bordered  table-striped'  cellspacing="0" align="center">
                                        
                                        <tbody>
                                        <tr>
                                        
                                        <?php
										
										$q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
										echo "<td>&nbsp;</td>";
										while($data=mysql_fetch_array($q_tampil))
										{
											echo "<td>$data[id_kriteria]</td>";
										}
										
										echo "<td bgcolor='#E4CAFF'>JUMLAH</td></tr>";
										$baris=0;
										$q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
										while($datarow=mysql_fetch_array($q_tampil))
										{
											echo "<tr>
											
											<td> $datarow[id_kriteria]</td>
											
											";	
											$kolom=0;
											$q_col=mysql_query("select * from tabel_kriteria order by id_kriteria");
										
										while($datacol=mysql_fetch_array($q_col))
										{
											
										
											if($datacol['id_kriteria']<$datarow['id_kriteria'])
											{
												
												$q_isi=mysql_query("select * from tabel_perbkrit where id_kriteria1='$datacol[id_kriteria]' and id_kriteria2='$datarow[id_kriteria]' and tahun='$getTahun'");
										$dt=mysql_fetch_array($q_isi);
												echo "<td>".number_format((1/$dt['nilai_perbandingan'])/$jml_k[$kolom],2)."</td>";
												$jml_bobotk[$baris]+=((1/$dt['nilai_perbandingan'])/$jml_k[$kolom]);
												}
											
											else if($datacol['id_kriteria']==$datarow['id_kriteria'])
											{
												echo "<td>".number_format((1/$jml_k[$kolom]),2)."</td>";
												$jml_bobotk[$baris]+=(1/$jml_k[$kolom]);
												}
											
											else if($datacol['id_kriteria']>$datarow['id_kriteria'])
											{
												//echo "<td>c</td>";
												$q_isi=mysql_query("select * from tabel_perbkrit where id_kriteria1='$datarow[id_kriteria]' and id_kriteria2='$datacol[id_kriteria]' and tahun='$getTahun'");
										$dt=mysql_fetch_array($q_isi);
												echo "<td>".number_format(($dt['nilai_perbandingan']/$jml_k[$kolom]),2)."</td>";
												$jml_bobotk[$baris]+=($dt['nilai_perbandingan']/$jml_k[$kolom]);
										//echo "$datacol[kode_kriteria]-$datarow[kode_kriteria]";
											}
											$kolom++;
										}
										echo "<td>".number_format($jml_bobotk[$baris],2)."</td>";
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

<h2>Prioritas Kriteria</h2>
                                    <table id='example2' class='table table-bordered table-striped'  cellspacing="0" align="center">
                                        
                                        <tbody>
                                         <?php
										$no=0;
										$q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
										while($data=mysql_fetch_array($q_tampil))
										{
											
                                        echo "<tr>
                                        <td>$data[id_kriteria]</td>
										<td>$data[nama_kriteria]</td>
										<td>".number_format(($jml_bobotk[$no]/$baris),2)." </td>
										</tr>
										";
										$priokrit[$no]=($jml_bobotk[$no]/$baris);
										$no++;
                                         } ?>
                                           <tr><td colspan="3">Jumlah Kriteria = <?php echo $baris; ?></td></tr>
                                        </tbody>
                                        </table>
<center><h2>Perbandingan antar ALTERNATIF
</h2></center>
    <?php
$datake=0;
$q_krit=mysql_query("select * from tabel_kriteria order by id_kriteria");
while($data_krit=mysql_fetch_array($q_krit))
{
	echo "<center>$data_krit[nama_kriteria]</center>"; ?>
    <table id='example2' class='table table-bordered table-striped'  cellspacing="0" align="center">
        
        <tbody>                               
        <?php
        echo "<tr><td></td>";
        $q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
        while($data=mysql_fetch_array($q_tampil))
        {
            echo "<td>$data[username]</td>";
        }
        echo "</tr>";
        $q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
        while($datarow=mysql_fetch_array($q_tampil))
        {
            echo "<tr>
            <td>$datarow[username]</td>";	
            $kollom=0;
            
        $q_col=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
        while($datacol=mysql_fetch_array($q_col))
        {
            if($datacol['id_user']<$datarow['id_user'])
            {
		
				$qskor2=mysql_query("select * from tabel_skor where id_user='$datarow[id_user]' and id_kriteria='$data_krit[id_kriteria]'");
				$skorcol=mysql_fetch_array($qskor2);
				$qskor3=mysql_query("select * from tabel_skor where id_user='$datacol[id_user]' and id_kriteria='$data_krit[id_kriteria]'");
				$skorrow=mysql_fetch_array($qskor3);
				
								if($skorcol['skor'] > $skorrow['skor']){ $selisih = (($skorcol['skor'])-($skorrow['skor']));}
								else{ $selisih = (($skorrow['skor'])-($skorcol['skor'])); }
														
								if($selisih<=3){ $alternatif1 = 1; }
								else if($selisih>3 && $selisih<=5){ $alternatif1=2; }
								else if($selisih>5 && $selisih<=10){ $alternatif1=3; }
								else if($selisih>10 && $selisih<=15){ $alternatif1=4; }
								else if($selisih>15 && $selisih<=20){ $alternatif1=5; }
								else if($selisih>20 && $selisih<=30){ $alternatif1=6; }
								else if($selisih>30 && $selisih<=40){ $alternatif1=7; }
								else if($selisih>40 && $selisih<=50){ $alternatif1=8; }
								else if($selisih>50){ $alternatif1=9; }
		
			
								echo "<td>".number_format((1/$alternatif1),2)."</td>";
								$jml_alt[$kollom]+=(1/$alternatif1);
								}
							
							else if($datacol['id_user']==$datarow['id_user'])
							{
								echo "<td>1</td>";
								$jml_alt[$kollom]+=1;
								
								}
							else if($datacol['id_user']>$datarow['id_user'])
							{
												
						$qskor2=mysql_query("select * from tabel_skor where id_user='$datarow[id_user]' and id_kriteria='$data_krit[id_kriteria]'");
						$skormenurun=mysql_fetch_array($qskor2);
						$qskor1=mysql_query("select * from tabel_skor where id_user='$datacol[id_user]' and id_kriteria='$data_krit[id_kriteria]'");
						$skormendatar=mysql_fetch_array($qskor1);
						
						if($skormenurun['skor'] < $skormendatar['skor']){ 
						$selisih1 = (($skormendatar['skor'])-($skormenurun['skor']));
						}
						else{ $selisih1 = (($skormenurun['skor'])-($skormendatar['skor'])); }
						
						if($selisih1<=3){ $alternatif = 1; }
						else if($selisih1>3 && $selisih1<=5){ $alternatif=2; }
						else if($selisih1>5 && $selisih1<=10){ $alternatif=3; }
						else if($selisih1>10 && $selisih1<=15){ $alternatif=4; }
						else if($selisih1>15 && $selisih1<=20){ $alternatif=5; }
						else if($selisih1>20 && $selisih1<=30){ $alternatif=6; }
						else if($selisih1>30 && $selisih1<=40){ $alternatif=7; }
						else if($selisih1>40 && $selisih1<=50){ $alternatif=8; }
						else if($selisih1>50){ $alternatif=9; }		
		
									  echo "<td> $alternatif </td>";
									  $jml_alt[$kollom]+=($alternatif);
							  }
							  $kollom++;
						  }
						  echo "</tr>";
										
										
										
				  }
				  echo "<tr><td>JUMLAH</td>";
				  for($a=0; $a<count($jml_alt);$a++)
				  {
					  echo "<td>".number_format($jml_alt[$a],2)."</td>";	
					  $jumlah_alt[$datake][$a]=$jml_alt[$a];
					  $jml_alt[$a]=0;
				  }
				  
				  echo "</tr>";
				  ?>
				  </tbody>
				  </table><br>

<?php       
$datake++;                                 
}
?>



  <!-- -->      
       <br>
<br>
<center><h2>BOBOT ALTERNATIF
</h2></center>
   <?php
$datake=0;
$q_krit=mysql_query("select * from tabel_kriteria order by id_kriteria");
while($data_krit=mysql_fetch_array($q_krit))
{
	echo "<center>$data_krit[kriteria]</center>"; ?>
                                    <table id='example2' class='table table-bordered table-striped'  cellspacing="0" align="center">
                                        
                                        <tbody>
                                                                                
                                        <?php
										
										
										echo "<tr><td></td>";
										$q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
										while($data=mysql_fetch_array($q_tampil))
										{
											echo "<td>$data[username]</td>";
										}
										echo "<td>JUMLAH</td></tr>";
										$barris=0;
										$q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
										while($datarow=mysql_fetch_array($q_tampil))
										{
											echo "<tr>
											<td>$datarow[username]</td>";	
											$kollom=0;
											
											$q_col=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
										while($datacol=mysql_fetch_array($q_col))
										{
											
										
											if($datacol['id_user']<$datarow['id_user'])
											{
										
				$qskor2=mysql_query("select * from tabel_skor where id_user='$datarow[id_user]' and id_kriteria='$data_krit[id_kriteria]'");
				$skorcol=mysql_fetch_array($qskor2);
				$qskor3=mysql_query("select * from tabel_skor where id_user='$datacol[id_user]' and id_kriteria='$data_krit[id_kriteria]'");
				$skorrow=mysql_fetch_array($qskor3);
				
								if($skorcol['skor'] > $skorrow['skor']){ $selisih = (($skorcol['skor'])-($skorrow['skor']));}
								else{ $selisih = (($skorrow['skor'])-($skorcol['skor'])); }
														
								if($selisih<=3){ $alternatif1 = 1; }
								else if($selisih>3 && $selisih<=5){ $alternatif1=2; }
								else if($selisih>5 && $selisih<=10){ $alternatif1=3; }
								else if($selisih>10 && $selisih<=15){ $alternatif1=4; }
								else if($selisih>15 && $selisih<=20){ $alternatif1=5; }
								else if($selisih>20 && $selisih<=30){ $alternatif1=6; }
								else if($selisih>30 && $selisih<=40){ $alternatif1=7; }
								else if($selisih>40 && $selisih<=50){ $alternatif1=8; }
								else if($selisih>50){ $alternatif1=9; }
										
												echo "<td>".number_format((1/$alternatif1)/$jumlah_alt[$datake][$kollom],2)."</td>";
												$jml_bobalt[$datake][$barris]+=(1/$alternatif1)/$jumlah_alt[$datake][$kollom];
												
												}
											
											else if($datacol['id_user']==$datarow['id_user'])
											{
												echo "<td>".number_format((1/$jumlah_alt[$datake][$kollom]),2)."</td>";
												$jml_bobalt[$datake][$barris]+=1/$jumlah_alt[$datake][$kollom];
												
												}
											else if($datacol['id_user']>$datarow['id_user'])
											{
										
						$qskor2=mysql_query("select * from tabel_skor where id_user='$datarow[id_user]' and id_kriteria='$data_krit[id_kriteria]'");
						$skormenurun=mysql_fetch_array($qskor2);
						$qskor1=mysql_query("select * from tabel_skor where id_user='$datacol[id_user]' and id_kriteria='$data_krit[id_kriteria]'");
						$skormendatar=mysql_fetch_array($qskor1);
						
						if($skormenurun['skor'] < $skormendatar['skor']){ 
						$selisih1 = (($skormendatar['skor'])-($skormenurun['skor']));
						}
						else{ $selisih1 = (($skormenurun['skor'])-($skormendatar['skor'])); }
						
						if($selisih1<=3){ $alternatif = 1; }
						else if($selisih1>3 && $selisih1<=5){ $alternatif=2; }
						else if($selisih1>5 && $selisih1<=10){ $alternatif=3; }
						else if($selisih1>10 && $selisih1<=15){ $alternatif=4; }
						else if($selisih1>15 && $selisih1<=20){ $alternatif=5; }
						else if($selisih1>20 && $selisih1<=30){ $alternatif=6; }
						else if($selisih1>30 && $selisih1<=40){ $alternatif=7; }
						else if($selisih1>40 && $selisih1<=50){ $alternatif=8; }
						else if($selisih1>50){ $alternatif=9; }	
									
						$jml_bobalt[$datake][$barris]+=(($alternatif)/$jumlah_alt[$datake][$kollom]);
						echo "<td>".number_format(($alternatif/$jumlah_alt[$datake][$kollom]),2)."</td>";
							}
							$kollom++;
						}
						echo "<td>".number_format(($jml_bobalt[$datake][$barris]),2)."</td>";
						$barris++;
						
						}echo "</tr>";
						?>
                </tbody>
                </table><br>

<?php      
$datake++;                                  
}
?>





<center><h2>Prioritas Global</h2></center>
                                    <table id='example2' class='table table-bordered table-striped' cellspacing="0" align="center">
                                        
                                        <tbody>
                                        
                                         <tr><td></td><?php
										$no=0;
										$q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
										while($data=mysql_fetch_array($q_tampil))
										{
											
                                        echo "
										<td>
                                        $data[id_kriteria]</td>
										";
										$no++;
                                         } 
										 $q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
										$baris=0;;
										while($datarow=mysql_fetch_array($q_tampil))
										{
											echo "<tr>
											
											<td>$datarow[username]</td>
											
											";	
											
											$q_krit=mysql_query("select * from tabel_kriteria order by id_kriteria");
										$kolom=0;
										while($data_krit=mysql_fetch_array($q_krit))
										{
											echo "<td>".number_format(($jml_bobalt[$kolom][$baris]/$barris),2)."</td>";
											$priglo[$kolom][$baris]=($jml_bobalt[$kolom][$baris]/$barris);
										$kolom++;
										}
										$baris++;
										}
										 ?>
                                        </tr>
                                        <tr><td colspan="<?php echo ($kolom+1); ?>">Jumlah Alternatif = <?php echo $barris; 
										
										?></td></tr>
                                        </tbody>
                                        </table>
                                        
       <!-- -->    
<br>

<center><h2>Hasil Prioritas Global</h2></center>
                                    <table id='example2' class='table table-bordered table-striped'>
                                        
                                        <tbody>
                                        
                                         <tr><td></td><?php
										$no=0;
										$q_tampil=mysql_query("select * from tabel_kriteria order by id_kriteria");
										while($data=mysql_fetch_array($q_tampil))
										{
											
                                        echo "
										<td>
                                        $data[id_kriteria]</td>
										";
										$no++;
                                         } 
										 echo "
										<td>
                                        JUMLAH</td>
										";
										 $q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
										$baris=0;
										while($datarow=mysql_fetch_array($q_tampil))
										{
											echo "<tr>
											
											<td>$datarow[id_user]</td>
											
											";	
											
											$q_krit=mysql_query("select * from tabel_kriteria order by id_kriteria");
										$kolom=0;
										while($data_krit=mysql_fetch_array($q_krit))
										{
											//echo "<td>".number_format(($priglo[$kolom][$baris]*$priokrit[$kolom]),3)."- ".$priglo[$kolom][$baris]." x $priokrit[$kolom]</td>";
											echo "<td>".number_format(($priglo[$kolom][$baris]*$priokrit[$kolom]),4)."</td>";
											$hasil_ahp[$baris]+= number_format(($priglo[$kolom][$baris]*$priokrit[$kolom]),3);
										$kolom++;
										}
										echo "<td>$hasil_ahp[$baris]</td>";
										$baris++;
										}
										 ?>
                                        </tr>
                                        <tr><td colspan="<?php echo ($kolom+2); ?>">Jumlah Alternatif = <?php echo $barris; 
										
										?></td></tr>
                                        </tbody>
                                        </table>
                                        
       <!-- -->    
       
</div>          <!-- -->    
<h2>Hasil Akhir AHP</h2>
  <table class='table table-bordered '  cellspacing="0" align="center">
      <tr>
      <td>Nama Karyawan</td>
      <td>Nilai</td>
      </tr>
      <?php
	  $ceksimpan=mysql_query("select * from  tabel_prioglobal where tahun='$gettahun'");
	  $jumlahdatasimpan = mysql_num_rows($ceksimpan);
	  if($jumlahdatasimpan==0){ $urutan = 1; }
	  else{ $urutan = $jumlahdatasimpan+1; }
       $q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
      $baris=0;
	  echo"<form action='' method='post'>";
      //mysql_query("delete from tb_hasil");
      while($datarow=mysql_fetch_array($q_tampil))
      {
     echo "
	 <tr>
	 <td>
	 	 <input type='hidden' name='urutan[]' value='$urutan'>
	 	 <input type='hidden' name='username[]' value='$datarow[username]'>
		 <input type='hidden' name='iduser[]' value='$datarow[id_user]'>
		 <input type='hidden' name='hasil[]' value='$hasil_ahp[$baris]'>
		 <input type='hidden' name='tahunhasil[]' value='$gettahun'>
		 $datarow[username]
	 </td>
	 <td>$hasil_ahp[$baris]</td>
	 </tr>";
										
		//mysql_query("insert into tb_hasil values('$nomer','$datarow[id_user]','$hasil_ahp[$baris]','$getTahun')");
		$urutan++;
		$nomer++;
		$baris++;
      }
	  //echo"";
      ?>
      </table>
      <a href='?menu=hasilakhir&tahun=<?PHP echo $gettahun ?>'><input type='button' class='btn btn-primary' value='Kembali'/></a>
   <!-- -->   