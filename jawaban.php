<div class="isihalaman">
<?php
if(isset($_SESSION['id_user'])){
?>
        <h3>Hasil Jawaban <?php echo ucwords($_SESSION['username']);?></h3>
        
	   <?php 
       if(isset($_POST['submit'])){
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];
				
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					
					//cocokan jawaban user dengan jawaban di database
					$query=mysql_query("select * from tabel_soal where id_soal='$nomor' and jawaban='$jawaban'");
					
					$cek=mysql_num_rows($query);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
					
				} 
				$score = $benar*10;
			}
		}
		?>
        <form action="?menu=simpanskor" method="post">
		<table width="100%" border="0">
		<tr>
			<td width="12%">Benar</td><td width="88%">= <?php echo $benar;?> soal x 10 point</font></td>
		</tr>
		<tr>
			<td>Salah</td><td>= <?php echo $salah;?> soal </td>
		</tr>
		<tr>
			<td>Kosong</td><td>= <?php echo $kosong;?> soal</td>
		</tr>
		<tr>
			<td><b>Score</b></td><td>= <b><?php echo $score;?></b> Point</td>
		</tr>
		</table> 
        
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']?>" />
        <input type="hidden" name="benar" value="<?php echo $benar;?>" />
        <input type="hidden" name="salah" value="<?php echo $salah;?>" />
        <input type="hidden" name="kosong" value="<?php echo $kosong;?>" />
        <input type="hidden" name="point" value="<?php echo $score;?>" />
        <p></p>
        <input  class="btn btn-success"type="submit" name="submit" value="Simpan Nilai" onclick="return confirm('Apakah Anda yakin akan menyimpan nilai ujian?')"/>
        
        </form> 
		
<?php
}else{
	?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>
</div>
