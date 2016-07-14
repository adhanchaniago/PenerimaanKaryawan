<?php $getTahun=$_GET["tahun"]; ?>
<blockquote><h3 class="text-success">Tabel Perbandingan Antar Alternatif</h3></blockquote>
<form name="tahun" class="form-search">
<p><strong>Pilih Tahun Seleksi</strong></p>
      <select name="cbTahun" onchange="location=document.tahun.cbTahun.options[document.tahun.cbTahun.selectedIndex].value">
      <?php
	  $gettahun=$_GET["tahun"];
	  $qtahun=mysql_query("select * from tabel_tahun order by id_tahun asc");
	  echo"<option value='?menu=perbandinganalternatif'>-- Pilih Tahun Seleksi --</option>";
	  while($d=mysql_fetch_array($qtahun)){
	  ?>
      <option value="?menu=perbandinganalternatif&tahun=<?php echo $d["nama_tahun"] ?>" 
	  <?php if($gettahun==$d["nama_tahun"]) echo "selected";?> >
      Seleksi Tahun <?php echo $d["nama_tahun"] ?></option>
      <?php 
	   } 
	  ?>
      </select>
</form>
<?php 
#===Periksa Ketersediaan Data =====
$cekdataperbandingan=mysql_query("select * from  tabel_perbkrit where tahun='$gettahun'");
$jumlahdataperbandingan = mysql_num_rows($cekdataperbandingan);
if($jumlahdataperbandingan==0){ 
?>
<div class="well"><center><h3 class="text-error"> Data belum Tersedia / Tahun Seleksi belum dipilih</h3>     
</div>
<?php } else{ ?>
<?php
echo "</br></p><h3>Tabel Perbandingan Antar Alternatif</h3><hr/>";
$datake=0;
$q_krit=mysql_query("select * from tabel_kriteria order by id_kriteria");
while($data_krit=mysql_fetch_array($q_krit))
{
	echo "<strong>$data_krit[nama_kriteria]</strong></p>"; ?>
    <table id='example2' class='table table-bordered'  cellspacing="0" align="center">
        
        <tbody>                               
        <?php
        echo "<tr><td bgcolor='#EEEEEE'></td>";
        $q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
        while($data=mysql_fetch_array($q_tampil))
        {
            echo "<td bgcolor='#EEEEEE'>$data[nama_user]</td>";
        }
        echo "</tr>";
        $q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
        while($datarow=mysql_fetch_array($q_tampil))
        {
            echo "<tr>
            <td  bgcolor='#EEEEEE'>$datarow[nama_user]</td>";	
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
								echo "<td bgcolor='#EFEFDE'>1</td>";
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
				  echo "<tr><td bgcolor='#FEFFD9'><strong>JUMLAH</strong></td>";
				  for($a=0; $a<count($jml_alt);$a++)
				  {
					  echo "<td bgcolor='#FEFFD9'><strong>".number_format($jml_alt[$a],2)."</strong></td>";	
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
<h3>Tabel Bobot Alternatif</h3>
<hr/>
   <?php
$datake=0;
$q_krit=mysql_query("select * from tabel_kriteria order by id_kriteria");
while($data_krit=mysql_fetch_array($q_krit))
{
	echo "<strong>$data_krit[nama_kriteria]</strong></p>"; ?>
                                    <table id='example2' class='table table-bordered'  cellspacing="0" align="center">
                                        
                                        <tbody>
                                                                                
                                        <?php
										
										
										echo "<tr><td bgcolor='#EEEEEE'></td>";
										$q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
										while($data=mysql_fetch_array($q_tampil))
										{
											echo "<td bgcolor='#EEEEEE'>$data[username]</td>";
										}
										echo "<td bgcolor='#EEEEEE'><strong>JUMLAH</strong></td></tr>";
										$barris=0;
										$q_tampil=mysql_query("select * from tabel_user where tahun='$gettahun' order by id_user");
										while($datarow=mysql_fetch_array($q_tampil))
										{
											echo "<tr>
											<td bgcolor='#EEEEEE'>$datarow[username]</td>";	
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
						echo "<td bgcolor='#FEFFD9'><strong>".number_format(($jml_bobalt[$datake][$barris]),2)."</strong></td>";
						$barris++;
						
						}echo "</tr>";
						?>
                </tbody>
                </table><br>

<?php      
$datake++;                                  
}
?>
<?php } ?>