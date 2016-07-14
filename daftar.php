<div class="isihalaman">
<h3 class="text-success">Daftar Karyawan PG Kebon Agung</h3><hr/>
        <form enctype="multipart/form-data" action="?menu=upload" method="post">
        <table class=" " border="0">
        <tr>
            <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Nama</p></font></td>
            <td><input type="text" name="nama" size="30" required="required"/></td>
        </tr>
        <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Jenis Kelamin</p></font></td>
                <td align="left" width="200">
                    <select style="padding:3px;" name="jk" width="250" required="required">
                      <option selected="selected">-Pilih-</option>
                      <option value="laki-laki">Laki-Laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>                </td>
                
        </tr>
		<form name="table_user" action="?page=daftar" method="post">
	  <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Tgl Lahir</p></font></td>
                <td>
                 <input type="date" placeholder="input tanggal" id="brothergiez" name="tgl" required="required"/></td>
                
                
                
     </tr>
	 </form>
     <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Alamat</p></font></td>
                <td>
                <?php 
				$qcekstatus=mysql_query("select * from tabel_tahun where status='1'");
				$dstatus = mysql_fetch_array($qcekstatus);
				$tahunaktif = $dstatus["nama_tahun"];
				?>
                <input type="hidden" name="tahun" value="<?php echo $tahunaktif ?>"/>
                  <textarea name="alamat" id="alamat" required="required"></textarea></td>
              </tr>
              <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>No Telp</p></font></td>
                <td>
                  <input type="text" name="tlp" id="tlp" /></td>
     </tr>
       <tr>
                 <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Pendidikan</p></font></td>
                <td>
                    <select style="padding:3px;" name="pend_terakhir" width="250" required="required">
                      <option selected="selected">-Pilih-</option>
                      <option value="SMK">SMK</option>
                      <option value="D3">D3</option>
					  <option value="S1">S1</option>
                    </select>                </td>
       </tr>
       <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Pengalaman</p></font></td>
                <td>
                    <select style="padding:3px;" name="pengalaman" width="250" required="required">
                      <option selected="selected">-Pilih-</option>
                      <option value="2 tahun">2 tahun</option>
                      <option value="3 tahun">3 tahun</option>
					  <option value="4 tahun">4 tahun</option>
					  <option value="5 tahun">5 tahun</option>
					  <option value="6 tahun">6 tahun</option>
                    </select>                </td>
      </tr>
        <tr>
            <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Username</p></font></td>
            <td><input type="text" name="username" size="30" required="required"/></td>
        </tr>
        
        <tr>
            <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Password</p></font></td>
            <td><input type="password" name="password" size="30" required="required"/></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td >&nbsp;</td>
        </tr>
         <tr>
            <td>&nbsp;</td>
            <td width="71%"><input name="submit" type="submit" value="Daftarkan Sekarang" class="btn btn-success"/>&nbsp;</td>
        </tr>
        </table>
        </form>
</div>

