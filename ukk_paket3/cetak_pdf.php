<?php
session_start();
include "koneksi.php";

$id = $_SESSION['user']['id'];

$data = $conn->query("
SELECT a.*, k.nama_kategori 
FROM aspirasi a
JOIN kategori k ON a.kategori_id=k.id
WHERE a.user_id='$id'
");

// HEADER PDF DOWNLOAD
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_aspirasi.xls");

echo "<h2>Laporan Aspirasi Siswa</h2>";

echo "<table border='1' cellpadding='5'>
<tr>
<th>No</th>
<th>Kategori</th>
<th>Isi</th>
<th>Status</th>
</tr>";

$no = 1;
while($d = $data->fetch_assoc()){
    echo "<tr>
    <td>".$no++."</td>
    <td>".$d['nama_kategori']."</td>
    <td>".$d['isi']."</td>
    <td>".$d['status']."</td>
    </tr>";
}

echo "</table>";
?>