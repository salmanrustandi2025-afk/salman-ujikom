<?php
include "koneksi.php";

$id = $_GET['id'];
$status = $_POST['status'];

$conn->query("UPDATE aspirasi SET status='$status' WHERE id='$id'");
header("Location: admin.php");
?>