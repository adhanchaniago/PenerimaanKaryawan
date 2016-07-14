
<h2 align="center" class="title">Data Hasil Tes...</h2>

<?php
include "koneksi.php";

$result=mysql_query("SELECT*FROM tabel_nilai");
echo "<table class='table table-bordered table-striped'>
<tr>
<th>Id Pendaftar</th>
<th>Nilai Tes Soal</th>
<th>Nilai Tes Wawancara</th>
<th>Rangking</th>
</tr>";
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id_user'] . "</td>";
echo "<td>" . $row['point'] . "</td>";
echo "<td>" . $row['nilai_wawancara'] . "</td>";
echo "<td>" . $row['rangking'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>

      