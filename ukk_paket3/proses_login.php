<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$role = $_POST['role'];

$data = $conn->query("
SELECT * FROM users 
WHERE username='$username' 
AND password='$password'
AND role='$role'
");

$user = $data->fetch_assoc();

if($user){
    $_SESSION['user'] = $user;

    if($role == "admin"){
        header("Location: admin.php");
    } else {
        header("Location: dashboard.php");
    }
    exit;
}else{
    echo "<script>
        alert('Login gagal! Username / Password / Role salah!');
        window.location='login.php';
    </script>";
}
?>