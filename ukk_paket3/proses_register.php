<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$role = $_POST['role'];

// CEK USERNAME
$cek = $conn->query("SELECT * FROM users WHERE username='$username'");
if($cek->num_rows > 0){
    echo "<script>
        alert('Username sudah digunakan!');
        window.location='register.php';
    </script>";
    exit;
}

// SIMPAN (nama dikosongkan)
$conn->query("INSERT INTO users VALUES(NULL,'','$username','$password','$role')");

echo "<script>
    alert('Registrasi berhasil!');
    window.location='login.php';
</script>";
?>