
<div class="isihalaman">
<?php
if(isset($_SESSION['id_user'])){
$id_user=$_SESSION['id_user'];
?>
    <h1>Nilai <?php echo ucwords($_SESSION['username']);?></h1>
    
    <p>
  <table class="table table-bordered table-striped">
    <tr>
    	<th>No</th><th>Benar</th><th>Salah</th><th>Kosong</th><th>Skor</th><th>Tanggal</th>
    </tr>
	<?php
	$no=0; 
	$query=mysql_query("select * from tabel_nilai where id_user='$id_user'");
	
	while($row=mysql_fetch_array($query)){
		?>
	  <tr>
		  <td><span class="style1"><?php echo $no=$no+1; ?></span></td>
		  <td><span class="style1"><?php echo $row['benar'];?></span></td>
		  <td><span class="style1"><?php echo $row['salah'];?></span></td>
          <td><span class="style1"><?php echo $row['kosong'];?></span></td>
          <td><span class="style1"><?php echo $row['point'];?></span></td>
          <td><span class="style1"><?php echo $row['tanggal'];?></span></td>
	  </tr>
	  <?php	
	}
	?>
    </table>
    </p>
    <p></p>
    
<?php
}else{
	?><script language="javascript">alert('Anda Belum Melakukan Login !');document.location.href='?menu=login'</script><?php
}
?>
</div>

    
