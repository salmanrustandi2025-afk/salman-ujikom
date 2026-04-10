<?php
session_start();
include "koneksi.php";

$user_id = $_SESSION['user']['id'];
$kategori_id = $_POST['kategori_id'];
$isi = $_POST['isi'];
$lokasi = $_POST['lokasi'];

$file = "";

// CEK FILE
if(isset($_FILES['file']) && $_FILES['file']['name'] != ""){
    $file = time().'_'.$_FILES['file']['name']; // biar tidak bentrok
    $tmp = $_FILES['file']['tmp_name'];

    // PROSES UPLOAD
    if(move_uploaded_file($tmp, "upload/".$file)){
        // sukses
    } else {
        echo "<script>alert('Upload file gagal!');window.history.back();</script>";
        exit;
    }
}

// SIMPAN KE DATABASE
$conn->query("
INSERT INTO aspirasi 
(user_id,kategori_id,isi,tanggal,status,lokasi,file)
VALUES 
('$user_id','$kategori_id','$isi',NOW(),'pending','$lokasi','$file')
");

echo "<script>
alert('Berhasil dikirim!');
window.location='dashboard.php';
</script>";
?>