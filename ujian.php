<div class="isihalaman">
<?php
if(isset($_SESSION['id_user'])){
?>
        <h1>Ujian <?php echo ucwords($_SESSION['username']);?></h1>
    
        <p>
        <?php
		$hasil=mysql_query("select * from tabel_soal where publish='yes'");
		$jumlah=mysql_num_rows($hasil);
		$urut=0;
		while($row =mysql_fetch_array($hasil))
		{
			$id=$row["id_soal"];
			$pertanyaan=$row["pertanyaan"];
			$pilihan_a=$row["pilihan_a"];
			$pilihan_b=$row["pilihan_b"];
			$pilihan_c=$row["pilihan_c"];
			$pilihan_d=$row["pilihan_d"]; 
			
			?>
			<form name="form1" method="post" action="?menu=jawaban">
			<input type="hidden" name="id[]" value=<?php echo $id; ?>>
			<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
			<table width="954" border="0">
			<tr>
			  	<td width="17"><?php echo $urut=$urut+1; ?></td>
			  	<td colspan="2"><?php echo "$pertanyaan"; ?></td>
		  	  </tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td width="20"><input name="pilihan[<?php echo $id; ?>]" type="radio" value="A" /></td>
			  	<td width="903"><?php echo "$pilihan_a";?> </td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="B" /></td>
			  	<td><?php echo "$pilihan_b";?></td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="C" /></td>
			  	<td><?php echo "$pilihan_c";?> </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="D" /></td>
			  	<td><?php echo "$pilihan_d";?></td>
            </tr>
			</table>
		<?php
		}
		?>
        	<tr>
				<td>&nbsp;</td>
			  	<td></br><input class="btn btn-success" type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
            </tr>
		</form>
        </p>

<?php
}else{
	?><script>alert('Anda Belum Login, Silahkan Login terlebih dahulu');document.location.href='?menu=login';</script><?php
}
?>
</div>
