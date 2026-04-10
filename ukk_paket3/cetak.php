<?php
include "koneksi.php";

$data = $conn->query("
SELECT a.*, k.nama_kategori 
FROM aspirasi a
JOIN kategori k ON a.kategori_id=k.id
");

echo "<h2>Laporan Aspirasi</h2>";

while($d = $data->fetch_assoc()){
    echo "
    <hr>
    <b>Samaran:</b> ".$d['samaran']."<br>
    <b>Kategori:</b> ".$d['nama_kategori']."<br>
    <b>Lokasi:</b> ".$d['lokasi']."<br>
    <b>Isi:</b> ".$d['isi']."<br>
    <b>Status:</b> ".$d['status']."<br>
    ";
}
?>

<script>
window.print();
</script>