<div class="isihalaman">
<blockquote><h3 class="text-success"> Rangking Karyawan </h3></blockquote> 
<div style="size:20%;"><center>
<script language='javascript' src='js/FusionCharts.js'></script>
<?php
  # Include FusionCharts PHP Class
  # Create object for Column 3D chart
  $FC = new FusionCharts("Column2D","800","400");

  # Setting Relative Path of chart swf file.
  $FC->setSwfPath("Charts/");

  # Store chart attributes in a variable
  $strParam="caption= Grafik Rangking Karyawan PG Kebon Agung ; xAxisName=Nama Calon ;yAxisName=Hasil;decimalPrecision=6; formatNumberScale=100;";

  # Set chart attributes
  $FC->setChartParams($strParam);
  
  $kategori = mysql_query("SELECT tabel_prioglobal.id_user,tabel_prioglobal.nilai,tabel_user.nama_user FROM tabel_prioglobal,tabel_user where tabel_user.id_user=tabel_prioglobal.id_user;");
while ($r_kat = mysql_fetch_array($kategori)){
	
	$id_kat = $r_kat['nama_user'];
	//$kat = $r_kat['Kategori'];
	$total=$r_kat['nilai'];
 

  # add chart values and category names
  $FC->addChartData("$total","name=$id_kat");
 
}
    # Render Chart
    $FC->renderChart();
  ?>                                
</center></div>
                                    <table id='example2' class='table table-bordered table-hover table-striped' cellspacing="0" align="center">
                                        <thead>
                                            <tr>
                                                <th>Rangking</th>
                                                <th>Nama Karyawan</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
										$no=1;
										$q_tampil=mysql_query("select * from tabel_prioglobal order by nilai desc");
										while($data=mysql_fetch_array($q_tampil))
										{
											$tampildetail = mysql_query("select * from tabel_user where id_user ='$data[id_user]'");
											$d=mysql_fetch_array($tampildetail);
											$nama = $d['nama_user'];
											$alamat = $d['alamat'];
											echo "<tr>
											<td>$no. Skor = $data[nilai]</td>
											<td>$nama</td>
											<td>$alamat</td>
											</td></tr>
											";
											$no++;
										}
										?>
                                        </tbody>
                                        </table>                                  
                                        
</div>