<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

/* TAMBAHAN ANTI BACK */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != "siswa"){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>
body {
    margin:0;
    font-family:Poppins, sans-serif;
    background:#0b3d91;
    color:white;
}

.header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 30px;
    background:#082c6c;
}

.header-left {
    display:flex;
    align-items:center;
    gap:10px;
}

.header-left img {
    width:40px;
}

.header-left h2 {
    margin:0;
}

.logout-btn {
    background:red;
    color:white;
    border:none;
    padding:8px 15px;
    border-radius:8px;
    cursor:pointer;
}

.container {
    padding:30px;
}

.card {
    background:rgba(255,255,255,0.1);
    padding:20px;
    border-radius:20px;
    margin-bottom:20px;
}

button {
    padding:10px 15px;
    border:none;
    border-radius:10px;
    background:#00c9a7;
    color:black;
    cursor:pointer;
}

.stat-box {
    background:rgba(255,255,255,0.15);
    padding:15px;
    border-radius:15px;
    width:120px;
    text-align:center;
}

.feedback {
    background:#ffffff;
    color:red;
    padding:8px;
    border-radius:10px;
    margin-top:5px;
}
</style>

</head>
<body>

<div class="header">
    <div class="header-left">
        <img src="bi3.jpg">
        <h2>SMK BHAKTI INSANI</h2>
    </div>

    <a href="logout.php">
        <button class="logout-btn">Logout</button>
    </a>
</div>

<div class="container">

<div class="card">

    <div style="display:flex; gap:10px; margin-bottom:15px;">
        <a href="tambah_aspirasi.php">
            <button>+ Tambah Aspirasi</button>
        </a>

        <a href="cetak_pdf.php">
            <button>Cetak PDF</button>
        </a>
    </div>

    <?php
    $id = $_SESSION['user']['id'];

    $total = $conn->query("SELECT * FROM aspirasi WHERE user_id='$id'")->num_rows;
    $pending = $conn->query("SELECT * FROM aspirasi WHERE user_id='$id' AND status='pending'")->num_rows;
    $proses = $conn->query("SELECT * FROM aspirasi WHERE user_id='$id' AND status='proses'")->num_rows;
    $selesai = $conn->query("SELECT * FROM aspirasi WHERE user_id='$id' AND status='selesai'")->num_rows;
    ?>

    <div style="display:flex; gap:20px; flex-wrap:wrap;">
        <div class="stat-box">Total<br><b><?= $total ?></b></div>
        <div class="stat-box">Pending<br><b><?= $pending ?></b></div>
        <div class="stat-box">Proses<br><b><?= $proses ?></b></div>
        <div class="stat-box">Selesai<br><b><?= $selesai ?></b></div>
    </div>

    <hr>

    <h3>Riwayat Aspirasi</h3>

    <?php
    $data = $conn->query("
    SELECT a.*, k.nama_kategori 
    FROM aspirasi a 
    JOIN kategori k ON a.kategori_id=k.id
    WHERE a.user_id='$id'
    ORDER BY a.id DESC
    ");

    while($d = $data->fetch_assoc()){
        $warna = "white";
        if($d['status']=="pending") $warna="orange";
        if($d['status']=="proses") $warna="cyan";
        if($d['status']=="selesai") $warna="lightgreen";
    ?>

    <div class="card">
        <b><?= $d['nama_kategori'] ?></b><br>
        <?= $d['isi'] ?><br>

        <!-- FILE -->
        <?php if($d['file'] != ""){ ?>
    <br>
    <?php $ext = pathinfo($d['file'], PATHINFO_EXTENSION); ?>

    <?php if(in_array($ext, ['jpg','jpeg','png','gif'])){ ?>
        <a href="lihat_file.php?file=<?= $d['file'] ?>">
            <img src="upload/<?= $d['file'] ?>" width="200" style="border-radius:10px;">
        </a>

    <?php } elseif(in_array($ext, ['mp4','webm','ogg'])){ ?>
        <a href="lihat_file.php?file=<?= $d['file'] ?>">
            <video width="250" style="border-radius:10px;">
                <source src="upload/<?= $d['file'] ?>">
            </video>
        </a>

    <?php } else { ?>
        <a href="lihat_file.php?file=<?= $d['file'] ?>">📎 Lihat File</a>
    <?php } ?>

<?php } ?>

        <small style="color:<?= $warna ?>">
            Status: <?= $d['status'] ?>
        </small>

        <hr>

        <b>Feedback dari Admin:</b><br>

        <?php
        $fb = $conn->query("SELECT * FROM feedback WHERE aspirasi_id='".$d['id']."'");

        if($fb->num_rows == 0){
            echo "<i style='color:gray;'>Belum ada feedback</i>";
        }

        while($f = $fb->fetch_assoc()){
        ?>
            <div class="feedback">
                💬 <?= $f['pesan'] ?>
            </div>
        <?php } ?>

    </div>

    <?php } ?>

</div>

</div>

</body>
</html>