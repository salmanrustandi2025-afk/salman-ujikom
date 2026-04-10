<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$file = $_GET['file'];
$path = "upload/".$file;
?>

<!DOCTYPE html>
<html>
<head>
<title>Lihat File</title>

<style>
body {
    margin:0;
    font-family:Poppins, sans-serif;
    background:#0b3d91;
    color:white;
    text-align:center;
}

/* HEADER */
.topbar {
    padding:15px;
}

/* BUTTON */
.btn {
    background:red;
    color:white;
    padding:10px 20px;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

/* AREA FILE */
.viewer {
    display:flex;
    justify-content:center;
    align-items:center;
    height:80vh;
}

img, video {
    max-width:90%;
    max-height:80vh;
    border-radius:15px;
}
</style>

</head>
<body>

<div class="topbar">
    <button onclick="history.back()" class="btn">⬅ Kembali</button>
</div>

<div class="viewer">

<?php
if(file_exists($path)){

    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if(in_array($ext, ['jpg','jpeg','png','gif','webp'])){
        echo "<img src='$path'>";
    }

    elseif(in_array($ext, ['mp4','webm','ogg'])){
        echo "
        <video controls>
            <source src='$path'>
        </video>
        ";
    }

    else{
        echo "<a href='$path' style='color:yellow;'>Download File</a>";
    }

}else{
    echo "<h3>File tidak ditemukan!</h3>";
}
?>

</div>

</body>
</html>