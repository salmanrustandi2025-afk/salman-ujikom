<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
include "template.php";
?>

<style>
body {
    background:#0b3d91;
    color:white;
}

.card {
    background:rgba(255,255,255,0.1);
    color:white;
    border-radius:15px;
}

input, select, textarea {
    border:none;
    border-radius:10px;
    padding:10px;
}

button {
    background:#00c9a7;
    color:black;
}

a button {
    background:red !important;
    color:white !important;
}
</style>

<div class="card">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2>Tambah Laporan / Aspirasi</h2>

        <a href="dashboard.php">
            <button style="background:red; color:white;">Kembali</button>
        </a>
    </div>

    <!-- FORM -->
    <form method="POST" action="proses_aspirasi.php" enctype="multipart/form-data">

        <!-- KATEGORI -->
        <select name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="1">Kebersihan</option>
            <option value="2">Fasilitas</option>
            <option value="3">Keamanan</option>
            <option value="4">Lainnya</option>
        </select>

        <!-- LOKASI -->
        <input type="text" name="lokasi" placeholder="Lokasi" required>

        <!-- ISI -->
        <textarea name="isi" placeholder="Tulis isi laporan..." required></textarea>

        <!-- UPLOAD (DITAMBAHKAN BIAR AMAN) -->
        <input type="file" name="file" accept="image/*,video/*">

        <button type="submit">Kirim Laporan</button>
    </form>

</div>

<?php include "footer.php"; ?>