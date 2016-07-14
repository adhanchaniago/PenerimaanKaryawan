<div class="isihalaman">
<?php 
$qdata=mysql_query("select * from tabel_user where id_user='$_SESSION[id_user]'");
$datakaryawan = mysql_fetch_array($qdata);
$namakary = $datakaryawan['nama_user'];
$jenkel = $datakaryawan['jk'];
$ttl = $datakaryawan['tgl'];
$alamat = $datakaryawan['alamat'];
$notel = $datakaryawan['telepon'];
$pendidikan = $datakaryawan['pendidikan_terakhir'];
$pengalaman = $datakaryawan['pengalaman'];
$username = $datakaryawan['username'];
$password =$datakaryawan['password'];
?>

<h3 class="text-success">Edit Data Karyawan</h3><hr/>
        <form action="" method="post">
        <table class=" " border="0">
        <tr>
            <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Nama</p></font></td>
            <td><input type="text" name="nama" size="30" value="<?php echo $namakary ?>" required="required"/></td>
        </tr>
        <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Jenis Kelamin</p></font></td>
                <td align="left" width="200">
                    <select style="padding:3px;" name="jk" width="250" required="required">
                      <option selected="selected">-Pilih-</option>
                      <option value="laki-laki" <?php if($jenkel=="laki-laki") echo "selected";?>>Laki-Laki</option>
                      <option value="perempuan" <?php if($jenkel=="perempuan") echo "selected";?>>Perempuan</option>
                    </select>                </td>
                
        </tr>
	  <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Tgl Lahir</p></font></td>
                <td>
                 <input type="date" placeholder="input tanggal" id="brothergiez" name="tgl" required="required" value="<?php echo $ttl ?>"/></td>
                
                
                
     </tr>
     <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Alamat</p></font></td>
                <td>
                <input type="hidden" name="tahun" value="<?php echo date("Y"); ?>"/>
                  <textarea name="alamat" id="alamat" required="required"><?php echo $alamat ?></textarea></td>
              </tr>
              <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>No Telp</p></font></td>
                <td>
                  <input type="text" name="tlp" id="tlp" value="<?php echo $notel ?>"/></td>
     </tr>
       <tr>
                 <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Pendidikan</p></font></td>
                <td>
                    <select style="padding:3px;" name="pend_terakhir" width="250" required="required">
                      <option selected="selected">-Pilih-</option>
                      <option value="SMK" <?php if($pendidikan=="SMK") echo "selected";?>>SMK</option>
                      <option value="D3" <?php if($pendidikan=="D3") echo "selected";?>>D3</option>
					  <option value="S1" <?php if($pendidikan=="S1") echo "selected";?>>S1</option>
                    </select> 
                </td>
       </tr>
       <tr>
                <td align="left" width="167" valign="middle"><font size="2" face="verdana"><p>Pengalaman</p></font></td>
                <td>
                    <select style="padding:3px;" name="pengalaman" width="250" required="required">
                      <option selected="selected">-Pilih-</option>
                      <option value="2 tahun" <?php if($pengalaman=="2 tahun") echo "selected";?>>2 tahun</option>
                      <option value="3 tahun" <?php if($pengalaman=="3 tahun") echo "selected";?>>3 tahun</option>
					  <option value="4 tahun" <?php if($pengalaman=="4 tahun") echo "selected";?>>4 tahun</option>
					  <option value="5 tahun" <?php if($pengalaman=="5 tahun") echo "selected";?>>5 tahun</option>
					  <option value="6 tahun" <?php if($pengalaman=="6 tahun") echo "selected";?>>6 tahun</option>
                    </select>                </td>
      </tr>
        <tr>
            <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Username</p></font></td>
            <td><input type="text" name="username" size="30" required="required" value="<?php echo $username ?>"/></td>
        </tr>
        
        <tr>
            <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Password</p></font></td>
            <td><input type="password" name="password"  required="required" /></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td >&nbsp;</td>
        </tr>
         <tr>
            <td>&nbsp;</td>
            <td width="71%"><input name="submit" type="submit" value="Ubah Data" class="btn btn-success"/>&nbsp;</td>
        </tr>
        </table>
        </form>
        <?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_user = $_SESSION['id_user'];
	$nama_karyawan = $_POST['nama'];
	$jenkel =  $_POST['jk'];
	$ttl =  $_POST['tgl'];
	$alamat =  $_POST['alamat'];
	$notel =  $_POST['tlp'];
	$pendidikan =  $_POST['pend_terakhir'];
	$pengalaman =  $_POST['pengalaman'];
	$username =  $_POST['username'];
	$password = md5($_POST['password']);

      $sqlsimpan = "UPDATE tabel_user SET
                    id_user = '$id_user',
                    nama_user = '$nama_karyawan',
					jk = '$jenkel',
					tgl = '$ttl',
					alamat = '$alamat',
					telepon = '$notel',
					pendidikan_terakhir = '$pendidikan',
					pengalaman = '$pengalaman',
					username = '$username',
					password = '$password'
					WHERE id_user = '$id_user'";
      mysql_query($sqlsimpan)
       or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Data Berhasil Diubah ');document.location.href='?menu=home';</script>";
  }
?>

</div>
