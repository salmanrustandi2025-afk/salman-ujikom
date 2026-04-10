<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>

<style>
body {
    margin:0;
    font-family:Poppins, sans-serif;
    background:#0b3d91; /* BIRU TUA */
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
}

/* LOGO + TEXT */
.center {
    text-align:center;
}

.logo {
    width:250px;
    margin-bottom:20px;
}

.text {
    color:white;
    font-size:22px;
    font-weight:600;
    letter-spacing:1px;
}

/* TOMBOL MASUK */
.btn-login {
    position:absolute;
    top:25px;
    right:30px;
}

.btn-login button {
    padding:10px 25px;
    border:none;
    border-radius:20px;
    background:white;
    color:#0b3d91;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.btn-login button:hover {
    background:#ddd;
}
</style>

</head>
<body>

<!-- TOMBOL MASUK -->
<div class="btn-login">
    <a href="login.php">
        <button>Masuk</button>
    </a>
</div>

<!-- LOGO + TEXT -->
<div class="center">
    <img src="bi3.jpg" class="logo">

    <div class="text">
        AYO KITA BEBENAH SEKOLAH INI DENGAN BIJAK
    </div>
</div>

</body>
</html>