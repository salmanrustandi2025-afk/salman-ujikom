<?php
session_start();
include "koneksi.php";

// CEK LOGIN ADMIN
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin"){
    header("Location: login.php");
    exit;
}

// =====================
// FORM PASSWORD
// =====================
if(!isset($_POST['password'])){
?>

<!DOCTYPE html>
<html>
<head>
<title>Konfirmasi Hapus</title>

<style>
body {
    background:#0b3d91;
    color:white;
    font-family:Poppins;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.card {
    background:rgba(255,255,255,0.1);
    padding:30px;
    border-radius:15px;
    text-align:center;
    width:300px;
}

input {
    padding:10px;
    border-radius:10px;
    border:none;
    width:100%;
    margin-top:10px;
}

button {
    margin-top:15px;
    padding:10px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    width:100%;
}

.btn-hapus {
    background:red;
    color:white;
}

.btn-kembali {
    background:gray;
    color:white;
}
</style>

</head>
<body>

<div class="card">
    <h3>⚠️ Konfirmasi Hapus Semua Data</h3>
    <p>Masukkan password admin</p>

    <form method="POST">
        <input type="password" name="password" placeholder="Password Admin" required>

        <button type="submit" class="btn-hapus">Hapus Semua Data</button>
    </form>

    <a href="admin.php">
        <button class="btn-kembali">Kembali</button>
    </a>
</div>

</body>
</html>

<?php
exit;
}

// =====================
// CEK PASSWORD
// =====================
$id_admin = $_SESSION['user']['id'];
$password_input = $_POST['password'];

// ⚠️ GANTI "users" JIKA NAMA TABEL KAMU BERBEDA
$data = $conn->query("SELECT password FROM users WHERE id='$id_admin'");

if(!$data || $data->num_rows == 0){
    echo "<script>alert('User tidak ditemukan!'); window.location='admin.php';</script>";
    exit;
}

$user = $data->fetch_assoc();

// CEK PASSWORD (MD5)
if(md5($password_input) != $user['password']){
    echo "<script>alert('Password salah!'); window.location='hapus_semua.php';</script>";
    exit;
}

// =====================
// HAPUS FILE
// =====================
$data = $conn->query("SELECT file FROM aspirasi");

while($d = $data->fetch_assoc()){
    if($d['file'] != "" && file_exists("upload/".$d['file'])){
        unlink("upload/".$d['file']);
    }
}

// =====================
// HAPUS DATA DATABASE
// =====================
$conn->query("DELETE FROM aspirasi");
$conn->query("DELETE FROM feedback");

// RESET ID
$conn->query("ALTER TABLE aspirasi AUTO_INCREMENT = 1");
$conn->query("ALTER TABLE feedback AUTO_INCREMENT = 1");

// =====================
// SELESAI
// =====================
echo "<script>
alert('Semua data berhasil dihapus!');
window.location='admin.php';
</script>";
?>