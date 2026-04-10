<?php
include "koneksi.php";

$id = $_POST['aspirasi_id'];
$pesan = $_POST['pesan'];

$conn->query("INSERT INTO feedback VALUES(NULL,'$id','$pesan',NOW())");

header("Location: admin.php");
?>