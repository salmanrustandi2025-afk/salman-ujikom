<?php
$conn = new mysqli("localhost","root","","ukk_paket3");

if($conn->connect_error){
    die("Koneksi gagal: " . $conn->connect_error);
}
?>